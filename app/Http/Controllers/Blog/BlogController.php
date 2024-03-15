<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog; 

class BlogController extends Controller
{
    // return o index do blog
    public function index()
    {
        $posts = Blog::all();

        return view('blog.index', compact('posts'));
    }
}
