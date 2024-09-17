<?php

namespace App\Services\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Subcategory;


use MrShan0\PHPFirestore\Fields\FirestoreReference;
use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\Fields\FirestoreTimestamp;

class SubcategoryService {

    private $connection;

    public function __construct()
    {
        $this->connection = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);
    }


    public function listSubcategories()
    {
        $subcategories = $this->connection->listDocuments('subcategories', ['pageSize' => 9999])['documents'];

        return $subcategories;
    }


    public function getSubcategory($id)
    {
        $subcategory = $this->connection->getDocument('subcategories/'.$id);

        return $subcategory;
    }


    public function addSubcategoryFirebase($request)
    {
        if($request->id_subcat) {
            $this->connection->setDocument('subcategories/'.$request->id_subcat , [
                'created_time' => new FirestoreTimestamp,
                'id_category' => new FirestoreReference($request->editCategoria),
                'id_user' => new FirestoreReference('/users/y7yky5ABSlWnTPgXfisIvtx1QBI3'),
                'title' => $request->titulo,
                'updated_time' => new FirestoreTimestamp


            ], [
                'exists' => true, // Indica que o documento deve existir
            ]);
        } else {
            $this->connection->addDocument('subcategories', [
                'created_time' => new FirestoreTimestamp,
                'id_category' => new FirestoreReference("$request->addcategoria"),
                'id_user' => new FirestoreReference("/users/y7yky5ABSlWnTPgXfisIvtx1QBI3"),
                'title' => $request->titulo,
                'updated_time' => new FirestoreTimestamp
            ]);
        }
    }


    // public function addSubcategoryMySQL($request)
    // {

    //     $categoryService = new CategoryService();


    //     $categories = Category::all();


    //     if ($request->id_subcat) {
    //         $categoria = substr($request->editCategoria, -20);

    //         $category = $categoryService->getCategoryFirebase($categoria);

    //         $subcategory = Subcategory::where('title', $request->oldtitulo)->first();

    //         $subcategory->title = $request->titulo;
    //         $subcategory->id_category = $categories->where('title', $category->get('title'))->first()->id;
    //         $subcategory->id_user = auth()->user()->id;
    //         $subcategory->save();

    //     } else {
    //         $categoria = substr($request->addcategoria, -20);

    //         $category = $categoryService->getCategoryFirebase($categoria);

    //         $subcategory = new Subcategory();

    //         $subcategory->title = $request->titulo;
    //         $subcategory->id_category = $categories->where('title', $category->get('title'))->first()->id;
    //         $subcategory->id_user = auth()->user()->id;
    //         $subcategory->save();
    //     }
    // }


    public function deleteSubcategoryFirebase($request)
    {
        $this->connection->deleteDocument('subcategories/'.$request->id_subcat);
    }

    // public function deleteSubcategoryMySQL($request)
    // {
    //     $subcategory = Subcategory::where('title', $request->oldtitulo)->first();
    //     $subcategory->delete();
    // }

}
