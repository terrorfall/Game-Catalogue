<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('/', 'HomeController@index');
Route::get('edit/{id}', 'HomeController@edit');
Route::get('delete/{id}', 'HomeController@delete');
Route::get('/platforms', 'PlatformController@index');
Route::get('/platforms/edit/{id}', 'PlatformController@edit');
Route::get('/platforms/delete/{id}', 'PlatformController@delete');

Route::get('/add/game', 'AddController@game');
Route::post('/add/game', 'AddController@saveGame');
Route::get('/add/platform', 'AddController@platform');
Route::post('/add/platform', 'AddController@savePlatform');

Route::post('/edit/platform', 'EditController@updatePlatform');
Route::post('/edit', 'EditController@updateGame');

Route::get('/search', 'FilterController@search');
Route::get('/filter', 'FilterController@filter');
Route::get('/duplicates', 'FilterController@duplicates');

