<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Subcategory;
use App\Models\Plan;
use MrShan0\PHPFirestore\FirestoreClient;

class TopicController extends Controller
{
    // retorna o index
    public function index()
    {
        // $topics = Topic::all();
        // $subcategories = Subcategory::all();
        // $plans = Plan::all();

        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);
        
        $subcategories = $firestoreClient->listDocuments('subcategories')['documents'];

        $topics = $firestoreClient->listDocuments('topics')['documents'];

        $plans = $firestoreClient->listDocuments('plans')['documents'];

        return view('categories.topics', compact('topics', 'subcategories', 'plans'));
    }

    // retorna a view de adicionar tópico
    public function addTopic($id=null)
    {
        $topics = Topic::all();
        $subcategories = Subcategory::all();
        $plans = Plan::all();

        if($id && $id != null){
            $topic = Topic::find($id);
            $subcategories = Subcategory::all();
            return view('categories.add_topic', compact('topic', 'subcategories', 'plans'));
        } else {
            $subcategories = Subcategory::all();
            return view('categories.add_topic', compact('subcategories', 'plans'));
        }
    }
        
    // adiciona ou edita um tópico
    public function addOrEditTopic(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title_topic' => 'required|min:3',
            'subcategory' => 'required'
        ], [
            'title_topic.required' => 'O campo título é obrigatório',
            'title_topic.unique' => 'Título já existente',
            'title_topic.min' => 'O título deve ter no mínimo 3 caracteres',
            'subcategory.required' => 'O campo subcategoria é obrigatório'
        ]);

        // transforma o array em string
        $access_topic = implode(',', $request->access_topic);


        if ($request->id_topic && $request->id_topic != null) {

            $topic = Topic::find($request->id_topic);
            $topic->title = $request->title_topic;
            $topic->content = $request->content_topic;
            $topic->plan_id = $access_topic;
            $topic->id_subcategory = $request->subcategory;
            $topic->id_user = auth()->user()->id;
            $topic->save();

            // toastr()->success('Tópico Editado!');
            return redirect('topics');
        } else {
            $topic = new Topic();
            $topic->title = $request->title_topic;
            $topic->content = $request->content_topic;
            $topic->plan_id = $access_topic;
            $topic->id_subcategory = $request->subcategory;
            $topic->id_user = auth()->user()->id;
            $topic->save();

            // toastr()->success('Tópico Criado!');
            return redirect('topics');
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
 