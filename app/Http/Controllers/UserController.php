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
use App\Events\RedisEvent;
use LRedis;
//facebook,google
use Socialite;

class UserController extends Controller
{
    
    public function index()
    {
    	return view("users.index");
    }
    public function ViewHome()
     {
        $db = Status::orderBy('created_at','desc')->get();
        $comment = Comments::all();
        $author = Users::all();
        $reviews = Reviews::all();
        $friends = Friends::where([
			['user1','=',session('iduser')],
			['agree','=',true]
		])->orwhere([
			['user2','=',session('iduser')],
			['agree','=',true]
        ])->get();
        
        $lmkb = Friends::where('user1','=',session('iduser'))->orwhere('user2','=',session('iduser'))->get();

        $member = Users::where('_id','!=',session('iduser'))->get();
       
        $addfriends = Friends::where([
            ['user2','=',session('iduser')],
            ['agree','=',false],
        ])->get();

        $sl = 0;
        $gykb;
        foreach($member as $mb)
        {
            if($sl <= 5)
            {
                $flat = 0;
                foreach($friends as $fr)
                {
                    if($mb->id == $fr->user1 || $mb->id == $fr->user2)
                    {
                        $flat = 1;
                    }
                }
                if($flat != 1)
                {
                    if($sl == 0 )
                        {
                            $gykb[$sl] = $mb;
                            $sl++;
                        }
                        elseif($mb->id != $gykb[$sl-1]->id)
                        {
                            $gykb[$sl] = $mb;
                            $sl++;
                        }
                }
            }
            else
            {
                break;
            }
        }

        $avataruser = Users::where('_id','=',session('iduser'))->first();
               
        return view('users.index',['status'=>$db,'author'=>$author,'comment'=>$comment,'reviews'=>$reviews,'GoiYKetBan'=>$member,'addfriends'=>$addfriends,'friends'=>$friends,'gykb'=>$gykb,'avataruser'=>$avataruser]);
        //return var_dump($gykb);
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
            session()->put('avatar',$login->avatar);
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
        $repassword = $request->repassword;
        if($password == $repassword && $password != "" && $repassword != "")
        {
            //Them vao co so du lieu
            $db = new Users;
            $db->username = $username;
            $db->email = $email;
            $db->avatar = 'avatar.png';
            $db->password = $password;
            $db->save();
        }
        else
        {
             $request->session()->flash('status', 'Đăng ký không hợp lệ!');
             return redirect()->route('owl-index');
        }
        return redirect()->route('owl-index');
    }
    //Dang xuat tai khoan
    public function Logout(Request $request)
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
        return redirect()->route('owl-index');
    }
    // Danh gia mot bai viet
    public function Confirm($idstt, $conf)
    {

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

        //$status = Status::where('id','=',$idstt)->first();
        if($conf == 'good')
        {
            Status::where('_id',$idstt)->update(['rate'=>90]);
        }
        if($conf == 'normal')
        {
            Status::where('_id',$idstt)->update(['rate'=>50]);
        }
        if($conf == 'bad')
        {
            Status::where('_id',$idstt)->update(['rate'=>10]);
        }

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
    //tao ban ban be
    public function taobanbe()
    {
        $db = new Friends;
        $db->user1 = "123";
        $db->user2 = "123";
        $db->save();
        return "ThanhCong";
    }
    //liet ke nguoi chua ket ban
    //
    //
    // Gui mot loi moi ket ban
    public function addfriend($id_user)
    {
        //$ss = session('iduser');
        $db = new Friends;
        $db->user1 = session('iduser');
        $db->user2 = $id_user;
        $db->agree = false;
        $db->save();

        $friends = Friends::where('user1','!=',session('iduser'))->orwhere('user1','!=',session('iduser'))->get();
        
        // $member = Users::where([
        //     ['_id','!=',session('iduser')],
        //     ['_id','!=',$id_user]
        // ])->take(5)->get();


        return '123';
    }

    public function Profile($id_user)
    {
        //$user = Users::where('id',$id_user)->first;
        $db = Status::where('author',$id_user)->orderBy('created_at','desc')->get();
        $comment = Comments::all();
        $author = Users::all();
        $reviews = Reviews::all();
        $member = Users::where([
            ['_id','!=',$id_user],
        ])->take(5)->get();
        $addfriends = Friends::where([
            ['user2','=',$id_user],
            ['agree','=',false],
        ])->get();
        $User_profile = Users::where('_id','=',$id_user)->first();
        
        $friends = Friends::where([
            ['user1','=',session('iduser')],
            ['agree','=',true]
        ])->orwhere([
            ['user2','=',session('iduser')],
            ['agree','=',true]
        ])->get();

        $sl = 0;
        $gykb;
        foreach($member as $mb)
        {
            if($sl <= 5)
            {
                $flat = 0;
                foreach($friends as $fr)
                {
                    if($mb->id == $fr->user1 || $mb->id == $fr->user2)
                    {
                        $flat = 1;
                    }
                }
                if($flat != 1)
                {
                    if($sl == 0 )
                        {
                            $gykb[$sl] = $mb;
                            $sl++;
                        }
                        elseif($mb->id != $gykb[$sl-1]->id)
                        {
                            $gykb[$sl] = $mb;
                            $sl++;
                        }
                }
            }
            else
            {
                break;
            }
        }

        return view('users.profile',['status'=>$db,'author'=>$author,'addfriends'=>$addfriends,'comment'=>$comment,'reviews'=>$reviews,'GoiYKetBan'=>$member,'User_profile'=>$User_profile,'friends'=>$friends,'gykb'=>$gykb]);
    }

    // Chap nhan mot loi moi ket ban
    public function AgreeFriend($id_friend)
    {
        Friends::where('_id',$id_friend)->update(['agree'=>true]);

        return redirect()->route('owl-index');
    }

    // Add Messages
    public function AddMessage()
    {
        $message = new Messages;
        $message->id_friend = '5c07e333fb3f8b1234007637';
        $message->id_user = '5bfbbdbafb3f8b118c004202';
        $message->content = 'Xin chào';
        $message->save();

        return ' Thêm tin nhắn thành công!';
    }

    public function AddMessages($id_friend, $content)
    {
        $message = new Messages;
        $message->id_friend = $id_friend;
        $message->id_user = session('iduser');
        $message->content = $content;
        $message->save();

        $upcontent = "<div class='row m-0 justify-content-end mt-2'>
                        <div class='col-9'>
                            <div class='row'>
                                <div class='col-12 bg-primary p-1 text-white rounded'>
                                    ".$content."
                                </div>
                            </div>
                        </div>
                    </div>";
        // event(
        //     $e = new RedisEvent($content)
        // );
        return $upcontent;
        //return '123';
    }
    // Khung chatbox
    public function Chatbox($id_friend,$countbox)
    {
        $messages = Messages::where('id_friend',$id_friend)->get();
        $friend = Friends::where('_id',$id_friend)->first();
        if($friend->user1 == session('iduser'))
        {
            $idf = $friend->user2;
        }
        else
        {
            $idf = $friend->user1;
        }
        $fr = Users::where('_id',$idf)->first();
        if($countbox == 0)
        {
            return view('users.chatbox',['messages'=>$messages,'id_friend'=>$id_friend,'fr'=>$fr]);
        }
        else
        {
            return view('users.chatbox2',['messages'=>$messages,'id_friend'=>$id_friend,'fr'=>$fr]);
        }
        
    }

    // Them khung chatbox
    public function AddChatbox($id_friend,$countbox)
    {
        //$id = $id_friend;
        return redirect()->route('Chatbox', ['id_friend' => $id_friend,'countbox'=>$countbox]);
    }
    
}
