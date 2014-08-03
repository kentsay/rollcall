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

Route::group(array('prefix' => 'admintool'), function()
{
  Route::resource('users',    'AdminUsersController');
  Route::resource('rollcall', 'AdminRollCallController');
  Route::resource('report',   'AdminReportController');
});

Route::group(array('prefix' => 'ws/v1'), function()
{
  Route::resource('users',    'UsersController');
  Route::resource('rollcall', 'RollCallController');
});

