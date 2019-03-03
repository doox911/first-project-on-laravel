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

/**********
* POST -->*
**********/

Route::post( '/updatelogin', 'UserController@updatelogin');
Route::post( '/updatename', 'UserController@updatename');
Route::post( '/updatesecondname', 'UserController@updatesecondname');
Route::post( '/updatepatronumic', 'UserController@updatepatronumic');
Route::post( '/updateemail', 'UserController@updateemail');
Route::post( '/updatefoto', 'UserController@updatefoto');
Route::post( '/removefoto', 'UserController@removefoto');
Route::post( '/updatesignature', 'UserController@updatesignature');
Route::delete( 'user/{user}', 'UserController@destroy')->name('user.destroy');

/**********
*<-- POST *
**********/
/**********
* Tasks -->*
**********/

Route::resource('tasks', 'TaskController');

/**********
*<-- Tasks *
**********/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user', 'UserController@index')->name('user');
