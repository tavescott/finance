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

//Homepage Routes
Route::view('/', 'homepage.index')->name('homepage');
Route::view('/maswali', 'homepage.faq')->name('faq');


//Registration steps routes
Route::get('/register/step-one', [\App\Http\Controllers\RegistrationStepsController::class, 'stepOne'])->name('stepOne');
Route::post('/register/step-one', [\App\Http\Controllers\RegistrationStepsController::class, 'stepOnePost'])->name('stepOnePost');

Route::get('/register/step-two', [\App\Http\Controllers\RegistrationStepsController::class, 'stepTwo'])->name('stepTwo');
Route::post('/register/step-two', [\App\Http\Controllers\RegistrationStepsController::class, 'stepTwoPost'])->name('stepTwoPost');

Route::get('/register/step-three', [\App\Http\Controllers\RegistrationStepsController::class, 'stepThree'])->name('stepThree');
Route::post('/register/step-three', [\App\Http\Controllers\RegistrationStepsController::class, 'stepThreePost'])->name('stepThreePost');


//Registration with plan selected route
Route::get('/register/plan/{plan}', [\App\Http\Controllers\RegistrationStepsController::class, 'stepOnePlan'])->name('stepOnePlan');


//Jquery ajax routes for live loading item details
Route::get('purchases/items/{id}', [\App\Http\Controllers\PurchaseController::class, 'show_item']);
Route::get('sales/items/{id}', [\App\Http\Controllers\PurchaseController::class, 'show_item']);


//Routes requiring authentication
Auth::routes();
Route::group( ['middleware' => 'auth'], function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Shared Routes
    Route::resource('owners', \App\Http\Controllers\OwnerController::class);
    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::resource('purchases', \App\Http\Controllers\PurchaseController::class);
    Route::resource('sales', \App\Http\Controllers\SaleController::class);
    Route::resource('expenses', \App\Http\Controllers\ExpenseController::class);


    //Admin Routes
    Route::group(['prefix' => 'admin', 'middleware' => 'role:Admin'], function (){
        Route::resource('/', \App\Http\Controllers\Admin\AdminController::class);
        Route::resource('businesses', \App\Http\Controllers\BusinessController::class);
        Route::resource('plans', \App\Http\Controllers\PlanController::class);
    });
});

