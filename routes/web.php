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

Route::get('user/{id}/matchs/index', 'MatchController@indexForUser')->name('matchs.mymatchs');
Route::get('matchs/joined', 'MatchController@matchsJoined')->name('matchs.matchsJoined');
Route::get('user/{id}/matchs/create', 'MatchController@create')->name('matchs.create');
Route::post('matchs/{id}', 'MatchController@store')->name('matchs.store');
Route::get('matchs/search', 'MatchController@search')->name('matchs.search');
Route::get('matchs/{id}', 'MatchController@show')->name('matchs.show');
Route::get('matchs/{id}/join', 'MatchController@joinToMatch')->name('matchs.join');
Route::get('matchs/{id}/players', 'MatchController@showPlayers')->name('matchs.players');
Route::post('matchs/{match}/players/{id}', 'MatchController@pushOut')->name('matchs.pushOut');
Route::get('matchs/{id}/destroy', 'MatchController@destroy')->name('matchs.destroy');


Route::get('messages', 'MessageController@indexForUser')->name('message.indexForUser');
Route::resource('message', 'MessageController');
Route::post('message/markasread/{id}/{read}', 'MessageController@markAsRead')->name('message.markAsRead');
Route::post('message/markasunread/{id}/{read}', 'MessageController@markAsUnRead')->name('message.markAsUnRead');

Route::resource('user', 'UserController');

