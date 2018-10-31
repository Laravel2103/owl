<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>OWL | Học viện cú đêm</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
    	$(".dropbtn").click(function(){
        	$(".dropdown-content").slideToggle("slow");
        	$(".allchatbox-content").slideUp();
        	$(".addfriend-content").slideUp();
    	});
    	$(".addfriendbtn").click(function(){
        	$(".addfriend-content").slideToggle("slow");
        	$(".allchatbox-content").slideUp();
        	$(".dropdown-content").slideUp();
        	$(".addfriendbtn").toggleClass("activebtn");
    	});
    	$("#allchatboxbtn").click(function(){
        	$(".allchatbox-content").slideToggle("slow");
        	$(".dropdown-content").slideUp();
        	$(".addfriend-content").slideUp();
    	});
    	$("#comment").click(function(){
        	$(".comment").slideToggle("slow");
    	});
    	$("#xchatbox").click(function(){
    		$(".chatbox").hide();
    	});
    	$("#search").keypress(function(){
    		$(".search-content").show();
    	});
    	$("#search").blur(function(){
    		$(".search-content").hide();
    	});
    	$("#hocvien").click(function(){
        	alert('Chức năng chưa ra mắt!');
    	});
	});
	function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
	}
	</script>
</head>
<body>
	<img src="images/twoowl.jpg" id="twoowl">
	<!-- Phan thanh menu -->
	<div class="navbar">
		<div class="navbar-left">
			<a href="{{route('index')}}"><img src="images/logo2.png" width="90px" height="49px"></a>
		</div>
		<div class="search">
			<input type="text" name="search" placeholder="Tìm bạn bè..." id="search" onkeyup="myFunction()">
			<a href=""><i class="fa fa-search fa-lg"></i></a>
		</div>
		<div class="search-content">
				<ul id="myUL">
					<?php
						$memberinfo = DB::table('thanhvien')->get();
					?>
					@foreach($memberinfo as $row)
						<li><a href="profile/{{$row->mathanhvien}}"><img src="images/{{$row->anhdaidien}}">{{$row->tenthanhvien}}</a></li>
					@endforeach
					<!-- <li><a href=""><img src="images/avatar.jpg">Hữu Việt</a></li>
					<li><a href=""><img src="images/avatar.jpg">Văn Bình</a></li> -->
				</ul>
		</div>
		<div class="navbar-mid">
			<a id="hocvien"><i class="fa fa-university"></i> Học viện</a>
			<a href=""><i class="fa fa-book"></i> Thư viện</a>
		</div>
		<div class="navbar-right">
			<a class="addfriendbtn"><i class="fa fa-user-plus fa-2x" style="position: absolute;top: 25px;left: 10px;"></i></a>
			<?php
				$soketban = DB::table('banbe')->where([
						['mathanhvien2','=',session('mathanhvien')],
						['ketnoi','=',false]
					])->count();
				if($soketban>0)
					echo "<span class='soketban'>".$soketban."</span>"
			?>
			<div class="addfriend-content">
				<h3>Kết bạn</h3>
				<ol>
				<?php
					$ketban = DB::table('banbe')->where([
						['mathanhvien2','=',session('mathanhvien')],
						['ketnoi','=',false]
					])->get();
					if($soketban==0)
					{
						echo "<li style='text-align: center;'>Không có lời mời kết bạn nào!</li>";
					}
				?>
					@foreach($ketban as $row)
					<?php
						$member = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien1)->first();
					?>
					<li><img src="images/{{$member->anhdaidien}}"> <a href="profile={{$member->mathanhvien}}">{{$member->tenthanhvien}}</a> muốn kết bạn với bạn <br><a href="acceptfriend{{$member->mathanhvien}}" class="accept" title="Chấp nhận kết bạn" style="margin: 0px 0px 5px 70px;"> Chấp nhận</a> <a href="refusefriend={{$member->mathanhvien}}" class="refuse" title="Từ chối kết bạn"> Từ chối</a> </li>
					@endforeach
				</ol>
			</div>
			<a id="allchatboxbtn"><i class="fa fa-comments fa-2x" style="position: absolute;top: 25px;left: 80px;"></i></a>
			<div class="allchatbox-content">
				<h3>Tin nhắn</h3>
				<ol>
					<?php
						$mabanbe = DB::table('banbe')->where([
							['mathanhvien1','=',session('mathanhvien')],
							['ketnoi','=',true]
						])->orwhere([
							['mathanhvien2','=',session('mathanhvien')],
							['ketnoi','=',true]
						])->get();
					?>
					@foreach($mabanbe as $row)
						<?php
							$message = DB::table('tinnhan')->where('mabanbe','=',$row->mabanbe)->orderBy('ngaygio','desc')->first();
							$mem1 = DB::table('banbe')->where([
								['mathanhvien1','=',session('mathanhvien')],
								['mabanbe','=',$row->mabanbe]
							])->first();
							if(empty($mem1))
							{
								$member = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien1)->first();
							}
							else
							{
								$member = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien2)->first();
							}
						?>
						<script type="text/javascript">
							$(document).ready(function(){
			    					$("#messenger{{$row->mabanbe}}").click(function(){
			    				$.get('addchatbox{{$row->mabanbe}}',function(data){
    								//alert(data);
    							$("#chatbox").html(data);
    								});
			    				});
							});
						</script>
						@if(isset($message))
						<a id="messenger{{$row->mabanbe}}"><li><img src="images/{{$member->anhdaidien}}">
							<?php
								if($message->mathanhvien == session('mathanhvien'))
									echo "Bạn";
								else
									echo  $member->tenthanhvien;
							?>
							: 
							<?php
								if(strlen($message->noidung) > 27)
								{
								    $output = mb_substr($message->noidung, 0, 27, "UTF-8");
								    while(substr($output, -1) != " ")
								    {
								        $output = substr($output, 0, strlen($output)-1);
								    }
								    $output = $output." ...";
								    echo $output;
								}
								else
									echo $message->noidung;
							?></li></a>
							<?php
								unset($mem1);
							?>
						@else
							<a id="messenger{{$row->mabanbe}}"><li><img src="images/{{$member->anhdaidien}}"> Bạn và {{$member->tenthanhvien}} đã kết nối!
						@endif
					@endforeach
				</ol>
			</div>
			<a href=""><i class="fa fa-bell fa-2x" style="position: absolute;top: 25px;left: 150px;"></i></a>
			<!-- Phan so xuong trang ca nhan -->
			<div class="dropdown">
				<a class="dropbtn"><img src="images/{{session('anhdaidien')}}" style="position: absolute;top: 5px;left: 220px;"></a>
				<div class="dropdown-content">
    				<a href="profile={{session('mathanhvien')}}"><i class="fa fa-address-book"></i> Trang cá nhân</a>
    				<a href="{{route('settup')}}"><i class="fa fa-cog"></i> Cài đặt</a>
    				<a href="#"><i class="fa fa-comment"></i> Trợ giúp</a>
    				<a href="{{route('logout')}}" style="border: none;"><i class="fa fa-mail-reply"></i> Đăng xuất</a>
  				</div>
  			</div>
		</div>
	</div>
	
	@yield('content')
	@include('users.menu_right')
	@include('users.friend_online')
</body>
</html>