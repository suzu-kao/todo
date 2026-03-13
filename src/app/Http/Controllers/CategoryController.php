<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    // public function index()
    // {
    //     $categories = Category::all();
    //     return view('category', ['categories' => $categories ]);
    // }

    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::create($category);
        return redirect('/category')->with('message', 'カテゴリを作成しました');
    }


    public function update(CategoryRequest $request)
    {
        $category = Category::find($request->id);

        $category->update([
            'name' => $request->name
        ]);

        return redirect('/category')->with('message', 'カテゴリを更新しました');
    }

    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();

        return redirect('/category')->with('message', 'カテゴリを削除しました');
    }
}
