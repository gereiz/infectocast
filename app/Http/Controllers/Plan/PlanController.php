<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\Attributes\FirestoreDeleteAttribute;
use App\Services\Plans\PlanService;


class PlanController extends Controller
{
    //retorna a pagina index dos planos
    public function index()
    {
        // $planService = new PlanService();

        // $plans = $planService->listPlans();

        $plans = Plan::all();

        return view('plans.index', compact('plans'));
    }

    //retorna a pagina de adicionar ou editar um plano
    public function addPlan($id = null)
    { 
        //   dd($id);

        // $planService = new PlanService();


        if($id){
            $plan = Plan::find($id);
        }else{
            $plan = null;
        
        }

       

        return view('plans.add_plan', compact('plan'));
    }

    //adiciona ou edita um plano
    public function addOrEditPlan(Request $request)
    {
        $planService = new PlanService();

        // try {
        //     $planService->addOrEditPlanFirebase($request);
        // } catch (\Exception $e) {
        //     toastr()->error($e->getMessage());

        //     return back();
        // }

        try {
            $planService->addOrEditPlanMySQL($request);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back();
        }
        

        toastr()->success('Plano Criado!');
        return redirect('plans');
    }

    //deleta um plano
    public function deletePlan(Request $request)
    {
        // $planService = new PlanService();

        // try {
        //     $planService->deletePlanFirebase($request);
        // } catch (\Exception $e) {
        //     toastr()->error($e->getMessage());

        //     return back();
        // }

        try {
            $plan = Plan::find($request->id_plan);
            $plan->delete();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());

            return back();
        }

        toastr()->success('Plano Deletado!');

        return back();
    }
    
    
}
