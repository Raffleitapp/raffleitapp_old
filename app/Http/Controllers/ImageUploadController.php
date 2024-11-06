<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the incoming request with image file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Store the uploaded image in the 'public' disk
        $path = $request->file('image')->store('images', 'public');

        // Return the path to the uploaded image
        return response()->json(['path' => $path], 201);
    }
}
