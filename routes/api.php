<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\TesteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return response()->json('Logado');
// });


Route::prefix('v1')->group(function () {

    route::post('login', [LoginController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        
        route::get('teste', [TesteController::class, 'teste']);

    });
    
    

});


