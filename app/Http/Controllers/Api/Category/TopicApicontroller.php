<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicApicontroller extends Controller
{
    // retorna todos os topicos pelo id da subcategoria
    public function getTopics(Request $request) {
        return response()->json(Topic::where('id_subcategory', $request->id_subcategory)->get(), 200);
    }
}
