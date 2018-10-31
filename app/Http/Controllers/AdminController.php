<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AdminController extends Controller
{

    // Dang nhap admin
    public function Login(Request $request)
    {
        $email = $request['email'];
        $matkhau = $request['matkhau'];

        $admin = DB::table('admin')->where([
            ['email','=',$email],
            ['matkhau','=',$matkhau],
            ])->first();
        if(!empty($admin))
        {
            session()->put('maadmin',$admin->maadmin);
            session()->put('tenadmin',$admin->tenadmin);
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
    	$member = DB::table('thanhvien')->get();
    	return view('admin.thanhvien.users_list',['member'=>$member]);
    }
    // Xoa mot thanh vien
    public function DeleteUser($id)
    {
    	DB::table('yeuthich')->where('mathanhvien','=',$id)->delete();
    	DB::table('binhluan')->where('mathanhvien','=',$id)->delete();
    	DB::table('status')->where('mathanhvien','=',$id)->delete();
    	// DB::table('banbe')->where('mathanhvien','=',$id)->delete();
    	DB::table('tinnhan')->where('mathanhvien','=',$id)->delete();
    	DB::table('baiviet')->where('mathanhvien','=',$id)->delete();
    	DB::table('thanhvien')->where('mathanhvien','=',$id)->delete();
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
    	DB::table('thanhvien')->insert([
    		'tenthanhvien' => $request['tenthanhvien'],
    		'matkhau' => $request['matkhau'],
    		'email' => $request['email'],
    		'anhdaidien' => 'avatar.jpg'
    	]);

    	return redirect()->route('listusers');
    }
    // Sua thong tin mot thanh vien view
    public function EditUserView($id)
    {
        $member = DB::table('thanhvien')->where('mathanhvien','=',$id)->first();

        return view('admin.thanhvien.users_edit',['member'=>$member]);
    }
    // Sua thong tin mot thanh vien
    public function EditUser(Request $request, $id)
    {
        if($request->hasFile('anhdaidien'))
        {
                $name = $request->file('anhdaidien')->getClientOriginalName();
                $request->file('anhdaidien')->move('images',$name);
        }
        else
        {
                $member = DB::table('thanhvien')->where('mathanhvien','=',$id)->first();
                $name = $member->anhdaidien;
        }
        DB::table('thanhvien')->where('mathanhvien','=',$id)->update([
            'tenthanhvien' => $request['tenthanhvien'],
            'matkhau' => $request['matkhau'],
            'email' => $request['email'],
            'anhdaidien' => $name,
            'ngaysinh' => $request['ngaysinh'],
            'diachi' => $request['diachi'],
            'xu' => $request['xu'],
        ]);

        return redirect()->route('listusers');
    }

    // Trang danh sach status
    public function ListStatus()
    {
        $status = DB::table('status')->get();
        return view('admin.status.status_list',['status'=>$status]);
    }

    // Xoa 1 status
    public function DeleteStatus($id)
    {
        DB::table('yeuthich')->where('mastatus','=',$id)->delete();
        DB::table('binhluan')->where('mastatus','=',$id)->delete();
        DB::table('status')->where('mastatus','=',$id)->delete();

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
        if($request->hasFile('anhstatus'))
        {
                $anhstatus = $request->file('anhstatus')->getClientOriginalName();
                $request->file('anhstatus')->move('images',$anhstatus);
        }
        else
        {
                $anhstatus = "";
        }
        DB::table('status')->insert([
            'mathanhvien' => $request['mathanhvien'],
            'ngaygio' => date('Y-m-d H:i:s'),
            'noidung' => $request['noidung'],
            'hinhanh' => $anhstatus
        ]);

        return redirect()->route('liststatus');
    }

    // Trang sua 1 status
    public function EditStatusView($id)
    {
        $status = DB::table('status')->where('mastatus','=',$id)->first();

        return view('admin.status.status_edit',['status'=>$status]);
    }

    // Trang danh sach binh luan
    public function ListComment()
    {
        $comment = DB::table('binhluan')->get();
        return view('admin.binhluan.comment_list',['comment'=>$comment]);
    }

    // Xoa 1 binh luan
    public function DeleteComment($id)
    {
        DB::table('binhluan')->where('mabinhluan','=',$id)->delete();

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
        DB::table('binhluan')->insert([
            'noidung' => $request['noidung'],
            'ngaygio' => date('Y-m-d H:i:s'),
            'mathanhvien' => $request['mathanhvien'],
            'mastatus' => $request['mastatus'],
        ]);

        return redirect()->route('listcomment');
    }

    // Trang sua 1 binh luan
    public function EditCommentView($id)
    {
        $comment = DB::table('binhluan')->where('mathanhvien','=',$id)->first();

        return view('admin.binhluan.comment_edit',['comment' => $comment]);
    }
}
