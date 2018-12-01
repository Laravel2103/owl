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

class UserController extends Controller
{
    //
    // public function index()
    // {
    // 	return view("users.index");
    // }
    public function ViewHome()
    {
        $db = Status::orderBy('time','desc')->get();
        $comment = Comments::all();
        $author = Users::all();
        $reviews = Reviews::all();

        return view('users.index',['status'=>$db,'author'=>$author,'comment'=>$comment,'reviews'=>$reviews]);

    }
     //Xu ly thong tin dang nhap cua nguoi dung
    public function Login(Request $request)
    {
        //Gan du lieu dang nhap cho bien
        $email = $request->email;
        $password = $request->password;
        
        //Kiem tra co tai khoan trong csdl chua
        $login = Users::where([
            ['email','=',$email],
            ['password','=',$password],
            ])->first();
        
        //Neu co roi thi tao session va den trang index
        if(!empty($login))
        {
            session()->put('iduser',$login->id);
            session()->put('username',$login->username);
            session()->put('email',$login->email);
            session()->put('password',$login->password);
            return redirect()->route('owl-index');
        }
        // Neu chua co thi tro lai thong bao cho view login
        else
            return redirect()->route('owl-index',['error'=>'Tài khoản hoặc mật khẩu không đúng!']);
        
    }
    //Xu ly thong tin dang ky cua nguoi dung
    public function Register(Request $request)
    {
        //Truyen tham so vao cac bien
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;

        //Them vao co so du lieu
        $db = new Users;
        $db->username = $username;
        $db->email = $email;
        $db->avatar = 'avatar.png';
        $db->password = $password;
        $db->save();

        return redirect()->route('owl-index');
    }
    //Dang xuat tai khoan
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('owl-index');
    }
    //Dang tai mot bai viet len newfeed
    public function upstt(Request $request)
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

        $content = $request->contentstt;

        $db = new Status;
        $db->content = $content;
        $db->rate = 100;
        $db->images = $imagestatus;
        $db->author = session('iduser');
        $db->time = date('d-m-Y H:i:s');

        $db->save();
        return redirect()->route('owl-index');
    }
    // Danh gia mot bai viet
    public function Confirm($idstt, $conf)
    {
        // $status = Status::where('id','=',$idstt)->first();
        // if($conf == 'good')
        // {
        //     $status->rate = ($status->rate + 100)/2;
        // }
        // else
        // {
        //     if($conf == 'normal')
        //         $status->rate = ($status->rate + 50)/2;
        //     else
        //         $status->rate = ($status->rate + 0)/2;
        // }
            

        $check = Reviews::where([
            ['iduser','=',session('iduser')],
         ['idstt','=',$idstt],
        ])->get();
        // if($conf == 'good')
        // {
        //     $check->rate = ($check->rate + 100)/2;
        // }
        // else
        // {
        //     if($conf== 'normal')
        //         $check->rate = ($check->rate + 50)/2;
        //     else
        //         $check->rate = ($check->rate + 0)/2;
        // }

        if(!empty($check))
        {
            Reviews::where([
                ['iduser','=',session('iduser')],
                ['idstt','=',$idstt],
            ])->delete();
        }

        $db = new Reviews;
        $db->rev = $conf;
        $db->idstt = $idstt;
        $db->iduser = session('iduser');
        $db->save();

        return 0;
    }

    //Dang tai mot comment vao bai viet
    public function PostComment($idstt, $content)
    {
        $db = new Comments;
        $db->author = session('iduser');
        $db->content = $content;
        $db->idstt = $idstt;
        $db->time = date('d-m-Y H:i:s');
        $db->save();

        $authorname = session('username');

        
        //return view('users.index.comment');
        $comment = "
        <div class='row mt-2 pr-3'>
        <div class='col-2 pr-1'>
            <img src='img/avatar.png' class='img-thumbnail w-90 rounded'>
        </div>
        <div class='col-10 pr-4 w-100 pb-1 bg-light border rounded  comment-content'>
            <div class='row justify-content-between'>
                <div class='col-10 col-sm-10 col-lg-11'>
                    <a href='' class='name-in-comment'>".$authorname."</a>:
                    <span class='text-secondary time-of-comment'> Vừa xong. <i class='fa fa-clock-o'></i></span>
                </div>
                <div class='col-1 col-sm-1 col-lg-1 align-self-end'>
                    <i class='fa fa-ellipsis-h align-middle'></i>
                </div>
            </div>

            <div class='row'>
                <div class='col-12 text-justify pr-2'>
                    <span>".$db->content."</span>
                </div>
            </div>

        </div>
    </div>
        ";
        return $comment;
    }
    
}
