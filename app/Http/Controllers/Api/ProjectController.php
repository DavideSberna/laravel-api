<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Post::all();
        return response()->json([
            'success' => true,
            'results' => $project

        ]);

    }
}
