<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index() {

        $categories = Category::all();

        return view('categories.categories', compact('categories'));

    }

    public function addCategory(Request $request) {
        // dd($request->file('icone'));
        if($request->hasFile('icone')) {
            $file = $request->file('icone');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('app/public/imgcat'), $filename);
        }

        Category::create([
            'title' => $request->titulo,
            'icon' => $filename,
            'id_user' => auth()->user()->id
        ]);
        

        return back()->with('status', 'Categoria Criada!');
    }

}
