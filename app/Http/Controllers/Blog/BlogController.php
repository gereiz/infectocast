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
        $posts = Blog::with('authorPost')->get();

        return view('blog.index', compact('posts'));
    }

    // retorna a view de adicionar post
    public function addPost($id=null)
    {
        if($id && $id != null){
            $post = Blog::find($id);
            return view('blog.add_post', compact('post'));
        } else {
            return view('blog.add_post');
        }
    }

    // adiciona ou edita um post
    public function addEditPost(Request $request)
    {
        $userId = auth()->user()->id;
        $post = Blog::find($request->id_post);

        if($request->hasFile('image_post')) {
            $file = $request->file('image_post');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('app/public/imgpost'), $filename);
        }

        if($post){
            $post->title = $request->title_post;
            if($request->file('image_post')){
                $post->image = $filename;
            }
            $post->content = $request->content_post;
            $post->date = date('Y-m-d');
            $post->author = $userId;
            $post->status = 1;
            $post->save();

            toastr()->success('Post editado com sucesso!');
            return back();
            
        }else{
            $post = new Blog();
            $post->title = $request->title_post;
            $post->image = $filename;
            $post->content = $request->content_post;
            $post->date = date('Y-m-d');
            $post->author = $userId;
            $post->status = 1;
            $post->save();

            toastr()->success('Post criado com sucesso!');
            return back();
        }

       
    }

    // deleta um post
    public function deletePost(Request $request)
    {
        $post = Blog::find($request->id_post);
        $post->delete();

        toastr()->success('Post excluido com sucesso!');
            return back();
    }
}
