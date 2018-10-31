<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    //Kiem tra tai khoan dang nhap
    public function login(Request $request)
    {
    	$email = $request['email'];
    	$password = $request['password'];

    	$member = DB::table('thanhvien')->where([
    		['email','=',$email],
    		['matkhau','=',$password],
    		])->first();
    	if(!empty($member))
        {
            session()->put('mathanhvien',$member->mathanhvien);
            session()->put('anhdaidien',$member->anhdaidien);
    		session()->put('tenthanhvien',$member->tenthanhvien);
    		return redirect()->route('index');
    		//var_dump($member);
        }
    	else
    		return redirect()->route('login',['error'=>'Tài khoản hoặc mật khẩu không đúng!']);
    		/*return view('users.login',['error'=>'Sai ten dang nhap hoac mat khau!']);*/
    	/*if(Auth::attempt(['tenthanhvien'=>$username,'matkhau'=>$password]))
    	{
    		return view('users.index');
    	}
    	else
    	{
    		return view('users.login');
    	}*/
    }

    // Dang ky tai khoan
    public function register(Request $request)
    {
        $hoten = $request['firstname']." ".$request['lastname'];
        $email = $request['email'];
        $matkhau = $request['password'];

        DB::table('thanhvien')->insert([
                'tenthanhvien' => $hoten,
                'email' => $email,
                'matkhau' => $matkhau,
                'anhdaidien' => 'avatar.jpg'
        ]);
        return redirect()->route('login');
    }

    // Dang xuat tai khoan
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    // Dong thoi gian trang chu
    public function Index()
    {
        $status = DB::table('status')->orderBy('ngaygio','desc')->get();
        return view('users.index',['status'=>$status]);
    }

    // Bay to yeu thich mot bai viet
    public function Like($stt)
    {
        // Kiem tra nguoi dung da like bai viet chua
        $like = DB::table('yeuthich')->where([
            ['mathanhvien','=',session('mathanhvien')],
            ['mastatus','=',$stt],
            ])->first();
        // Neu chua like thi them like
        if(empty($like))
        {
            DB::table('yeuthich')->insert([
                'mathanhvien' => session('mathanhvien'),
                'mastatus' => $stt
            ]);
            DB::table('status')->where('mastatus','=',$stt)->increment('soyeuthich',1);
        }
        // Neu da like thi xoa like di
        else
        {
            DB::table('yeuthich')->where([
                ['mathanhvien','=',session('mathanhvien')],
                ['mastatus','=',$stt],
            ])->delete();
            DB::table('status')->where('mastatus','=',$stt)->decrement('soyeuthich',1);
        }
        return redirect()->route('index');
    }

    // Binh luan 1 bai viet
    public function Comment(Request $request,$mastt)
    {
        DB::table('binhluan')->insert([
            'mathanhvien' => session('mathanhvien'),
            'noidung' => $request['comment'],
            'ngaygio' => date('Y-m-d H:i:s'),
            'mastatus' => $mastt
        ]);

        return redirect()->route('index');
    }
    // Dang tai 1 status
    public function UpStatus(Request $request)
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
            'mathanhvien' => session('mathanhvien'),
            'ngaygio' => date('Y-m-d H:i:s'),
            'noidung' => $request['status'],
            'hinhanh' => $anhstatus
        ]);

        return redirect()->route('index');
        /*$status = new Status;
        $status->mathanhvien = session('mathanhvien');
        $status->ngaygio = new datetime();
        $status->noidung = $request['status'];
        $status->save();*/
    }

    // Trang ca nhan cua 1 thanh vien
    public function Profile($id)
    {
        // echo $id;
        $member = DB::table('thanhvien')->where('mathanhvien','=',$id)->first();
        $status = DB::table('status')->where('mathanhvien','=',$id)->orderBy('ngaygio','desc')->get();
        return view('users.profile',['member'=>$member,'status'=>$status]);
        /*foreach ($status as $row) {
            echo $row->noidung."<br>";
        }*/
    }

    // Cai dat trang ca nhan cua thanh vien
    public function Settup()
    {
        $member = DB::table('thanhvien')->where('mathanhvien','=',session('mathanhvien'))->first();

        return view('users.settup',['member'=>$member]);
    }

    // Cai dat trang ca nhan cua thanh vien
    public function PostSettup(Request $request)
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
        DB::table('thanhvien')->where('mathanhvien','=',session('mathanhvien'))->update([
                'tenthanhvien' => $request['tenthanhvien'],
                'matkhau' => $request['matkhau'],
                'email' => $request['email'],
                'anhdaidien' => $name,
                'ngaysinh' => $request['ngaygio'],
                'diachi' => $request['diachi']
        ]);

        return redirect()->route('settup');
    }
    // Gui loi moi ket ban
    public function AddFriend($id)
    {
        DB::table('banbe')->insert([
            'mathanhvien1' => session('mathanhvien'),
            'mathanhvien2' => $id,
            'ketnoi' => false
        ]);

        return redirect()->route('index');
    }
    // Chap nhan loi moi ket ban
    public function AcceptFriend($id)
    {
        DB::table('banbe')->where([
            ['mathanhvien1','=',$id],
            ['mathanhvien2','=',session('mathanhvien')]
        ])->update(['ketnoi' => true]);

        return redirect()->route('index');
    }
    // Tu choi loi moi ket ban
    public function RefuseFriend($id)
    {
        DB::table('banbe')->where([
            ['mathanhvien1','=',$id],
            ['mathanhvien2','=',session('mathanhvien')]
        ])->delete();

        return redirect()->route('index');
    }
    // Huy ket ban voi 1 nguoi
    public function DisFriend($id)
    {
        $ketnoi = DB::table('banbe')->where([
            ['mathanhvien1','=',$id],
            ['mathanhvien2','=',session('mathanhvien')]
        ])->orwhere([
            ['mathanhvien2','=',$id],
            ['mathanhvien1','=',session('mathanhvien')]
        ])->first();

        DB::table('tinnhan')->where('mabanbe','=',$ketnoi->mabanbe)->delete();
        DB::table('banbe')->where('mabanbe','=',$ketnoi->mabanbe)->delete();

        return redirect()->route('index');
    }
    // Mo khung nhan tin
    public function AddChatbox($mabanbe)
    {
        echo "<script>
        $(document).ready(function(){
            $('#boxmess".$mabanbe."').animate({ scrollTop: $('#boxmess".$mabanbe."').get(0).scrollHeight}, 0);
            $('#message".$mabanbe."').keypress(function(event){
            if(event.keyCode == 13 || event.which == 13)
            {
                event.preventDefault();
                var message = $('#message".$mabanbe."').val();
                $.get('sendmessage'+message+'".$mabanbe."',function(data){
                    $('#messagebox".$mabanbe."').html(data);
                });
                $('#message".$mabanbe."').val('');
                $('#boxmess".$mabanbe."').animate({ scrollTop: $('#boxmess".$mabanbe."').get(0).scrollHeight}, 1500);
                setInterval(function(){
                ('#messagebox".$mabanbe."').load.fadeIn(data);},1000);
             }});
            $('#xchatbox".$mabanbe."').click(function(){
                $('#chatbox".$mabanbe."').hide();
            });
        });
        </script>";
        $chat = DB::table('banbe')->where('mabanbe','=',$mabanbe)->first();
        $mem1 = DB::table('banbe')->where([
            ['mathanhvien1','=',session('mathanhvien')],
            ['mabanbe','=',$mabanbe]
        ])->first();
        if(empty($mem1))
        {
            $member = DB::table('thanhvien')->where('mathanhvien','=',$chat->mathanhvien1)->first();
        }
        else
        {
            $member = DB::table('thanhvien')->where('mathanhvien','=',$chat->mathanhvien2)->first();
        }
        echo "<div id='chatbox".$mabanbe."'>";
        echo "<h4><a href='profile=".$member->mathanhvien."' style='color: white;'>".$member->tenthanhvien."</a><a><i class='fa fa-remove' style='float: right;color: white;' id='xchatbox".$mabanbe."'></i></a></h4>";

        echo "<div class='message' id='boxmess".$mabanbe."'>";
        echo "<ol>";
        echo "<div id='messagebox".$mabanbe."'>";
        $message = DB::table('tinnhan')->where('mabanbe','=',$chat->mabanbe)->get();

        foreach($message as $row)
        {
            $date = date_create($row->ngaygio);
            $date2 = date_format($date,"H:i - d/m/Y");
            if($row->mathanhvien == session('mathanhvien'))
            {
                echo "<li style='float: right;background-color: #4080ff;color: white;' title='".$date2."'>";
            }
            else
            {
                echo "<li style='float:left' title='".$date2."'>";
            }
            echo $row->noidung;
            echo "</li><div class='clearfix'></div>";
        }
        echo "</div></ol></div>";
        echo "<input type='text' name='message' id='message".$mabanbe."' placeholder='Nhập tin nhắn...' autofocus>";

        echo "</div>";
    }
    // Gui 1 tin nhan
    public function SendMessage($message,$mabanbe)
    {
        DB::table('tinnhan')->insert([
            'mabanbe' => $mabanbe,
            'mathanhvien' => session('mathanhvien'),
            'noidung' => $message,
            'ngaygio' => date('Y-m-d H:i:s')
        ]);
        $message = DB::table('tinnhan')->where('mabanbe','=',$mabanbe)->get();
        foreach($message as $row)
        {
            if($row->mathanhvien == session('mathanhvien'))
            {
                echo "<li style='float: right;background-color: #4080ff;color: white;' title='$row->ngaygio'>";
            }
            else
            {
                echo "<li style='float:left' title='$row->ngaygio'>";
            }
            echo $row->noidung;
            echo "</li><div class='clearfix'></div>";
        // echo "hello".$message;
        }
    }
}
