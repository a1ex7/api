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
	return View::make('welcome');
});


Route::resource('missions', 'MissionController');
Route::resource('targets', 'TargetController');
Route::resource('employees', 'EmployeeController');

Route::group( ['prefix' => 'api/v1'], function()
{
    Route::resource('missions', 'Api\MissionController');
    Route::resource('targets', 'Api\TargetController');
    Route::resource('employees', 'Api\EmployeeController');

    Route::get('missions/{id}/targets', 'Api\RestController@getMissionTargets');
    Route::post('missions/{id}/targets', 'Api\RestController@postMissionTarget');

    Route::get('missions/{mid}/targets/{tid}', 'Api\RestController@getMissionTarget');

    Route::get('missions/{id}/employees', 'Api\RestController@getMissionEmployees');
    Route::post('missions/{id}/employees', 'Api\RestController@postMissionEmployee');

    Route::get('missions/{mid}/employees/{eid}', 'Api\RestController@getMissionEmployee');
    Route::put('missions/{mid}/employees/{eid}', 'Api\RestController@putMissionEmployee');
    Route::put('missions/{id}/cancel', 'Api\RestController@putCancelMission');

});
