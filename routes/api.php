<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::POST('/create','WebsiteController@create');
Route::POST('createPost/{id}','WebsiteController@createPost');
Route::GET('/websites','WebsiteController@websites');
Route::GET('show/{id}','WebsiteController@show');
Route::Delete('delete/{id}', 'WebsiteController@delete');
Route::Delete('/delete', 'WebsiteController@deleteall');
Route::PUT('updatewebsite/{id}','WebsiteController@update');
Route::GET('assignWeb/{id}','WebsiteController@subscribe');
//Route::POST('assignWeb/{id}','WebsiteController@subscribe');

