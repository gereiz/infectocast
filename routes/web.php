<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\SubCategoryController;
use App\Http\Controllers\Category\TopicController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\PodCast\PodCastController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\Plan\PlanController;
use App\Http\Controllers\Payment\PaymentMpcontroller;
use App\Http\Controllers\TinyMceController;
use App\Http\Controllers\Firebase\FirebaseAuthController;
use App\Http\Controllers\Firebase\FirebaseFirestoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    // firebase
    Route::any('fregister', [FirebaseAuthController::class, 'fregister']);
    Route::any('flogin', [FirebaseAuthController::class, 'flogin']);

    Route::get('firebase', [FirebaseFirestoreController::class, 'index']);


    // Email

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    route::get("/", [RouteController::class, 'index'])->name('dashboard');
    
    
    // User
    route::get('users', [UserController::class, 'index']);


    // Category
    route::get('categories', [CategoryController::class, 'index']);
    route::post('addOrEditCategory', [CategoryController::class, 'addOrEditCategory']);
    route::post('deleteCategory', [CategoryController::class, 'deleteCategory']);

    // SubCategory
    route::get('subcategories', [SubCategoryController::class, 'index']);
    route::post('addOrEditSubCategory', [SubCategoryController::class, 'addOrEditSubCategory']);
    route::post('deleteSubCategory', [SubCategoryController::class, 'deleteSubCategory']);

    // Topic
    route::get('topics', [TopicController::class, 'index']);
    route::get('addTopic/{id?}', [TopicController::class, 'addTopic']);
    route::post('addOrEditTopic', [TopicController::class, 'addOrEditTopic']);
    route::post('deleteTopic', [TopicController::class, 'deleteTopic']);

    // blog
    route::get('blog', [BlogController::class, 'index']);
    route::get('addPost/{id?}', [BlogController::class, 'addPost']);
    route::post('addEditPost', [BlogController::class, 'addEditPost']);
    route::post('deletePost', [BlogController::class, 'deletePost']);

    // Podcast
    route::get('podcast', [PodCastController::class, 'index']);
    route::get('addPodcast/{id?}', [PodCastController::class, 'addPodast']);
    route::post('addEditPodcast', [PodCastController::class, 'addEditPodcast']);
    route::post('deletePodcast', [PodCastController::class, 'deletePodcast']);

    // Privacy Policy
    route::get('privacyPolicy', [PolicyController::class, 'index']);
    route::get('addPolicy/{id?}', [PolicyController::class, 'addPolicy']);
    route::post('addOrEditPolicy', [PolicyController::class, 'addOrEditPolicy']);
    route::post('deletePolicy', [PolicyController::class, 'deletePolicy']);

    // Plan
    route::get('plans', [PlanController::class, 'index']);
    route::get('addPlan/{id?}', [PlanController::class, 'addPlan']);
    route::post('addOrEditPlan', [PlanController::class, 'addOrEditPlan']);
    route::post('deletePlan', [PlanController::class, 'deletePlan']);
    
    // Payment
    route::get('payments', [PaymentMpcontroller::class, 'index']);
    route::get('testPay', [PaymentMpcontroller::class, 'testPay']);
    
    // TinyMCE
    Route::post('/upload', [TinyMceController::class, 'upload']);


    

});