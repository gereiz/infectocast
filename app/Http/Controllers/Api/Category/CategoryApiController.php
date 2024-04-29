<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    
    public function getCategories() {

        return response(Category::all());

    }


    public function getCategoryTitle(Request $request) {

        return response(Category::where('title', 'like', '%'.$request->title.'%')->get());
    }
    
}
