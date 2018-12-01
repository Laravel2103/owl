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

//facebook,google
use Socialite;

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

    //Xử lý đăng nhập bằng facebook 
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::with('facebook')->user();
        
        
        // $social = Social::where('provider_user_id',$user->id)->where
        //     ('pravider','facebook')->first();
        // if($social){
        //     $u = User::where('email',$user->email)->first();
        //     Auth::lo
        // }
        
        //Kiem tra co tai khoan trong csdl chua
        $login = Users::where([
            ['email','=',$user->email],
            ['password','=',$user->id],
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

        else
        {
            //Them vao co so du lieu
            $db = new Users;
            $db->username = $user->name;
            $db->email = $user->email;
            $db->avatar = 'avatar.png';
            $db->password = $user->id;
            $db->save();

            $login = Users::where([
            ['email','=',$user->email],
            ['password','=',$user->id],
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
        }
        // $user->token;
    
    }

    //Xử lý đăng nhập bằng google

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();
              
        //Kiem tra co tai khoan trong csdl chua
        $login = Users::where([
            ['email','=',$user->email],
            ['password','=',$user->id],
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

        else
        {
            //Them vao co so du lieu
            $db = new Users;
            $db->username = $user->name;
            $db->email = $user->email;
            $db->avatar = 'avatar.png';
            $db->password = $user->id;
            $db->save();

            $login = Users::where([
            ['email','=',$user->email],
            ['password','=',$user->id],
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
        }
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
    
}
