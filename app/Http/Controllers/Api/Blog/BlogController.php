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
}
