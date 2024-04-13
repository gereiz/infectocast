<?php

use App\Http\Controllers\Api\Category\CategoryApiController;
use App\Http\Controllers\Api\Category\SubcategoryApiController;
use App\Http\Controllers\Api\Category\TopicsApiController;
use App\Http\Controllers\Api\PodCast\PodCastApiController;
use App\Http\Controllers\Api\Blog\BlogApiController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Policy\PolicyController;
use App\Http\Controllers\Api\Plans\PlanController;



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


        // Categories
        route::get('listCategories',[CategoryApiController::class, 'getCategories']);
        route::post('listSubCategories',[SubCategoryApiController::class, 'getSubCategories']);
        route::post('listTopics',[TopicsApiController::class, 'getTopics']);
        route::post('listTopic',[TopicsApiController::class, 'getTopic']);

        // Blog
        route::get('listPosts',[BlogApiController::class, 'getPosts']);
        route::post('listPost',[BlogApiController::class, 'getPost']);
        
        // Podcast
        route::get('listPodcasts',[PodCastApiController::class, 'getPodcasts']);
        route::post('listPodcast',[PodCastApiController::class, 'getPodcast']);
       
        // Policy
        route::get('activePolicy',[PolicyController::class, 'getActivePolicy']);

        // Plans
        route::get('listPlans',[PlanController::class, 'getPlans']);
        

    });
    
    


});


