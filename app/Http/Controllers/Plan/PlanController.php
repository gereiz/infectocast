<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\Attributes\FirestoreDeleteAttribute;


class PlanController extends Controller
{
    //retorna a pagina index dos planos
    public function index()
    {
        // $plans = Plan::all();

        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        $plans = $firestoreClient->listDocuments('plans')['documents'];

        return view('plans.index', compact('plans'));
    }

    //retorna a pagina de adicionar ou editar um plano
    public function addPlan($id = null)
    {
        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        if($id){
            $plan = $firestoreClient->getDocument('plans/'.$id);
        }else{
            $plan = null;
        }

        return view('plans.add_plan', compact('plan'));
    }

    //adiciona ou edita um plano
    public function addOrEditPlan(Request $request)
    {
        // $request->validate([
        //     'name_plan' => 'required',
        //     'icon_plan' => 'required',
        //     'price_plan' => 'required',
        //     'type_plan' => 'required',
        //     'recurrence_plan' => 'required',
        //     'description_plan' => 'required',
        //     'active_plan' => 'required'
        // ]);

        $storage = app('firebase.storage');
        // $storageClient = $storage->getStorageClient();
        $bucket = $storage->getBucket();

        $bucket->upload(
            file_get_contents($request->icon_plan),
            [
                'name' => 'icons/'.$request->icon_plan->getClientOriginalName()
            ]
        );
        
        // retorna a url da imagem
        $icon = $bucket->object('icons/'.$request->icon_plan->getClientOriginalName())->signedUrl(new \DateTime('tomorrow'));
        

        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        if($request->id_plan){
            $plan = $firestoreClient->setDocument('plans/'.$request->id_plan , [
                'name' => $request->name_plan,
                'description' => $request->description_plan,
                'price' => str_replace(',', '.', $request->price_plan), // troca a virgula por ponto (padrão de preço no firestore
                'icon' => $icon,
                'id_user' => '/users/y7yky5ABSlWnTPgXfisIvtx1QBI3',
                'is_active' => $request->active_plan,
                'type' => '1',
                'recurrence' => '1',
                
            ], [
                'exists' => true, // Indica que o documento deve existir
            ]);
        }else{
            $plan = $firestoreClient->addDocument('plans', [
                'name' => $request->name_plan,
                'description' => $request->description_plan,
                'price' => str_replace(',', '.', $request->price_plan), // troca a virgula por ponto (padrão de preço no firestore
                'icon' => $icon,
                'id_user' => '/users/y7yky5ABSlWnTPgXfisIvtx1QBI3',
                'is_active' => $request->active_plan,
                'type' => '1',
                'recurrence' => '1',
                
            ]);
        }


        return redirect('plans')->with('status', 'Plano Adicionado!', 'plan');
    }

    //deleta um plano
    public function deletePlan(Request $request)
    {
        // $plan = Plan::find($request->id_plan);
        // $plan->delete();

        // dd($request->id_plan);
        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        $firestoreClient->deleteDocument('plans/'.$request->id_plan);

        return redirect('plans')->with('status', 'Plano Deletado!', 'plan');
    }
    
    
}
