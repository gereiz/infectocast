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
        $plans = Plan::all();
        return response()->json($plans);
    }
}
