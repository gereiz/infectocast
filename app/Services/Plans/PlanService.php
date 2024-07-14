<?php

namespace App\Services\Plans;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\PLan;


use MrShan0\PHPFirestore\Fields\FirestoreReference;
use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\Fields\FirestoreTimestamp;

class PlanService {

    private $connection;

    public function __construct()
    {
        $this->connection = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);
    }


    public function listPlans()
    {
        $plans = $this->connection->listDocuments('plans')['documents'];

        return $plans;
    }

    public function getPlan($id)
    {
        $plan = $this->connection->getDocument('plans/'.$id);

        return $plan;
    }

    public function addOrEditPlanFirebase($request)
    {
        $storage = app('firebase.storage');
        $bucket = $storage->getBucket();


        if($request->icon_plan){
            $bucket->upload(
                file_get_contents($request->icon_plan),
                [
                    'name' => 'icons/'.$request->icon_plan->getClientOriginalName()
                ]
            );

            // retorna a url da imagem
            $icon = $bucket->object('icons/'.$request->icon_plan->getClientOriginalName())->signedUrl(new \DateTime('tomorrow'));

        } else  {
            $icon = $request->icon_path;
        }

        $data = [
            'name' => $request->name_plan,
            'description' => $request->description_plan,
            'price' => intval(str_replace(',', '.', $request->price_plan)), // troca a virgula por ponto (padrão de preço no firestore
            'icon' => $icon,
            'id_user' => new FirestoreReference('/users/y7yky5ABSlWnTPgXfisIvtx1QBI3'),
            'is_active' => intval($request->active_plan),
            'type' => 1,
            'recurrence' => 1,
        ];

        if($request->id_plan){
            $plan = $this->connection->updateDocument('plans/'.$request->id_plan, $data, [
                'exists' => true, // Indica que o documento deve existir
            ]);

        }else{
            $plan = $this->connection->addDocument('plans', $data);
        }

        return $plan;
    }

    public function addOrEditPlanMysql($request) {
        // dd($request->all());

        if($request->id_plan){
            $plan = Plan::find($request->id_plan);

            // dd($request->all());
            $plan->name = $request->name_plan;
            $plan->description = $request->description_plan;
            $plan->price = str_replace(',', '.', $request->price_plan);
            
            // Adiciona a imagem no MySQL
            if($request->hasFile('icon_plan')) {
                $file = $request->file('icon_plan');
                $filename = $file->getClientOriginalName();
                $file->move(storage_path('app/public/imgplan'), $filename);
                $plan->icon = $filename;
            }

            $plan->is_active = $request->active_plan;
            $plan->type = 1;
            $plan->recurrence = 1;
            $plan->price_id = $request->price_id;
            $plan->id_user = auth()->user()->id;

            $plan->save();

            return $plan;
        } else {
            $plan = new Plan();
            
          

            $plan->name = $request->name_plan;
            $plan->description = $request->description_plan;
            $plan->price = str_replace(',', '.', $request->price_plan);
            
            // Adiciona a imagem no MySQL
            if($request->hasFile('icon_plan')) {
                $file = $request->file('icon_plan');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(storage_path('app/public/imgcat'), $filename);
                $plan->icon = $filename;
            }

            $plan->is_active = $request->active_plan;
            $plan->type = 1;
            $plan->recurrence = 1;
            $plan->price_id = $request->price_id;
            $plan->id_user = auth()->user()->id;

            $plan->save();

            return $plan;
        }        
    
    }

    public function deletePlanFirebase($request)
    {
        $this->connection->deleteDocument('plans/'.$request->id_plan);
    }

    public function deletePlanMysql($request)
    {
        $plan = Plan::find($request->id_plan);
        $plan->delete();
    }
}