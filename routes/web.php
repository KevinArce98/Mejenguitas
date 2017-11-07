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
})->name('/');

Auth::routes();

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'MatchController@index')->name('home');

Route::resource('requests', 'RequestAdminController');

Route::get('matchs/{id}/index', 'MatchController@indexForUser')->name('matchs.mymatchs');
Route::get('matchs/joined', 'MatchController@matchsJoined')->name('matchs.matchsJoined');
Route::get('matchs/{id}/create', 'MatchController@create')->name('matchs.create');
Route::post('matchs/{id}', 'MatchController@store')->name('matchs.store');
Route::get('matchs/{id}', 'MatchController@show')->name('matchs.show');


Route::resource('message', 'MessageController');

Route::resource('user', 'UserController');


