<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->orderBy('name')->get();

        return view('categories.index', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        $posts = $category->posts()->with('user')->latest()->get();

        return view('categories.show', ['category' => $category, 'posts' => $posts]);
    }
}
