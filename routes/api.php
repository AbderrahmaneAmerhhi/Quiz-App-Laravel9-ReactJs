<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizCateController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizResultController;
use App\Models\QuizCate;
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


 // Quiz api route
Route::apiResource('quiz',QuizController::class);

// Quize ByCategories
Route::get('quiz/{catid}/quizbycatid',[QuizController::class,'quizByCat']);

// quiz categories route
Route::apiResource('catsapi',QuizCateController::class);

// quiz result controller route api

Route::apiResource('results',QuizResultController::class);


Route::get('grbByestablish',[HomeController::class,'GroupByEtablishment']);
