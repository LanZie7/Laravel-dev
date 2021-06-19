<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function show(Category $category)
    {
        $news = $category->news()->get();
        return view('categories.show', compact('category', 'news'));
    }
}
