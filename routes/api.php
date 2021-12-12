<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginRController;

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
    Route::post('user/register', [LoginController::class, 'storeUser'])->name('register-store');
    Route::post('company/register', [LoginController::class, 'storeCompany'])->name('register-company');
    Route::post('influencer/register', [LoginController::class, 'storeInfluencer'])->name('register-influencer');
    Route::post('loginUser', [LoginRController::class, 'login'])->name('user-login');
    Route::post('/send',  [MailController::class, 'send'])->name('send-mail');
});
