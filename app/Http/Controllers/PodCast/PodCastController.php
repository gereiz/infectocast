<?php

namespace App\Http\Controllers\PodCast;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;

class PodCastController extends Controller
{
    // retorn o index do podcast
    public function index() {
        $podcasts = Podcast::all();


        return view('podcast.index', compact('podcasts'));
    }
    
     // retorna a view de adicionar post
     public function addPodast($id=null)
     {
         if($id && $id != null){
             $podcast = Podcast::find($id);
             return view('podcast.add_podcast', compact('podcast'));
         } else {
             return view('podcast.add_podcast');
         }
     }

    // adiciona ou edita um podcast
    public function addEditPodcast(Request $request) {
        // valida se o titulo é unico
        $request->validate([
            'title_podcast' => 'required|unique:podcasts,title,'.$request->id_podcast,
            'link_podcast' => 'required'
        ]);

        $userId = auth()->user()->id;
        $podcast = Podcast::find($request->id_podcast);

        if($podcast){
            $podcast->title = $request->title_podcast;
            $podcast->link = $request->link_podcast;
            $podcast->id_user = $userId;
            $podcast->save();

            return redirect('podcast')->with('status', 'Podcast Editado!', 'podcast');
        }else{
            $podcast = new Podcast();
            $podcast->title = $request->title_podcast;
            $podcast->link = $request->link_podcast;
            $podcast->id_user = $userId;
            $podcast->save();

            return redirect('podcast')->with('status', 'Podcast Adicionado!', 'podcast');
        }
    }


    // deleta um podcast
    public function deletePodcast(Request $request) {
        // dd($request->all());
        $podcast = Podcast::find($request->id_podcast);
        $podcast->delete();

        return redirect('podcast')->with('status', 'Podcast Deletado!', 'podcast');
    }

}
