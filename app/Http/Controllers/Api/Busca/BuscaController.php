<?php

namespace App\Http\Controllers\Api\Busca;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Api\SearchService;


class BuscaController extends Controller
{
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }


    public function search(Request $request)
    {
        $busca = $this->searchService->search($request->search);


        return response()->json($busca, 200);
    }
    
}
