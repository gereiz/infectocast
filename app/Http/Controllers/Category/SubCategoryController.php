<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\Fields\FirestoreTimestamp;
use MrShan0\PHPFirestore\Fields\FirestoreReference;

class SubCategoryController extends Controller
{
    // retorna o index
    public function index()
    {
        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        $categories = $firestoreClient->listDocuments('categories')['documents'];
        
        $subcategories = $firestoreClient->listDocuments('subcategories')['documents'];

        return view('categories.subcategories', compact('subcategories', 'categories'));
    }

    // adiciona ou edita uma subcategoria
    public function addOrEditSubCategory(Request $request)
    {
        // dd($request->all());
        $request->validate([ 
            'titulo' => 'required',
            'categoria' => 'required'
        ]);

        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

    
       if($request->id_subcat) {
                $firestoreClient->setDocument('subcategories/'.$request->id_subcat , [
                'created_time' => new FirestoreTimestamp,
                'id_category' => new FirestoreReference('categories/'.$request->categoria),
                'id_user' => new FirestoreReference('users/'.auth()->user()->id),
                'title' => $request->titulo,
                'updated_time' => new FirestoreTimestamp

                
            ], [
                'exists' => true, // Indica que o documento deve existir
            ]);
        } else {
            $firestoreClient->addDocument('subcategories', [
                'created_time' => new FirestoreTimestamp,
                'id_category' => new FirestoreReference('categories/'.$request->categoria),
                'id_user' => new FirestoreReference('users/'.auth()->user()->id),
                'title' => $request->titulo,
                'updated_time' => new FirestoreTimestamp
            ]);
        }

        // if ($request->id_subcat) {
        //     $subcategory = Subcategory::find($request->id_subcat);
        //     $subcategory->title = $request->titulo;
        //     $subcategory->id_category = $request->categoria;
        //     $subcategory->id_user = auth()->user()->id;
        //     $subcategory->save();

        //     return back()->with('status', 'Subcategoria Editada!');
        // } else {
        //     $subcategory = new Subcategory();
        //     $subcategory->title = $request->titulo;
        //     $subcategory->id_category = $request->categoria;
        //     $subcategory->id_user = auth()->user()->id;
        //     $subcategory->save();
        // }

        return back()->with('status', 'Subcategoria Criada!');
    }

    // deleta uma subcategoria
    public function deleteSubCategory(Request $request)
    {
        // dd($request->all());
        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        $firestoreClient->deleteDocument('subcategories/'.$request->id_subcat);

        // $subcategory = Subcategory::find($request->id_subcat);
        // $subcategory->delete();

        return back()->with('status', 'Subcategoria Deletada!');
    }
}
