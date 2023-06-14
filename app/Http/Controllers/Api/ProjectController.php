<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Post::with('category')->paginate(5);
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'data' => [
                'projects' => $projects,
                'categories' => $categories,
            ],

        ]);

    }

    public function show($slug)
    {

        $projects = Post::with('category')->where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'data' => $projects,
            
        ]);

    }

    public function projectsCategory(Category $category)
    {
        $projects = Post::where('category_id', $category->id)->get();
        return response()->json([
            'success' => true,
            'data' => [
                'projects' => $projects,
            ],
        ]);
    }
}
