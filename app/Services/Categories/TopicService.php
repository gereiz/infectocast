<?php

namespace App\Services\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Subcategory;
use App\Models\Topic;


use MrShan0\PHPFirestore\Fields\FirestoreReference;
use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\Fields\FirestoreTimestamp;

use App\Services\Categories\SubcategoryService;
use App\Services\Plans\PlanService;


class TopicService {

    private $connection;

    public function __construct()
    {
        $this->connection = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);
    }


    public function listTopics()
    {
        $topics = $this->connection->listDocuments('topics', ['pageSize' => 9999])['documents'];

        return $topics;
    }

    public function getTopic($id)
    {
        $topic = $this->connection->getDocument('topics/'.$id);

        return $topic;
    }

    public function addTopicFirebase($request)
    {
        if($request->subcategory == null) {
            toastr()->error('Selecione uma subcategoria!');
            return redirect()->back();
        }

        $data = [
            // Se gold ou premium estiverem marcados, o valor de Free é 0
            'Free' => in_array('Gold', $request->access_topic) || in_array('Premium', $request->access_topic) ? 0 : 1,
            // Verifica se existe o valor Gold no array access_topic e se sim, atribui o valor 1
            'Gold' => in_array('Gold', $request->access_topic) ? 1 : 0,
            // Verifica se existe o valor Premium no array access_topic e se sim, atribui o valor 1
            'Premium' => in_array('Premium', $request->access_topic) ? 1 : 0,
            'content' => $request->content_topic,
            'title' => $request->title_topic,
            'id_subcategory' => new FirestoreReference('subcategories/'.$request->subcategory),
            'created_at' => new FirestoreTimestamp(new \DateTime()),
            'updated_at' => new FirestoreTimestamp(new \DateTime()),
            'id_user' => new FirestoreReference('/users/y7yky5ABSlWnTPgXfisIvtx1QBI3'),
            'id' => $request->id_topic

        ];

        if($request->id_topic) {
            $topic = $this->connection->setDocument('topics/'.$request->id_topic , $data,
                [
                    'exists' => true, // Indica que o documento deve existir
                ]);

                toastr()->success('Tópico atualizado com sucesso!');
        } else {

            $topic = $this->connection->addDocument('topics', $data);

            toastr()->success('Tópico criado com sucesso!');
        }




        return $topic;
    }

    // public function addTopicMySQL($request)
    // {
    //     // dd($request->all());

    //     if($request->id_topic) {

    //         $subcategoryService = new SubcategoryService();

    //         $subcategory = $subcategoryService->getSubcategory($request->subcategory);

    //         $topic = Topic::where('title', $request->old_title_topic)->first();

    //         $topic->title = $request->title_topic;
    //         $topic->content = $request->content_topic;
    //         $topic->id_subcategory = Subcategory::where('title', $subcategory->get('title'))->first()->id;
    //         $topic->id_user = auth()->user()->id;
    //         $topic->Free = 1;
    //         $topic->Gold = in_array('Gold', $request->access_topic) ? 1 : 0;
    //         $topic->Premium = in_array('Premium', $request->access_topic) ? 1 : 0;
    //         $topic->save();

    //         return $topic;

    //     } else {
    //         $subcategoryService = new SubcategoryService();

    //         $subcategory = $subcategoryService->getSubcategory($request->subcategory);

    //         $topic = new Topic();

    //         $topic->title = $request->title_topic;
    //         $topic->content = $request->content_topic;
    //         $topic->id_subcategory = Subcategory::where('title', $subcategory->get('title'))->first()->id;
    //         $topic->id_user = auth()->user()->id;
    //         $topic->Free = 1;
    //         $topic->Gold = in_array('Gold', $request->access_topic) ? 1 : 0;
    //         $topic->Premium = in_array('Premium', $request->access_topic) ? 1 : 0;
    //         $topic->save();

    //         return $topic;
    //     }
    // }


    public function deleteTopic($request)
    {
        $topic = $this->connection->deleteDocument('topics/'.$request->id_topic);

        return $topic;
    }

}
