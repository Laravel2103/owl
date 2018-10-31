<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>OWL | Học viện cú đêm</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
    	$(".dropbtn").click(function(){
        	$(".dropdown-content").slideToggle("slow");
    	});
    	$("#comment").click(function(){
        	$(".comment").slideToggle("slow");
    	});
    	$("#avatar").hover(function(){
        	$("#upload-avatar").show();
    	});
	});
	</script>
</head>
<body style="position: relative;background-image: url(images/sky.png);background-size: 1450px;">
	<div style="height: 100px;width: 20px;background: linear-gradient(to right,gray, white, gray);position: absolute;top: -70px;left: 570px;z-index:-1"></div>
	<div style="height: 100px;width: 20px;background: linear-gradient(to right,gray, white, gray);position: absolute;top: -70px;right: 570px;z-index:-1"></div>
	<div class="registerbox">
		<!-- <div class="trailer">
			<img src="images/banner3.jpg">
		</div> -->
		<!-- <div class="login"> -->
			<form action="{{route('getregister')}}" method="post">
				<ol>
				<li>{{ $error or "" }}</li>
				<li><img src="images/logo2.png"></li>

				<li><input type="text" name="firstname" placeholder="Họ"> </li>
				<li><input type="text" name="lastname" placeholder="Tên"></li>
				<li><input type="text" name="email" placeholder="Email"></li>
				<li><input type="password" name="password" placeholder="Mật khẩu"><li>
				<li><input type="password" name="repassword" placeholder="Nhập lại mật khẩu"><li>
				<li><center><input type="submit" name="" value="Đăng ký"></center></li>

				<li>Đã có tài khoản - <a href="{{route('login')}}">Đăng nhập</a></li>
			</ol>
			{{ csrf_field() }}
			</form>
	</div>
	<div class="info">
		<p align="center"> Copyright © 2018 <a href="">OWL - Học viện cú đêm</a>. All Rights Reserved.</p>
		<p align="center"> Phát triển bởi <a href="https://www.facebook.com/xuantruong97er">Xuân Trường</a> </p>
		<br>
		<hr style="border: 2px dashed white;">
		<img src="images/owl.png" style="position: absolute;top: -111px; left: 350px;">
		<img src="images/bus.png" style="position: absolute;bottom: 20px;right: 50px;" width="200px" id="bus">
		<img src="images/tourbg.jpg" style="position: absolute;top: -264px;left:0px;width: 100%;opacity: 0.5;z-index: -5;">
	</div>
</body>
</html>