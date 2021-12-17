<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\TypeEntrepreneurController;
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

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', [UserController::class, 'getAuthenticatedUser'])->name('get-user');
    Route::get('company', [CompanyController::class, 'getCompany'])->name('get-company');
    Route::get('influencer', [InfluencerController::class, 'getInfluencer'])->name('get-influencer');
    Route::post('company/update', [CompanyController::class, 'updateCompany'])->name('update-company');
    Route::post('company/register', [CompanyController::class, 'registerCompany'])->name('register-company');
    Route::post('influencer/register', [InfluencerController::class, 'registerInfluencer'])->name('register-influencer');
    Route::post('influencer/update', [InfluencerController::class, 'updateUser'])->name('update-user');
});

Route::group(['middleware' => ['cors']], function () {
    Route::post('user/login', [UserController::class, 'login'])->name('login-user');
    Route::post('user/logout', [UserController::class, 'logout'])->name('logout-user');
    Route::post('user/register', [UserController::class, 'register'])->name('register-user');
    Route::post('user/forgot-password', [MailController::class, 'send'])->name('send-mail');
    Route::get('categories', [CategoryController::class, 'getCategory'])->name('get-category');
    Route::get('typesEntrepreneurs', [TypeEntrepreneurController::class, 'getTypeEntrepreneur'])->name('get-type-entrepreneu');
});
