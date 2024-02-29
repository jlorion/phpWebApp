<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/login',[UserController::class, 'login']);

Route::get('/edit', [UserController::class,'user']);

Route::get('/signup', [UserController::class, 'create']);

Route::post('/signup', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


//paki design tanan below ani plezzzz pinaka una na parameter kay mauna ang url sa imong designan
//paki edit pud sa header mu collapse mn gud and shit

//show everything
Route::get('/', function () {
    return view('index', ['listings'  =>Listings::all()]);
});
//show edit user
Route::get('/user/edit', function() {
    // dd($listing);
    return view('users.edit');//mauni ang location sa file sa reference/views na folder
});
//show specific listing 
Route::get('/sample/{listing}', function(Listings $listing) {
    // dd($listing);
    return view('listings.show', ['listing'=> $listing]);
});
//show edit
Route::get('/sample/{listing}/edit', function(Listings $listing) {
    // dd($listing);
    return view('listings.edit', ['listing'=> $listing]);
});
//show create
Route::get('/listing/create', function() {
    // dd($listing);
    return view('listings.create');
});


Route::post('/listing/edit', function(Request $request){
    dd($request);

});



