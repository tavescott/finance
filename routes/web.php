<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Role;

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

Route::view('/', 'homepage.index')->name('homepage');
Route::view('/maswali', 'homepage.faq')->name('faq');

Auth::routes();

Route::group( ['middleware' => 'auth'], function (){

    //Shared Routes
    Route::resource('owners', \App\Http\Controllers\OwnerController::class);
    //Admin Routes
    Route::group(['prefix' => 'admin', 'middleware' => 'role:Admin'], function (){
        Route::resource('/', \App\Http\Controllers\Admin\AdminController::class);
        Route::resource('businesses', \App\Http\Controllers\BusinessController::class);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register/plan/{plan}', [\App\Http\Controllers\HomeController::class, 'stepOnePlan'])->name('stepOnePlan');

Route::get('/register/step-one', [\App\Http\Controllers\HomeController::class, 'stepOne'])->name('stepOne');
Route::post('/register/step-one', [\App\Http\Controllers\HomeController::class, 'stepOnePost'])->name('stepOnePost');

Route::get('/register/step-two', [\App\Http\Controllers\HomeController::class, 'stepTwo'])->name('stepTwo');
Route::post('/register/step-two', [\App\Http\Controllers\HomeController::class, 'stepTwoPost'])->name('stepTwoPost');

Route::get('/register/step-three', [\App\Http\Controllers\HomeController::class, 'stepThree'])->name('stepThree');
Route::post('/register/step-three', [\App\Http\Controllers\HomeController::class, 'stepThreePost'])->name('stepThreePost');

