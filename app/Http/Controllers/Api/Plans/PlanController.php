<?php

namespace App\Http\Controllers\Api\Plans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    //retorna todos os planos
    public function getPlans()
    {
        $plans_formated = [];

        $plans = Plan::all();
        foreach ($plans as $plan) {
            $plan->price = number_format($plan->price, 2, ',', '.');
            $plans_formated[] = $plan;
        }
        return response()->json($plans_formated);
    }
}
 