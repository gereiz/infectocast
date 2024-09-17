<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsApiController extends Controller
{
    // retorna todos os topicos pelo id da subcategoria
    public function getTopics(Request $request) {

        $topics = Topic::where('id_subcategory', $request->id_subcategory)->OrderBy('title', 'asc')->get();

        $topics_formated = [];
        foreach ($topics as $topic) {
            // converte a string em array
            $topic->plan_id = explode(',', $topic->plan_id);
            $topics_formated[] = $topic;
        }

        return response()->json($topics_formated, 200);
    }


    public function getTopicsTitle(Request $request) {
        return response()->json(Topic::where([['id_subcategory', $request->id_subcategory], ['title', 'like', '%'.$request->title.'%']])->get(), 200);
    }


    // retorna um topico específico pelo id do topico
    public function getTopic(Request $request) {
        // $topic = Topic::find($request->id_topic);
        $topic = Topic::where('title', $request->title)->first();
        if($topic) {
            $topic_formated = [];
            // converte a string em array
            $topic->plan_id = explode(',', $topic->plan_id);
            $topic_formated[] = $topic;

            return response()->json($topic_formated, 200);
        } else {
            return response()->json(['message' => 'Tópico não encontrado'], 404);
        }
    }

    // retorna um topico específico pelo id do topico
    public function getTopicPage($title) {
        $topic = Topic::where('title', $title)->first();

        dd($topic);
        return view('categories.single_topic', ['topic' => $topic]);

    }

}
