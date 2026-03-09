<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categoriesData = Category::all();
        return view('index', ['categories' => $categoriesData ]);
    }
}
