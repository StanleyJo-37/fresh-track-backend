<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GeminiAPI\Resources\Parts\ImagePart;
use GeminiAPI\Enums\MimeType;
use Illuminate\Http\Request;
use GeminiAPI\Client as GeminiClient;
use GeminiAPI\Resources\Parts\TextPart;

class WebAIController extends Controller
{
    protected $gemini;

    public function __construct(GeminiClient $gemini){
        $this->gemini = $gemini;
    }
    
    public function infer(Request $request){

        $response = $this->gemini->geminiProFlash1_5()->generateContent(
            new TextPart('Tell me what this'),
            new ImagePart(
                mimeType::IMAGE_JPEG,
                base64_encode(file_get_contents($request->image_upload))
            )
        );

        return response()->json([
            'message' => $response
        ]);
    }

}
