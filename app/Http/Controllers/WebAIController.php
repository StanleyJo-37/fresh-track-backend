<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use Carbon\Carbon;
use GeminiAPI\GenerationConfig;
use GeminiAPI\Resources\Parts\ImagePart;
use GeminiAPI\Enums\MimeType;
use Illuminate\Http\Request;
use GeminiAPI\Client as GeminiClient;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;
use Illuminate\Support\Facades\Auth;

class WebAIController extends Controller
{
    protected $gemini;

    public function __construct(GeminiClient $gemini)
    {
        $this->gemini = $gemini;
    }

    public function infer(Request $request)
    {
        try {
            $request->validate([
                'image_upload' => 'required',
                'date_upload'  => 'required' 
            ]);

            $date_upload = Carbon::parse($request->date_upload);
            $food_list = FoodProduct::select([
                'id',
                'local_name'
            ])->get()->toArray();
            $encoded_list = json_encode($food_list);

            $system_inst = "Precise JSON data format with these specified keys:\n
            - 'id'           (food id)
            - 'local_name'   (name of the food)\n
            - 'food_type'    (either 'vegetable' / 'fruit')\n
            - 'freshness'    (0-100)\n
            - 'fresh_till'   (freshness from $date_upload in YYYY-MM-DD format)
            - 'defects'      (explain if there are any noticable defects and store it in an array of string)
            - 'condition'    (describes the condition of the food)
            The result must only be one

            The food must be from the provided list: $encoded_list
            If the food isn't present in the list, then make all the values null";

            $generation_config = (new GenerationConfig())
                ->withTemperature(0.6)
                ->withTopP(0.95)
                ->withTopK(40)
                ->withMaxOutputTokens(1000);
                // ->jsonSerialize();

            $response = $this->gemini
                ->withV1BetaVersion()
                ->generativeModel(ModelName::GEMINI_1_5_FLASH)
                ->withGenerationConfig($generation_config)
                ->withSystemInstruction($system_inst)
                ->generateContent(
                    new TextPart($system_inst),
                    new ImagePart(
                        mimeType::IMAGE_JPEG,
                        base64_encode(file_get_contents($request->file('image_upload')))
                    ),
                );
            
            $text = $response->text();

            $filtered_text = str_replace('json', '', $text);
            $filtered_text = str_replace('`', '', $filtered_text);

            $json_result = json_decode($filtered_text, true);
        
            return response()->json($json_result);
        } catch (\Exception $e) {
            dd($e);
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}
