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
        $request->validate([ 
            'titulo' => 'required',
            'addcategoria' => 'required'
        ]);

        // Adiciona ou edita  a subcategoria no Firestore
        $subcategoryService = new SubcategoryService();

        // try {
        //     $subcategoryService->addSubcategoryFirebase($request);
        // } catch (\Exception $e) {
        //     toastr()->error($e->getMessage());

        //     return back();
        // }
      

        // Adiciona ou edita a subcategoria no MySQL
        try {
            $subcategoryService->addSubcategoryMySQL($request);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());

            return back();
        }

        toastr()->success('Subcategoria Criada!');
        return back();
    }

    // // deleta uma subcategoria
    // public function deleteSubCategory(Request $request)
    // {
    //     // dd($request->all());
    //     $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
    //         'database' => '(default)',
    //     ]);

    //     $firestoreClient->deleteDocument('subcategories/'.$request->id_subcat);

    //     // $subcategory = Subcategory::find($request->id_subcat);
    //     // $subcategory->delete();

    //     return back()->with('status', 'Subcategoria Deletada!');
    // }
}
