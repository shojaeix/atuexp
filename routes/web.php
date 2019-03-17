<?php

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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Exp intro page
Route::get('/exp', 'Exp\IntroController@intro')->name('exp.intro');
Route::post('/exp', 'Exp\IntroController@identify')->name('exp.identify');

// Exp steps
Route::get('exp/step/{number}', 'Exp\StepsController@show')->where('number', '[1-4]')->name('exp.step');
Route::post('exp/step/{number}', 'Exp\StepsController@submit')->where('number', '[1-4]')->name('exp.step.submit');


Route::get('clearSession', function(){
    session()->flush();
});

Route::get('exp/result', 'Exp\ResultController@show')->name('exp.result');

Route::get('exp/management', 'Exp\ManagementController@index')->name('exp.management.index');