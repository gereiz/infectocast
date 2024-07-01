<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use MrShan0\PHPFirestore\Fields\FirestoreReference;
use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\Fields\FirestoreTimestamp;

class CategoryController extends Controller
{
    
    public function index() {

        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        $categories = $firestoreClient->listDocuments('categories')['documents'];

        return view('categories.categories', compact('categories'));
    }

    public function addCategory(Request $request) {

        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        $storage = app('firebase.storage');

        $bucket = $storage->getBucket();

        $bucket->upload(
            file_get_contents($request->icone),
            [
                'name' => 'categories/'.$request->icone->getClientOriginalName()
            ]
        );
        
        // retorna a url da imagem
        $icon = $bucket->object('categories/'.$request->icone->getClientOriginalName())->signedUrl(new \DateTime('tomorrow'));
        
        // Adiciona a categoria no banco de dados Firestore
        $firestoreClient->addDocument('categories', [
            'created_time' => new FirestoreTimestamp,
            'icon' => $icon,
            'id_user' => new FirestoreReference('/users/y7yky5ABSlWnTPgXfisIvtx1QBI3'),
            'title' => $request->titulo,
            'updated_time' => new FirestoreTimestamp

        ]);

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
        

        return back()->with('status', 'Categoria Criada!');
    }

    public function addOrEditCategory(Request $request) {
        // Verifica se o id foi passado
        if ($request->has('id_cat')) {
            return $this->editCategory($request);
        } else {
            return $this->addCategory($request);
        }
    }

    public function editCategory(Request $request)
     {
        // dd($request->all());
        $id = $request->id_cat;

        // $category = Category::find($id);

        
        // if (!$category) {
        //     return back()->with('error', 'Categoria não encontrada!');
        // }
        
        $storage = app('firebase.storage');
        $bucket = $storage->getBucket();


        // Check if a new file is uploaded
        if($request->hasFile('icone')) {
            // Adiciona a imagem no Firebase
            
    
            $bucket->upload(
                file_get_contents($request->icone),
                [
                    'name' => 'categories/'.$request->icone->getClientOriginalName()
                ]
            );    

            // retorna a url da imagem
            $icon = $bucket->object('icons/'.$request->icone->getClientOriginalName())->signedUrl(new \DateTime('tomorrow'));

            // // Adiciona a imagem no MySQL
            // $file = $request->file('icone');
            // $filename = date('YmdHi').$file->getClientOriginalName();
            // $file->move(storage_path('app/public/imgcat'), $filename);

            // $category->icon = $filename;
        }
        
        // Update the title if it is set
        // if ($request->has('titulo')) {
        //     $category->title = $request->titulo;
        // }
        // dd($id);
        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        $fb_category = $firestoreClient->setDocument('categories/'.$id , [
            'created_time' => new FirestoreTimestamp,
            'icon' => $icon,
            'id_user' => '/users/y7yky5ABSlWnTPgXfisIvtx1QBI3',
            'title' => $request->titulo,
            'updated_time' => new FirestoreTimestamp

            
        ], [
            'exists' => true, // Indica que o documento deve existir
        ]);
        
        // Save the changes
        // $category->save();

        return back()->with('status', 'Categoria atualizada!');
    }

    public function deleteCategory(Request $request) {
        $id = $request->id_cat;

        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        $firestoreClient->deleteDocument('categories/'.$id);



        // $category = Category::find($id);

        // if (!$category) {
        //     return back()->with('error', 'Categoria não encontrada!');
        // }

        // $category->delete();

        return back()->with('status', 'Categoria excluída!');
    }

}
