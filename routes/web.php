<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'HomeController@login');
Route::get('/energy/form','EnergySupplyController@show');
Route::post('/create/energy','EnergySupplyController@store');
Route::get('/energysupplies','EnergySupplyController@index');
Route::get('/about','HomeController@about');
Route::get('/contact','HomeController@contact');
Route::post('/buy/energy','EnergySupplyController@buy');

Route::get('/market','EnergySupplyController@market');

Route::post('/buy/energy','EnergySupplyController@buy');

//oute::get('/userSupply/{{ $energysupply->user->id }}','EnergySupplyController@market');

// Route::get('/energysupplies/{id}', 'EnergySupplyController@index');
// Route::post('/addComment', 'CommentController@store');
//Route::get('/user/post/{id}', 'EnergySupplyController@show');
Auth::routes();
