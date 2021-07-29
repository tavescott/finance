<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('redirect', [\App\Http\Controllers\HomeController::class, 'redirects'])->name('redirects');

//Homepage Routes
Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index'])->name('homepage');
Route::get('/maswali', [\App\Http\Controllers\HomepageController::class, 'faq'])->name('faq');


//Jquery ajax routes for live loading item details
Route::get('owner/purchases/items/{id}', [\App\Http\Controllers\Owner\PurchaseController::class, 'show_item']);
Route::get('owner/sales/items/{id}', [\App\Http\Controllers\Owner\SaleController::class, 'show_item']);

//Routes requiring authentication
Auth::routes();

//Email Verification Routes
Route::get('/email/verify', [\App\Http\Controllers\MailController::class, 'verifyMail'])->name('verification.notice');
Route::get('/email/verify/{email}/{id}', [\App\Http\Controllers\MailController::class, 'verifyMailButton'])->name('verification.button');
Route::post('/email/verify', [\App\Http\Controllers\MailController::class, 'verifyMailPost'])->name('verification.post');


Route::group( ['middleware' => ['auth']], function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'logout'])->name('home');

    //Admin Routes
    Route::group(['prefix' => 'admin', 'middleware' => 'role:Admin', 'as' => 'admin.'], function (){
        Route::resource('/', \App\Http\Controllers\Admin\AdminController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('businesses', \App\Http\Controllers\Admin\BusinessController::class);
        Route::resource('plans', \App\Http\Controllers\Admin\PlanController::class);
        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    });

    //Owners routes
    Route::group(['prefix' => 'owner', 'middleware' => 'role:Owner', 'as' => 'owner.'], function (){
        Route::resource('/', \App\Http\Controllers\Owner\OwnerController::class);
        Route::resource('/profile', \App\Http\Controllers\Owner\ProfileController::class);
        Route::get('preliminary/business', [\App\Http\Controllers\PreliminaryController::class, 'businessDetails'])->name('preliminary.business');
        Route::post('preliminary/business', [\App\Http\Controllers\PreliminaryController::class, 'businessPost'])->name('preliminary.business.post');
        Route::get('preliminary/personal', [\App\Http\Controllers\PreliminaryController::class, 'personalDetails'])->name('preliminary.personal');
        Route::post('preliminary/personal', [\App\Http\Controllers\PreliminaryController::class, 'personalPost'])->name('preliminary.personal.post');

        Route::resource('businesses', \App\Http\Controllers\Owner\BusinessController::class);
        Route::get('/business/{id}', [\App\Http\Controllers\HomeController::class, 'setCookie'])->name('business.id');
        Route::post('/change-plan', [\App\Http\Controllers\Owner\OwnerController::class, 'change_plan'])->name('change.plan');
        Route::resource('items', \App\Http\Controllers\Owner\ItemController::class);
        Route::resource('purchases', \App\Http\Controllers\Owner\PurchaseController::class);
        Route::resource('sales', \App\Http\Controllers\Owner\SaleController::class);
        Route::resource('expenses', \App\Http\Controllers\Owner\ExpenseController::class);
        Route::resource('records', \App\Http\Controllers\Owner\RecordController::class);
        Route::resource('testimonials', \App\Http\Controllers\Owner\TestimonialController::class);

        //Report Routes
        Route::resource('report', \App\Http\Controllers\Owner\ReportController::class);
        Route::post('report/day', [\App\Http\Controllers\Owner\ReportController::class, 'day_report'])->name('day.report');
        Route::get('today/report', [\App\Http\Controllers\Owner\ReportController::class, 'today_report'])->name('today.report');

    });

    //Helper Routes
    Route::group(['prefix' => 'helper', 'middleware' => 'role:Helper', 'as' => 'helper.'], function () {
        Route::resource('/', \App\Http\Controllers\Helper\HelperController::class);
    });
});

