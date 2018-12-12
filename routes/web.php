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
Route::get('chatbox{id_friend}{countbox}','UserController@Chatbox')->name('Chatbox');
// Them mot khung chat
Route::get('addchatbox={id_friend}={countbox}','UserController@AddChatbox')->name('AddChatbox');
// // Tao tin nhan
// Route::get('addmessage','UserController@AddMessage')->name('AddMessage');
// Them tin nhan 
Route::get('addmessages/{id_friend}/{content}','UserController@AddMessages')->name('AddMessages');
// Them tin nhan 
Route::post('addmessages','UserController@AddMessages')->name('AddMessages');
// Trang ca nhan cua mot nguoi
Route::get('profileid{id_user}','UserController@Profile')->name('Profile');
//Route trang cai dat ca nhan
Route::get('setting','UserController@Settup')->name('setting');
//Route cai dat thong tin ca nhan
Route::post('postsettup','UserController@PostSettup')->name('postsetting');

//Route trang dang nhap admin/login
	Route::get('admin/login{error?}',function($error = ""){
		return view('admin.login_admin',['error'=>$error]);
	})->name('adminlogin');
	// Route xac nhan admin
	Route::post('admin/getlogin','AdminController@Login')->name('admingetlogin');
//Route trang chu admin
Route::prefix("admin")->middleware('adminmiddle')->group(function(){
	//Route dang xuat
	Route::get('logout','AdminController@Logout')->name('adminlogout');
	//Route trang danh sach admin/adminee
	Route::get('index',function(){
		return view('admin.index');
	})->name('adminindex');
	//Route trang sanh sach thanh vien
	Route::get('listusers','AdminController@ListUsers')->name('listusers');
	//Route xoa mot thanh vien
	Route::get('deleteuser{id}','AdminController@DeleteUser')->name('deleteuser');
	//Route them mot thanh vien
	Route::get('adduserview','AdminController@AddUserView')->name('adduserview');
	//Route them mot thanh vien
	Route::post('adduser','AdminController@AddUser')->name('adduser');
	//Route hien view sua mot thanh vien
	Route::get('edituserview{id}','AdminController@EditUserView')->name('editusername');
	//Route sua thong tin mot thanh vien
	Route::post('edituser{id}','AdminController@EditUser')->name('edituser');
	//Route trang danh sach status
	Route::get('liststatus','AdminController@ListStatus')->name('liststatus');
	//Route xoa 1 status
	Route::get('deletestatus{id}','AdminController@DeleteStatus')->name('deletestatus');
	//Route trang them 1 status
	Route::get('addstatusview','AdminController@AddStatusView')->name('addstatusview');
	//Route trang them 1 status
	Route::post('addstatus','AdminController@AddStatus')->name('addstatus');
	//Route trang sua 1 status
	Route::get('editstatusview{id}','AdminController@EditStatusView')->name('editstatusview');
	//Route trang danh sach binh luan
	Route::get('listcomment','AdminController@ListComment')->name('listcomment');
	//Route xoa 1 binh luan
	Route::get('deletecomment{id}','AdminController@DeleteComment')->name('deletecomment');
	//Route trang them 1 binh luan
	Route::get('addcommentview','AdminController@AddCommentView')->name('addcommentview');
	//Route them 1 binh luan
	Route::post('addcomment','AdminController@AddComment')->name('addcomment');
	//Route sua 1 binh luan
	Route::get('editcommentview{id}','AdminController@EditCommentView')->name('editcommetview');
	//Route sua 1 binh luan
	Route::post('editcomment','AdminController@EditComment')->name('editcomment');
});
    