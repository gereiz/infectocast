<?php

namespace App\Http\Controllers\Api\Policy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    //retorna a política de privacidade ativa
    public function getActivePolicy() {
        $policy = Policy::where('is_active', 1)->first();
        if($policy) {
            return response()->json($policy, 200);
        } else {
            return response()->json(['message' => 'Política de privacidade não encontrada'], 404);
        }
    }
}
 