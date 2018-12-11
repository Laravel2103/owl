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
// Chap nhan mot loi moi ket ban
Route::get('agreefriend={id_friend}','UserController@AgreeFriend')->name('AgreeFriend');
// Tu choi mot loi moi ket ban
Route::get('unagreeFriend={id_friend}','UserController@UnAgreeFriend')->name('UnAgreeFriend');
// Khung chat box
Route::get('chatbox{id_friend}','UserController@Chatbox')->name('Chatbox');
// Them mot khung chat
Route::get('addchatbox={id_friend}','UserController@AddChatbox')->name('AddChatbox');
// // Tao tin nhan
// Route::get('addmessage','UserController@AddMessage')->name('AddMessage');
// Them tin nhan 
Route::get('addmessages/{id_friend}/{content}','UserController@AddMessages')->name('AddMessages');
// Them tin nhan 
Route::post('addmessages','UserController@AddMessages')->name('AddMessages');
// Trang ca nhan cua mot nguoi
Route::get('profileid{id_user}','UserController@Profile')->name('Profile');
