<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::POST('/create','PostController@create');
Route::GET('/websites','PostController@websites');
Route::GET('show/{id}','PostController@show');
Route::Delete('delete/{id}', 'PostController@delete');
Route::Delete('/delete', 'PostController@deleteall');
Route::PUT('updatepost/{id}','PostController@update');
