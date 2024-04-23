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
        // dd($request->all());
        $request->validate([
            'name_plan' => 'required',
            'icon_plan' => 'required',
            'price_plan' => 'required',
            'type_plan' => 'required',
            'recurrence_plan' => 'required',
            'description_plan' => 'required',
            'active_plan' => 'required'
        ]);

        if($request->hasFile('icon_plan')) {
            $file = $request->file('icon_plan');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('app/public/imgplan'), $filename);
        }

        $type = $request->type_plan == 1 ? 1 : 12;

        if(intval($request->price_plan) > 0) {
            $price = str_replace(',', '.', $request->price_plan);

            $mp_plan = Plan::make()
            ->setFrequency(1)
            ->setFrequencyType(FrequencyType::MONTHS)
            ->setRepetitions($type)
            ->setBillingDay(15)
            ->setBillingDayProportional(true)
            ->setFreeTrial(0, FrequencyType::DAYS)
            ->setTransactionAmount($price)
            ->setCurrencyId(Currency::BRL)
            ->setReason($request->name_plan)
            ->setBackUrl('https://infectoadm.ibitweb.com.br/login/backurl')
            ->setPaymentMethodsAllowed([PaymentType::CREDIT_CARD, PaymentType::DEBIT_CARD]);
        
            $response = MercadoPago::plan()->create($mp_plan);

        } else  {
            $price = '0.00';
            $response = null;
        }

        
        // dd($response['body']->id);

        $plan = Plan::find($request->id_plan);
       
        if ($plan) {
            $plan->name = $request->name_plan;
            $plan->icon = $filename;
            $plan->price = $price ? $price : str_replace(',', '.', $plan->price);
            $plan->type = $request->type_plan;
            $plan->recurrence = $request->recurrence_plan;
            $plan->description = $request->description_plan;
            $plan->is_active = $request->active_plan;
            $plan->mp_plan_id = isset($response['body']->id) ? $response['body']->id : null;
            $plan->id_user = auth()->user()->id;
            $plan->save();

            return redirect('plans')->with('status', 'Plano Editado!', 'plan');
        } else {
            $plan = new Plan();
            $plan->name = $request->name_plan;
            $plan->icon = $filename;
            $plan->price = $price ? $price : str_replace(',', '.', $plan->price);
            $plan->type = $request->type_plan;
            $plan->recurrence = $request->recurrence_plan;
            $plan->description = $request->description_plan;
            $plan->is_active = $request->active_plan;
            $plan->mp_plan_id = isset($response['body']->id) ? $response['body']->id : null;
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
