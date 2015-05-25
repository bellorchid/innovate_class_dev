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

// -------------------- Page Route --------------------

Route::get('/', [
    'as' => 'home',
    'uses' => 'PageController@home',
]);

// -------------------- Student Route --------------------

Route::resource('students', 'StudentController');

// -------------------- Project Route --------------------

Route::resource('projects', 'ProjectController');

// --------------------- Login Route ---------------------

Route::get('login', [
    'middleware' => 'guest', 'as' => 'login', 'uses' => 'StudentController@loginGet']);
Route::post('login', [
    'middleware' => 'guest', 'uses' => 'StudentController@loginPost']);
Route::get('logout', [
    'middleware' => 'auth', 'as' => 'logout', 'uses' => 'StudentController@logout']);
Route::controller('password', 'PasswordController');

// ---------------- StudentDetail Route ------------------

Route::get('student/home', [
    'as' => 'stu_home', 'uses' => 'StudentController@home']);
Route::get('student/edit', [
    'as' => 'stu_edit', 'uses' => 'StudentController@edit']);
Route::post('student/update', [
    'as' => 'stu_update', 'uses' => 'StudentController@update']);

//----------------- StudentProject Route -----------------

Route::get('student/projects',[
	'as' => 'stu_project', 'uses' => 'ProjectController@detail']);
Route::get('project/edit', [
	'as' => 'project_edit', 'uses' => 'ProjectController@deit']);
Route::post('project/update', [
	'as' => 'project_update', 'uses' => 'ProjectController@update']);

// -----------------  Android Api -------------------------

Route::get('/android',[
	'as' => 'androidAPI','uses' => 'StudentController@index']);







// -----------------  test -------------------------
Route::get('/test', [
    'as' => 'test', 'uses' => 'StudentController@insert']);