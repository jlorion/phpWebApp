<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingsController;
use Illuminate\Http\Request;
use App\Models\Listings;

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

Route::middleware('auth')->group(function(){

Route::get('/edit', [UserController::class,'user']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
//edit user
Route::get('/user/edit', [UserController::class, 'user']);
Route::post('/user/edit', [UserController::class, 'update']);
//delete listing
Route::delete('/listings/{listing}', [ListingsController::class, 'destroy']);
//edit listing
Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit']);
Route::post('/listings/{listing}/edit', [ListingsController::class, 'update']);
//create listing
Route::get('/listing/create', [ListingsController::class, 'create']);
Route::post('/listing/create', [ListingsController::class, 'store']);
});
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/signup', [UserController::class, 'create'])->middleware('guest');
Route::post('/signup', [UserController::class, 'store']);

//show everything
Route::get('/', [ListingsController::class, 'index']);
//show specific listing
Route::get('/listings/{listing}', [ListingsController::class, 'show']);
//show create



