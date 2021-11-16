<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Main Login 
Route::get('/', function () {
    return view('login');
});

//Company Login
Route::get('login company', function () {
    return view('loginCompany');
});

//Influencer Login
Route::get('login influencer', function () {
    return view('loginInfluencer');
});


Route::get('qwertyuiop', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
