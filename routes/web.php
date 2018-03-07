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

//IF YOU WANT A CERTAIN ROOT TO APPEAR IN PERMISSIONS IT MUST HAVE THE NAME FORMAT "example.example" !!!!!!!

//auth routes
Route::get('login', ['uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login','Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
//end auth routes

Route::get('/','HomeController@index');

Route::group(['middleware' => ['auth','permissions']], function () {

    Route::resource('user', 'UserController', [
        'except' => ['show']
    ]);
    Route::get('user/{id}/permissions', ['as' => 'user.getPermissions', 'uses' => 'UserController@getPermissions']);

    Route::resource('role', 'RoleController', [
        'except' => ['show']
    ]);
    Route::get('role/{id}/permissions', ['as' => 'role.getPermissions', 'uses' => 'RoleController@getPermissions']);

    Route::get('welcome',['as' => 'welcome.index', 'uses' => 'WelcomeController@index']);
    Route::get('welcome/admin',['as' => 'welcome.admin', 'uses' => 'WelcomeController@admin']);
    Route::get('welcome/client',['as' => 'welcome.client', 'uses' => 'WelcomeController@client']);
    Route::get('welcome/user',['as' => 'welcome.user', 'uses' => 'WelcomeController@user']);
});