<?php


Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('/upload', 'HomeController@uploadFiles');
Route::get('/download/{id}', 'HomeController@downloadFiles');
Route::post('/download/{id}', 'HomeController@createLink');
Route::get('/download/{id}/{session}', 'HomeController@download');

//Admin Panel
Route::get('/home', 'PanelController@index');
Route::get('/user', 'PanelController@user');
Route::get('/admin', 'PanelController@admin');
Route::resource('/files', 'FileController');
Route::resource('/users', 'UsersController');
Route::resource('/requests', 'RequestsController');
Route::resource('/downloads', 'DownloadsController');
