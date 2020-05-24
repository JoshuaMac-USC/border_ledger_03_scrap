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
    return view('welcome');
});
Route::get('/ledgers','LedgerController@index')->middleware('auth');
Route::post('/locations/dataAjax/', 'LocationController@dataAjax')->name('locations.dataAjax');
Route::post('/ledgers','LedgerController@store')->middleware('auth');
Route::get('/usermanage','UserController@index')->middleware('auth');
Route::get('/profilesetting','UserController@edit')->name('user.edit');
Route::post('/profilesetting','UserController@update')->name('user.update');

//Route::get('/test', 'LocationController@layout');

Route::delete('/users/{id}', 'UserController@destroy');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');