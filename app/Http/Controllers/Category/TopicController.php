<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Subcategory;

class TopicController extends Controller
{
    // retorna o index
    public function index()
    {
        $topics = Topic::all();
        $subcategories = Subcategory::all();

        return view('categories.topics', compact('topics', 'subcategories'));
    }

    // adiciona ou edita um tópico
    public function addOrEditTopic(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'titulo' => 'required',
            'subcategoria' => 'required'
        ]);

        if ($request->id_field) {
            $topic = Topic::find($request->id_field);
            $topic->title = $request->titulo;
            $topic->id_subcategory = $request->subcategoria;
            $topic->id_user = auth()->user()->id;
            $topic->save();

            return back()->with('status', 'Tópico Editado!');
        } else {
            $topic = new Topic();
            $topic->title = $request->titulo;
            $topic->id_subcategory = $request->subcategoria;
            $topic->id_user = auth()->user()->id;
            $topic->save();

            return back()->with('status', 'Tópico Criado!');
        }
    }

    // deleta um tópico
    public function deleteTopic(Request $request)
    {
        $topic = Topic::find($request->id_field);
        $topic->delete();

        return back()->with('status', 'Tópico Deletado!');
    }

    
}
 