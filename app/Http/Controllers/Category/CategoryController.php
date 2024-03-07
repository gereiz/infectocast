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

    // Adiciona uma nova categoria, ou atualiza uma existente caso o id seja passado
    public function addOrEditCategory(Request $request) {
        // Verifica se o id foi passado
        if ($request->has('id_field')) {
            return $this->editCategory($request);
        } else {
            return $this->addCategory($request);
        }
    }


    public function addCategory(Request $request) {
        // dd($request->all());
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


    public function editCategory(Request $request)
     {
        // dd($request->all());
        $id = $request->id_field;

        // Find the category by id
        $category = Category::find($id);

        // Check if category exists
        if (!$category) {
            return back()->with('error', 'Categoria não encontrada!');
        }

        // Check if a new file is uploaded
        if($request->hasFile('icone')) {
            $file = $request->file('icone');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('app/public/imgcat'), $filename);

            // Update the icon
            $category->icon = $filename;
        }

        // Update the title if it is set
        if ($request->has('titulo')) {
            $category->title = $request->titulo;
        }

        // Save the changes
        $category->save();

        return back()->with('status', 'Categoria atualizada!');
    }


    public function deleteCategory(Request $request) {
        // Get the id from the request
        $id = $request->id_field;

        // Find the category by id
        $category = Category::find($id);

        // Check if category exists
        if (!$category) {
            return back()->with('error', 'Categoria não encontrada!');
        }

        // Delete the category
        $category->delete();

        return back()->with('status', 'Categoria excluída!');
    }

}
