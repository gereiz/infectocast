<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller
{
    // reotorna todos os posts do blog
    public function getPosts() {
        return response()->json(Blog::all(), 200);
    }

    // rtorna um post específico pelo request
    public function getPost(Request $request) {
        $post = Blog::find($request->id_post);
        if($post) {
            return response()->json($post, 200);
        } else {
            return response()->json(['message' => 'Post não encontrado'], 404);
        }
    }
    
}
