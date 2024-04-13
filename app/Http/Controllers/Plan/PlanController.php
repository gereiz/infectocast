<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    //retorna a pagina index dos planos
    public function index()
    {
        $plans = Plan::all();

        return view('plans.index', compact('plans'));
    }

    //retorna a pagina de adicionar ou editar um plano
    public function addPlan($id = null)
    {
        $plan = Plan::find($id);

        return view('plans.add_plan', compact('plan'));
    }

    //adiciona ou edita um plano
    public function addOrEditPlan(Request $request)
    {
        $request->validate([
            'name_plan' => 'required',
            'price_plan' => 'required',
            'description_plan' => 'required',
            'active_plan' => 'required'
        ]);

        $plan = Plan::find($request->id_plan);

        if ($plan) {
            $plan->name = $request->name_plan;
            $plan->price = str_replace(',', '.', $request->price_plan);
            $plan->description = $request->description_plan;
            $plan->is_active = $request->active_plan;
            $plan->id_user = auth()->user()->id;
            $plan->save();

            return redirect('plans')->with('status', 'Plano Editado!', 'plan');
        } else {
            $plan = new Plan();
            $plan->name = $request->name_plan;
            $plan->price = str_replace(',', '.', $request->price_plan);
            $plan->description = $request->description_plan;
            $plan->is_active = $request->active_plan;
            $plan->id_user = auth()->user()->id;
            $plan->save();

            return redirect('plans')->with('status', 'Plano Adicionado!', 'plan');
        }
    }

    //deleta um plano
    public function deletePlan(Request $request)
    {
        $plan = Plan::find($request->id_plan);
        $plan->delete();

        return redirect('plans')->with('status', 'Plano Deletado!', 'plan');
    }
    
    
}
