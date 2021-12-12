<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginRController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

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
    return view('loginApp');
}) ;

Route::get('/registro', function () {
    return view('login');
} )->name('registro');

Route::get('/perfil', function () {
    return view('influencerView');
} )->name('perfil');

Route::get('/colaboraciones', function () {
    return view('influencerRepo');
} )->name('colaboraciones');

Route::get('/calificaciones', function () {
    return view('influencerCal');
} )->name('calificaciones');

Route::get('/miCuentainfluencer', function () {
    return view('influencerConfig');
} )->name('miCuentaInfluencer');

Route::get('/profileEntrepreneur', function () {
    return view('entrepreneurView');
} )->name('profileEntrepreneur');

Route::get('/entrepreneurCreate', function () {
    return view('entrepreneurCreate');
} )->name('entrepreneurCreate');

Route::get('/entrepreneurCollaboration', function () {
    return view('entrepreneurRepo');
} )->name('entrepreneurColaboration');

Route::get('/entrepreneurConfig', function () {
    return view('entrepreneurConfig');
} )->name('entrepreneurConfig');

Route::post('user/register', [LoginController::class, 'storeUser'])->name('register-store');
Route::post('company/register', [LoginController::class, 'storeCompany'])->name('register-company');
Route::post('influencer/register', [LoginController::class, 'storeInfluencer'])->name('register-influencer');
Route::post('loginUser', [LoginRController::class, 'login'])->name('user-login');
Route::post('patata',[MailController::class, 'send'])->name('Email');


Route::get('/resetPass', function () {
    return view('resetPass');
})->name('resetPass');

//Company Login
Route::get('login/company', function () {
    return view('loginCompany');
})->name('login-company');

//Influencer Login
Route::get('login/influencer', function () {
    return view('loginInfluencer');
})->name('login-influencer');


Route::get('qwertyuiop', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// intento del correo
//ruta del formulario
Route::get('/form', [App\Http\Controllers\MailController::class, 'index']);
// ruta al enviar correo
Route::post('/send',  [App\Http\Controllers\MailController::class, 'send']);