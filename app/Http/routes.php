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

Route::get('/login','StudentController@login');