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
	return View::make('index');
});


Route::resource('missions', 'MissionController');
Route::resource('targets', 'TargetController');
Route::resource('employees', 'EmployeeController');

Route::group( ['prefix' => 'api/v1'], function()
{
    Route::resource('missions', 'Api\MissionController');
    Route::resource('targets', 'Api\TargetController');
    Route::resource('employees', 'Api\EmployeeController');

});
