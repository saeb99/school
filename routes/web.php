<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale(),],function(){
    Auth::routes();

    Route::group(['middleware' => 'guest'],function(){
        Route::get('/', function () {
            view('auth.login');
        });
    });
});


Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
    ],
    function(){


        Route::get('/dashboard', function () {return view('dashboard');});


        Route::resource('grade' , 'GradeController');
        Route::resource('classroom' , 'ClassroomController');

    });

