<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\Categories\CategoryService;


class CategoryController extends Controller
{
    
    public function index() {

        $categoryService = new CategoryService();

        $categories = $categoryService->listCategories();

        return view('categories.categories', compact('categories'));
    }


    public function addOrEditCategory(Request $request) {
        // Verifica se o id foi passado
        if ($request->has('id_cat')) {
            return $this->editCategory($request);
        } else {
            return $this->addCategory($request);
        }
    }


    public function addCategory(Request $request) {

        $categoryService = new CategoryService();

        $request->validate([
            'titulo' => 'required',
            
        ]);

        // Adiciona a categoria no Firestore
        try {
            $categoryService->addCategoryFirebase($request);
        } catch (\Exception $e) {
            toastr()->error('Erro ao adicionar a categoria!');

            return back();
        }

        // Adiciona a categoria no MySQL
       try {
            $categoryService->addCategoryMySQL($request);
        } catch (\Exception $e) {
            toastr()->error('Erro ao adicionar a categoria!');

            return back();
        }
        
        toastr()->success('Categoria adicionada com sucesso!');
        return back();  
    }


    public function editCategory(Request $request)
     {
        // dd($request->all());
        $categoryService = new CategoryService();

        $request->validate([
            'titulo' => 'required',
        ]);

        // Atualiza a categoria no Firestore
        try {
            $categoryService->editCategoryFirebase($request);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());

            return back();
        }
       
        // Atualiza a categoria no MySQL
        try {
            $categoryService->editCategoryMySQL($request);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());

            return back();
        }        


        toastr()->success('Categoria atualizada com sucesso!');
        return back();
    }


    public function deleteCategory(Request $request) {
        
        $categoryService = new CategoryService();

        // Deleta a categoria no Firestore
        try {
            $categoryService->deleteCategoryFirebase($request);
        } catch (\Exception $e) {
            toastr()->error('Erro ao excluir a categoria!');

            return back();
        }
        
        // Deleta a categoria no MySQL
        try {
            $categoryService->deleteCategoryMySQL($request);
        } catch (\Exception $e) {
            toastr()->error('Erro ao excluir a categoria!');

            return back();
        }

        toastr()->success('Categoria excluída com sucesso!');
        return back();
    }

}
