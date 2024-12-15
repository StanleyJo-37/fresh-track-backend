<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AzureController extends Controller
{
    //

    public function uploadImage(Request $request) {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'filepath' => 'required|string',
            ]);

            if ($request->file('image')) {
                $fileName = time() . '_' . $request->image->getClientOriginalName();
                $path = $request->file('image')->storeAs($request->filepath, $fileName, 'azure');
                
                return response()->json([
                    'message' => 'Image uploaded successfully.',
                    'path' => $path,
                ], 200);
            }

            return response()->json([
                'message' => 'No Image uploaded.',
            ], 403);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Image upload failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
