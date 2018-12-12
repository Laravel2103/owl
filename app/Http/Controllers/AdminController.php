<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Users;
use App\Status;
use App\Comments;
use App\Reviews;
use App\Friends;
use App\Messages;
use App\Admin;
use App\Events\RedisEvent;
use LRedis;

class AdminController extends Controller
{

    // Dang nhap admin
    public function Login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $admin = Admin::where([
            ['email','=',$email],
            ['password','=',$password],
        ])->first();
        if(!empty($admin))
        {
            session()->put('idadmin',$admin->id);
            session()->put('useradmin',$admin->username);
            return redirect()->route('adminindex');
            //var_dump($member);
        }
        else
        {
            return redirect()->route('adminlogin',['error'=>'Tài khoản hoặc mật khẩu không đúng!']);
        }
    }

    public function Logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('adminlogin');
    }
    //
    public function ListUsers()
    {
    	$member = Users::all();
    	return view('admin.thanhvien.users_list',['member'=>$member]);
    }
    // Xoa mot thanh vien
    public function DeleteUser($id)
    {
    	Users::where('_id','=',$id)->delete();
    	Status::where('author','=',$id)->delete();
    	Comments::where('author','=',$id)->delete();
    	// DB::table('banbe')->where('mathanhvien','=',$id)->delete();
    	Messages::where('id_user','=',$id)->delete();
    	Reviews::where('iduser','=',$id)->delete();
    	Friends::where('user1','=',$id)->orwhere('user2','=',$id)->delete();
    	return redirect()->route('listusers');
    }
    // Them mot thanh vien
    public function AddUserView()
    {
    	return view('admin.thanhvien.users_add');
    }
    // Them mot thanh vien
    public function AddUser(Request $request)
    {
    	$db = new Users;
            $db->username = $request->name;
            $db->email = $request->email;
            $db->avatar = 'avatar.png';
            $db->password = $request->id;
            $db->save();
    	

    	return redirect()->route('listusers');
    }
    // Sua thong tin mot thanh vien view
    public function EditUserView($id)
    {
        $member = Users::where('_id','=',$id)->first();

        return view('admin.thanhvien.users_edit',['member'=>$member]);
    }
    // Sua thong tin mot thanh vien
    public function EditUser(Request $request, $id)
    {
        if($request->hasFile('avatar'))
        {
                $name = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move('img',$name);
        }
        else
        {
                $member = Users::where('_id','=',$id)->first();
                $name = $member->avatar;
        }
        Users::where('_id','=',$id)->update([
            'username' => $request['tenthanhvien'],
            'password' => $request['matkhau'],
            'email' => $request['email'],
            'avatar' => $name,
            'ngaysinh' => $request['ngaysinh'],
            'diachi' => $request['diachi'],
            
        ]);

        return redirect()->route('listusers');
    }

    // Trang danh sach status
    public function ListStatus()
    {
        $status = Status::all();
        return view('admin.status.status_list',['status'=>$status]);
    }

    // Xoa 1 status
    public function DeleteStatus($id)
    {
        Reviews::where('idstt','=',$id)->delete();
        Comments::where('idstt','=',$id)->delete();
        Status::where('_id','=',$id)->delete();

        return redirect()->route('liststatus');
    }

    // Them 1 status
    public function AddStatusView()
    {
        return view('admin.status.status_add');
    }

    // Them 1 status
    public function AddStatus(Request $request)
    {
        if($request->hasFile('imagestatus'))
        {
            $imagestatus = $request->file('imagestatus')->getClientOriginalName();
            $request->file('imagestatus')->move('img',$imagestatus);
        }
        else
        {
            $imagestatus = "";
        }
        if ( session('iduser')!= null){
            $content = $request->contentstt;

            $db = new Status;
            $db->content = $content;
            $db->rate = 100;
            $db->images = $imagestatus;
            $db->author = session('iduser');
            $db->time = date('d-m-Y H:i:s');

            $db->save();
        }

        return redirect()->route('liststatus');
    }

    // Trang sua 1 status
    public function EditStatusView($id)
    {
        $status = Status::where('_id','=',$id)->first();

        return view('admin.status.status_edit',['status'=>$status]);
    }

    // Trang danh sach binh luan
    public function ListComment()
    {
        $comment = Comments::all();
        return view('admin.binhluan.comment_list',['comment'=>$comment]);
    }

    // Xoa 1 binh luan
    public function DeleteComment($id)
    {
        Comments::where('_id','=',$id)->delete();

        return redirect()->route('listcomment');
    }

    // Trang them 1 binh luan view
    public function AddCommentView()
    {
        return view('admin.binhluan.comment_add');
    }

    // Them 1 binh luan
    public function AddComment(Request $request)
    {
        
        $db = new Comments;
        $db->author = $request->mathanhvien;
        $db->content = $request->noidung;
        $db->idstt = $request->mastatus;
        $db->time = date('d-m-Y H:i:s');
        $db->save();
        return redirect()->route('listcomment');
    }

    // Trang sua 1 binh luan
    public function EditCommentView($id)
    {
        $comment = Comments::where('author','=',$id)->first();

        return view('admin.binhluan.comment_edit',['comment' => $comment]);
    }
}
