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
        $subcategories = $this->connection->listDocuments('subcategories')['documents'];

        return $subcategories;
    }


    public function addSubcategoryFirebase($request)
    {
        if($request->id_subcat) {
            $this->connection->setDocument('subcategories/'.$request->id_subcat , [
                'created_time' => new FirestoreTimestamp,
                'id_category' => new FirestoreReference($request->categoria),
                'id_user' => new FirestoreReference('/users/y7yky5ABSlWnTPgXfisIvtx1QBI3'),
                'title' => $request->titulo,
                'updated_time' => new FirestoreTimestamp

                
            ], [
                'exists' => true, // Indica que o documento deve existir
            ]);
        } else {
            $this->connection->addDocument('subcategories', [
                'created_time' => new FirestoreTimestamp,
                'id_category' => new FirestoreReference($request->categoria),
                'id_user' => new FirestoreReference('/users/y7yky5ABSlWnTPgXfisIvtx1QBI3'),
                'title' => $request->titulo,
                'updated_time' => new FirestoreTimestamp
            ]);
        }
    }


    public function addSubcategoryMySQL($request)
    {

        // dd($request->all());
        $categories = Category::all();

        if ($request->id_subcat) {
            $subcategory = Subcategory::find($request->id_subcat);

            $subcategory->title = $request->titulo;
            $subcategory->id_category = $request->categoria;
            $subcategory->id_user = auth()->user()->id;
            $subcategory->save();

            return back()->with('status', 'Subcategoria Editada!');
        } else {
            
            $subcategory = new Subcategory();

            $subcategory->title = $request->titulo;
            $subcategory->id_category = $categories->where('title', $request->categoria)->first()->id;
            $subcategory->id_user = auth()->user()->id;
            $subcategory->save();
        }
    }


}