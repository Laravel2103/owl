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
// Route logout
Route::get('logout','UserController@Logout')->name('Logout');

// Route dang nhap thong qua facebook
Route::get('facebook/redirect', 'UserController@redirectToProvider');
Route::get('facebook/callback', 'UserController@handleProviderCallback');
// Route dang nhap thong qua email
Route::get('google/redirect', 'UserController@redirectToProviderGoogle');
Route::get('google/callback', 'UserController@handleProviderCallbackGoogle');

// Route dang ky
Route::post('register','UserController@Register')->name('Register');
// Route dang tai mot status
Route::post('upstt','UserController@UpStt')->name('UpStt');
// Danh gia mot bai viet 
Route::get('confirm{idstt}/{conf}','UserController@Confirm')->name('Confirm');
// Dang tai mot comment
Route::get('postcomment{idstt}/{content}','UserController@PostComment')->name('PostComment');
// Tao ban ban be
Route::get('taobanbe','UserController@taobanbe');
// Ket ban voi mot nguoi ban
Route::get('addfriend{id_user}','UserController@AddFriend')->name('AddFriend');
// Trang ca nhan
Route::get('profile/id','UserController@Profile')->name('Profile');