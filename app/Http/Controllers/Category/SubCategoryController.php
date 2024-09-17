<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Services\Categories\CategoryService;
use App\Services\Categories\SubcategoryService;

class SubCategoryController extends Controller
{
    // retorna o index
    public function index()
    {
        $categoryService = new CategoryService();
        $subcategoryService = new SubcategoryService();

        $categories = $categoryService->listCategories();
        $subcategories = $subcategoryService->listSubcategories();

        return view('categories.subcategories', compact('subcategories', 'categories'));
    }

    // adiciona ou edita uma subcategoria
    public function addOrEditSubCategory(Request $request)
    {

        // Adiciona ou edita  a subcategoria no Firestore
        $subcategoryService = new SubcategoryService();

        try {
            $subcategoryService->addSubcategoryFirebase($request);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());

            return back();
        }

        // Adiciona ou edita a subcategoria no MySQL
        // try {
        //     $subcategoryService->addSubcategoryMySQL($request);
        // } catch (\Exception $e) {
        //     toastr()->error($e->getMessage());

        //     return back();
        // }

       if($request->id_subcat) {
            toastr()->success('Subcategoria Editada!');
        } else {
            toastr()->success('Subcategoria Criada!');
        }
        return back();
    }

    // deleta uma subcategoria
    public function deleteSubCategory(Request $request)
    {
        $subcategoryService = new SubcategoryService();

        try {
            $subcategoryService->deleteSubcategoryFirebase($request);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());

            return back();
        }

        try {
            $subcategoryService->deleteSubcategoryMySQL($request);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());

            return back();
        }

        toastr()->success('Subcategoria Deletada!');
        return back();
    }
}
