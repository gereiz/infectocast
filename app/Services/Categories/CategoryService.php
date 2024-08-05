<?php

namespace App\Services\Categories;

use Illuminate\Support\Facades\DB;
use App\Models\Category;

use MrShan0\PHPFirestore\Fields\FirestoreReference;
use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\Fields\FirestoreTimestamp;

class CategoryService
{
    private $connection;

    public function __construct()
    {
        $this->connection = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);
    }

    public function listCategories()
    {
        return $this->connection->listDocuments('categories')['documents'];
    }

    public function getCategoryFirebase($id)
    {
        return $this->connection->getDocument('categories/'.$id);
    }

    public function addCategoryFirebase($request)
    {
        $storage = app('firebase.storage');

        $bucket = $storage->getBucket();

        $bucket->upload(
            file_get_contents($request->icone),
            [
                'name' => 'cms_uploads/categories/' . $request->icone->getClientOriginalName()
            ]
        );

        // retorna a url da imagem
        $icon = $bucket->object('cms_uploads/categories/' . $request->icone->getClientOriginalName())->signedUrl(new \DateTime('tomorrow'));

        // Adiciona a categoria no banco de dados Firestore
        $this->connection->addDocument('categories', [
            'created_time' => new FirestoreTimestamp,
            'icon' => $icon,
            'id_user' => new FirestoreReference('/users/y7yky5ABSlWnTPgXfisIvtx1QBI3'),
            'title' => $request->titulo,
            'updated_time' => new FirestoreTimestamp

        ]);

    }

    public function addCategoryMySQL($request)
    {
        // Adiciona a categoria no banco de dados MySQL
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
    }

    public function editCategoryFirebase($request)
    {
        $id = $request->id_cat;


        $category = Category::where('title', $request->titulo)->first();

        $storage = app('firebase.storage');

        $bucket = $storage->getBucket();

        if($request->has('icone')) {
            // Adiciona a imagem no Firebase
            $bucket->upload(
                file_get_contents($request->icone),
                [
                    'name' => 'categories/'.$request->icone->getClientOriginalName()
                ]
            );

            // retorna a url da imagem
            $icon = $bucket->object('categories/'.$request->icone->getClientOriginalName())->signedUrl(new \DateTime('tomorrow'));

        } else {
            $icon = $request->icon_path;
        }

        // Atualiza a categoria no Firestore
        $this->connection->setDocument('categories/'.$id, [
            'created_time' => new FirestoreTimestamp,
            'icon' => $icon,
            'id_user' => new FirestoreReference('/users/y7yky5ABSlWnTPgXfisIvtx1QBI3'),
            'title' => $request->titulo,
            'updated_time' => new FirestoreTimestamp

        ], [
            'exists' => true, // Indica que o documento deve existir
        ]);


    }

    public function editCategoryMySQL($request)
    {

        $category = Category::where('title', $request->oldtitulo)->first();

        // Atualiza o título da categoria no MySQL
        if ($request->has('titulo')) {
            $category->title = $request->titulo;
        }

        // Adiciona a imagem no MySQL
        if($request->hasFile('icone')) {
            $file = $request->file('icone');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('app/public/imgcat'), $filename);
            $category->icon = $filename;
        }
        

        $category->save();
    }

    public function deleteCategoryFirebase($request)
    {
        $id = $request->id_cat;
        $this->connection->deleteDocument('categories/'.$id);
    }

    public function deleteCategoryMySQL($request)
    {   
        $category = Category::where('title', $request->oldtitulo)->first();
        $category->delete();
    }


}