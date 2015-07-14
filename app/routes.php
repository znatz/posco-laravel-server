<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::controller('/Master', "MasterRecordController");

Route::get('/register', function()
{
    return View::make('registration');
});

Route::resource('employees', 'EmployeesController');
Route::post('/iosReceiver', "iosReceiver@index");
Route::resource('dataFromIOs', 'DataFromIOsController');
