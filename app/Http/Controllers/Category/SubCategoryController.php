<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    // retorna o index
    public function index()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();

        return view('categories.subcategories', compact('subcategories', 'categories'));
    }

    // adiciona ou edita uma subcategoria
    public function addOrEditSubCategory(Request $request)
    {
        $request->validate([ 
            'titulo' => 'required',
            'categoria' => 'required'
        ]);

        if ($request->id_field) {
            $subcategory = Subcategory::find($request->id_field);
            $subcategory->title = $request->titulo;
            $subcategory->id_category = $request->categoria;
            $subcategory->id_user = auth()->user()->id;
            $subcategory->save();

            return back()->with('status', 'Subcategoria Editada!');
        } else {
            $subcategory = new Subcategory();
            $subcategory->title = $request->titulo;
            $subcategory->id_category = $request->categoria;
            $subcategory->id_user = auth()->user()->id;
            $subcategory->save();

            return back()->with('status', 'Subcategoria Criada!');
        }

        
    }

    // deleta uma subcategoria
    public function deleteSubCategory(Request $request)
    {
        $subcategory = Subcategory::find($request->id_field);
        $subcategory->delete();

        return back()->with('status', 'Subcategoria Deletada!');
    }
}
