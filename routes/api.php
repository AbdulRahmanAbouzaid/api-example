<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/v1')->group( function(){

	Route::group([

	    'prefix' => '/lessons',
	    'middleware' => 'jwt.auth'
	    
	], function () {

	    Route::get('/', 'LessonsController@findAll');
		Route::post('/', 'LessonsController@create');
		Route::get('/{lesson_id}', 'LessonsController@findById');
		Route::put('/update/{lesson_id}', 'LessonsController@update');
		Route::delete('/delete/{lesson_id}', 'LessonsController@delete');

	});

	Route::post('/login', 'logsController@login');
});