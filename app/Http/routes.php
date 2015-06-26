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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('users', [
    'middleware' => ['auth', 'user_types'],
    'uses' => 'UserController@index',
    'user_types' => ['superadmin']
]);
Route::get('user/create', 'UserController@create');
Route::post('user/store', 'UserController@store');

Route::get('clients', 'ClientController@index');
Route::get('client/create', 'ClientController@create');
Route::post('client/store', 'ClientController@store');
Route::get('client/{client_id}/edit', 'ClientController@edit');
Route::patch('client/{client_id}', 'ClientController@update');

Route::get('worklog', 'WorklogController@index');
Route::get('worklog/create/{client_id?}', 'WorklogController@create');
Route::post('worklog/store', 'WorklogController@store');