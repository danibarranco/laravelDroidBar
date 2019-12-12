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
Route::resource('employee', 'EmployeeController', ['except'=> ['create', 'edit']]);
Route::resource('product', 'ProductController', ['except'=> ['create', 'edit']]);
Route::resource('command', 'CommandController', ['except'=> ['create', 'edit']]);
Route::resource('ticket', 'TicketController', ['except'=> ['create', 'edit']]);
Route::get('command/served/{id}', 'CommandController@served');
