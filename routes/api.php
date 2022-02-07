<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\CoincidenceController;
use App\Http\Controllers\TypeEntrepreneurController;
use App\Http\Controllers\VentureController;
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

Route::get('influencers', [InfluencerController::class, 'getInfluencers']);
Route::get('ventures', [VentureController::class, 'list']);
Route::get('influencer/{id}', [InfluencerController::class, 'getInfluencerByID']);


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', [UserController::class, 'getAuthenticatedUser'])->name('get-user');
    Route::get('influencer/information', [InfluencerController::class, 'getInformationInfluencer'])->name('get-user');
    Route::get('company', [CompanyController::class, 'getCompany'])->name('get-company');
    Route::get('influencer', [InfluencerController::class, 'getInfluencer'])->name('get-influencer');
    Route::get('matches/realised', [CoincidenceController::class, 'getMatchesRealised'])->name('get-matches-realised');
    Route::get('matches/request', [CoincidenceController::class, 'getMatchesRequest'])->name('get-matches-request');
    Route::get('matches/waiting', [CoincidenceController::class, 'getMatchesWaiting'])->name('get-matches-waiting');
    Route::post('company/update', [CompanyController::class, 'updateCompany'])->name('update-company');
    Route::post('company/register', [CompanyController::class, 'registerCompany'])->name('register-company');
    Route::post('influencer/register', [InfluencerController::class, 'registerInfluencer'])->name('register-influencer');
    Route::post('influencer/update', [InfluencerController::class, 'updateUser'])->name('update-user');
    Route::post('create/match', [CoincidenceController::class, 'createMatch'])->name('create-match');
    Route::post('answer/match', [CoincidenceController::class, 'answerMatch'])->name('answer-match');
    Route::post('create/venture', [VentureController::class, 'createVenture'])->name('create-venture');
    Route::post('edit/venture', [VentureController::class, 'editVenture'])->name('edit-venture');
    Route::post('delete/venture', [VentureController::class, 'deleteVenture'])->name('delete-venture');
    Route::get('venture/{id}', [VentureController::class, 'getVenture'])->name('get-venture');
    Route::get('collaborations', [VentureController::class, 'getVentures'])->name('get-collaboration');
    Route::get('socialNetworks', [InfluencerController::class, 'getSocialNetworks'])->name('get-Social-Networks');
    Route::post('ventures/category', [VentureController::class, 'getVenturesCategory'])->name('get-ventures-category');


});

Route::group(['middleware' => ['cors']], function () {
    Route::post('user/login', [UserController::class, 'login'])->name('login-user');
    Route::post('user/logout', [UserController::class, 'logout'])->name('logout-user');
    Route::post('user/register', [UserController::class, 'register'])->name('register-user');
    Route::post('user/forgot-password', [MailController::class, 'send'])->name('send-mail');
    Route::get('categories', [CategoryController::class, 'getCategory'])->name('get-category');
    Route::get('typesEntrepreneurs', [TypeEntrepreneurController::class, 'getTypeEntrepreneur'])->name('get-type-entrepreneu');
    Route::post('influencerFile', [InfluencerController::class, 'file1']);
    Route::post('companyFile', [CompanyController::class, 'file1']);
    Route::get('typesEntrepreneurs', [TypeEntrepreneurController::class, 'getTypeEntrepreneur'])->name('get-type-entrepreneur');


});
