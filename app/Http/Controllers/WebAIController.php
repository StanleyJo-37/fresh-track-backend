<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
                'image_upload' => 'required'
            ]);

            $system_inst = "Precise JSON data format with these specified keys:\n
            - 'food_type'    (either 'vegetable' / 'fruit')\n
            - 'food_name'  (name of the food)\n
            - 'freshness'     (0-100)\n
            - 'fresh_till'        (date in YYYY-MM-DD format)
            without any styling like markdowns, just in raw JSON format. The result must only be one.";

            $generation_config = (new GenerationConfig())
                ->withTemperature(0.6)
                ->withTopP(0.95)
                ->withTopK(40)
                ->withMaxOutputTokens(1000)
                ->jsonSerialize();

            $response = $this->gemini
                ->withV1BetaVersion()
                ->generativeModel(ModelName::GEMINI_1_5_FLASH)
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
