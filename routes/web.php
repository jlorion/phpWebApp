<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('main');
});

Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/login',[UserController::class, 'login']);


Route::get('/signup', [UserController::class, 'create']);

Route::post('/signup', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');




