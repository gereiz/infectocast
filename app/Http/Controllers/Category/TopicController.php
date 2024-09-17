<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Subcategory;
use App\Models\Plan;
use MrShan0\PHPFirestore\FirestoreClient;

use App\Services\Categories\CategoryService;
use App\Services\Categories\SubcategoryService;
use App\Services\Categories\TopicService;
use App\Services\Plans\PlanService;


class TopicController extends Controller
{
    // retorna o index
    public function index()
    {
        $subcategoryService = new SubcategoryService();
        $planService = new PlanService();
        $topicService = new TopicService();

        $subcategories = $subcategoryService->listSubcategories();
        $plans = $planService->listPlans();
        $topics = $topicService->listTopics();

        // dd($topics);
        return view('categories.topics', compact('topics', 'subcategories', 'plans'));
    }

    // retorna a view de adicionar tópico
    public function addTopic($id=null)
    {
        // dd($id);
        $topicService = new TopicService();

        $subcategoryService = new SubcategoryService();
        $planService = new PlanService();

        $subcategories = $subcategoryService->listSubcategories();
        $plans = $planService->listPlans();

        if($id && $id != null){
            $topic = $topicService->getTopic($id);

            return view('categories.add_topic', compact('topic', 'subcategories', 'plans'));
        } else {
            $topic = null;

            return view('categories.add_topic', compact('subcategories', 'plans', 'topic'));
        }

    }

    // adiciona ou edita um tópico
    public function addOrEditTopic(Request $request)
    {


        $topicService = new TopicService();

        $topicFirebase = $topicService->addTopicFirebase($request);

        $topicMysql = $topicService->addTopicMysql($request, $topicFirebase);


        return redirect('topics');
    }

    // deleta um tópico
    public function deleteTopic(Request $request)
    {
        $topicService = new TopicService();

        $topicService->deleteTopic($request);

        toastr()->success('Tópico deletado com sucesso!');
        return back();
    }


}
