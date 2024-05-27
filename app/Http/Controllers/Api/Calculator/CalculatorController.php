<?php

namespace App\Http\Controllers\Api\Calculator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Api\CalculatorService;

class CalculatorController extends Controller
{
    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }


    public function clearenceOfCreatine(Request $request) {
        // altera a virgula para ponto
        $creatinina = intval(str_replace([',', '.'], '', $request->creatinina));

        $clearence = $this->calculatorService->clearenceOfCreatine($request->idade, $request->peso, ($creatinina * 100), $request->sexo);
        
        return response()->json(['clearence' => $clearence.' mL/min'], 200);
    }
}
