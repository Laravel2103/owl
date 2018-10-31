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
use Illuminate\Database\Eloquent\Model;

/*Route::get('/', function () {
    return view('welcome');
});*/

	Route::get('model',function(){
		$thanhvien = App\Thanhvien::where('tenthanhvien','Xuan Truong')->get()->toArray();
		var_dump($thanhvien);
		//echo $thanhvien;
	});
	//Route dang nhap
	Route::get('login{error?}',function($error='Bạn phải đăng nhập'){
		return view('users.login',['error'=>$error]);
	})->name('login');
	//Route dang ky
	Route::get('register',function(){
		return view('users.register');
	})->name('register');
	//Route xac thuc dang ky tai khoan
	Route::post('getregister','UserController@register')->name('getregister');
	//Route xac thuc tai khoan dang nhap
	Route::post('getlogin','UserController@login')->name('getlogin');

Route::prefix("/")->middleware('owlmiddle')->group(function(){
	//Route dang xuat
	Route::get('logout','UserController@logout')->name('logout');
	//Route trang chu
	Route::get('index','UserController@Index')->name('index');
	//Route dang tai status
	Route::post('upstatus','UserController@UpStatus')->name('upstatus');
	//Route trang ca nhan
	Route::get('profile={id}','UserController@Profile')->name('profile');
	//Route trang cai dat ca nhan
	Route::get('settup','UserController@Settup')->name('settup');
	//Route cai dat thong tin ca nhan
	Route::post('postsettup','UserController@PostSettup')->name('postsettup');
	//Route yeu thich mot status
	Route::get('stt={stt}','UserController@Like')->name('like');
	//Route binh luan 1 bai viet
	Route::post('comment{mastt}','UserController@Comment')->name('comment');
	//Route gui loi moi ket ban
	Route::get('addfriend={id}','UserController@AddFriend')->name('addfriend');
	//Route chap nhan loi moi ket ban
	Route::get('acceptfriend{id}','UserController@AcceptFriend')->name('acceptfriend');
	//Route tu choi loi moi ket ban
	Route::get('refusefriend={id}','UserController@RefuseFriend')->name('refusefriend');
	//Route huy ket ban voi 1 nguoi
	Route::get('disfriend={id}','UserController@DisFriend')->name('disfriend');
	//Route mo 1 khung chatbox
	Route::get('addchatbox{mabanbe}','UserController@AddChatbox')->name('addchatbox');
	//Route gui 1 tin nhan
	Route::get('sendmessage{message}{mabanbe}','UserController@SendMessage');
});

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
