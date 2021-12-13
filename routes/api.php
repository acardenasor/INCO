<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['cors']], function () {
    Route::get('user/{id}', [UserController::class, 'getUser'])->name('get-user');
    Route::post('user/register', [RegisterController::class, 'storeUser'])->name('register-store');
    Route::post('user/update', [UserController::class, 'updateUser'])->name('update-user');
    Route::post('company/register', [RegisterController::class, 'storeCompany'])->name('register-company');
    Route::post('influencer/register', [RegisterController::class, 'storeInfluencer'])->name('register-influencer');
    Route::post('loginUser', [LoginController::class, 'login'])->name('user-login');
    Route::post('send', [MailController::class, 'send'])->name('send-mail');
    Route::post('update/company', [UserController::class, 'updateCompany'])->name('update-company');
});
