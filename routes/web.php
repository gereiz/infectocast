<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TailwickController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    route::get("/", [RouteController::class, 'index'])->name('dashboard');
    
    
    // User
    route::get('users', [UserController::class, 'index']);


    // Category
    route::get('categories', [CategoryController::class, 'index']);
    route::post('addOrEditCategory', [CategoryController::class, 'addOrEditCategory']);
    route::post('deleteCategory', [CategoryController::class, 'deleteCategory']);
});