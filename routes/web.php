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

// Route::get('/', function () {
//     return view('welcome');
// });

// Index of Owl Study website
Route::get('/', 'UserController@ViewHome')->name('owl-index');

Route::get("testr","UserController@test");

// Route dang nhap
Route::post('login','UserController@Login')->name('Login');
// Route dang ky
Route::post('register','UserController@Register')->name('Register');
// Route dang tai mot status
Route::post('upstt','UserController@UpStt')->name('UpStt');
// Danh gia mot bai viet 
Route::get('confirm{idstt}/{conf}','UserController@Confirm')->name('Confirm');
// Dang tai mot comment
Route::get('postcomment{idstt}/{content}','UserController@PostComment')->name('PostComment');
