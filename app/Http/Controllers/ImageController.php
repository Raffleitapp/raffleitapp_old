<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function showImage($imageName)
    {
        $imagePath = Storage::url($imageName);

        if (strpos($imageName, 'images/') === 0) {
            $storagePath = 'uploads/images';
        } elseif (strpos($imageName, 'storage/in') === 0) {
            $storagePath = 'storage/in';
        } else {
            $storagePath = 'uploads/images'; // Default path
        }

        if (Storage::exists($storagePath . '/' . $imageName)) {
            $imageUrl = Storage::url($storagePath . '/' . $imageName);
            return view('image.display', compact('imageUrl'));
        } else {
            abort(404, 'Image not found');
        }
    }
}
