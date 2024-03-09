<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
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

// Register



Route::prefix('v1')->group(function () {
    route::post('register', [RegisterController::class, 'register']);
    route::post('login', [LoginController::class, 'login']);

    

    Route::middleware('auth:sanctum')->group(function () {


        // Users
        route::get('getUser', [LoginController::class, 'getUser']);


        // Category
        route::get('listCategories',[CategoryApiController::class, 'getCategories']);


    });
    
    

});


