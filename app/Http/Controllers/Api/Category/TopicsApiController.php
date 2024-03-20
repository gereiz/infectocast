<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsApiController extends Controller
{
    // retorna todos os topicos pelo id da subcategoria
    public function getTopics(Request $request) {
        return response()->json(Topic::where('id_subcategory', $request->id_subcategory)->get(), 200);
    }

    // retorna um topico específico pelo request
    public function getTopic(Request $request) {
        $topic = Topic::find($request->id_topic);
        if($topic) {
            return response()->json($topic, 200);
        } else {
            return response()->json(['message' => 'Tópico não encontrado'], 404);
        }
    }

}
