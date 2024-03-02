<?php

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

// Route::get('index/{locale}', [TailwickController::class, 'lang']);

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
//     Route::get("/", [RouteController::class, 'index'])->name('dashboard');
//     Route::get("pageTwo", [RouteController::class, 'pageTwo'])->name('page.two');
//     Route::get("{any}", [RouteController::class, 'routes']);
// });


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    route::get("/", [RouteController::class, 'index'])->name('dashboard');
    
    
    // User
    route::get('users', [UserController::class, 'index']);
    
});