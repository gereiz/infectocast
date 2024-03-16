<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubcategoryApiController extends Controller
{
    // retorna todas as subcategorias pelo id da categoria
    public function getSubCategories(Request $request) {
        
        return response()->json(SubCategory::where('id_category', $request->id_category)->get(), 200);
    }
}
