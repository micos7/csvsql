<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('imageUpload');
});


// for image upload view
Route::post('upload', 'UploadController@view');
// for image upload
Route::post('upload', 'UploadController@upload');


