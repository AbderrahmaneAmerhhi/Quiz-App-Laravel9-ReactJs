<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\QuizCateController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\UserController;

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






// chaneg lng
Route::get('/greeting/{locale}',function($locale){
    if(! in_array($locale,['ar','en','fr'])){
       abort(400);
    }
    App::setLocale($locale);
    session()->put('locale', $locale);
     return Redirect::back();
})->name('change.lg');
Route::prefix('admin')->group(function(){
// admin auth
Route::get('/login',[AdminController::class,'auth']);
Route::post('/login',[AdminController::class,'login'])->name('admin.login');
Route::post('/logout',[AdminController::class,'logout'])->name('admin.logout')->middleware('auth:web,admin');

});
// // admin auth
// auth:web,admin auth admin and web guarde to the same route
Route::middleware('auth:web,admin')->group(function(){

    // dashboard index
Route::get('/',[HomeController::class,'index'])->name('dash.index');


// users route
Route::resource('users',UserController::class);
 // establi route
Route::resource('establishment',EstablishmentController::class)->middleware('isEtudiant');
// group route
Route::resource('group',GroupController::class)->middleware('isEtudiant');
// quies categories route
Route::resource('cats',QuizCateController::class)->middleware('isEtudiant');


});

// quiz index for user

Route::get('/All-qzs',function(){
    return view('quiz.indexuser');
});

// quiz index dash
Route::get('{quiz?}',function(){
    return view('quiz.index');
})->where('quiz' , '.*')->middleware('auth:web,admin');


