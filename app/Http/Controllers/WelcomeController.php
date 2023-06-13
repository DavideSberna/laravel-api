<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $posts = Post::all();

        if ($request->has('category_id')) {
            $category = Category::findOrFail($request->category_id);
            $posts = $category->posts;
            ///dd($category);
        };

        return view('home', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('show', compact('post'));
    }
}
