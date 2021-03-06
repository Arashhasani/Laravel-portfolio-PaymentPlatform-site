<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(\route('firstpay'));
})->middleware(['web','auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/payment')->namespace('App\Http\Controllers\Payment')->middleware(['web','auth'])->group(function (){

    Route::get('firstpay','PaymentController@firstPay')->name('firstpay');
    Route::get('firstpayshowform','PaymentController@showForm')->name('showform');
    Route::post('firstpayshowform','PaymentController@payment')->name('payment');

    Route::get('accept','PaymentController@accept')->name('accept');



});