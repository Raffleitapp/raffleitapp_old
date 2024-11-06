<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function fetch_category()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
