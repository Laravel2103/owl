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
	<div style="height: 100px;width: 20px;background: linear-gradient(to right,gray, white, gray);position: absolute;top: -70px;left: 150px;z-index:-1"></div>
	<div style="height: 100px;width: 20px;background: linear-gradient(to right,gray, white, gray);position: absolute;top: -70px;right: 150px;z-index:-1"></div>
	<img src="images/tourbg.jpg" style="position: absolute;bottom: -150px;z-index: -1;width: 100%;opacity: 0.5;">
	<div class="loginbox">
		<div class="trailer">
			<img src="images/banner3.jpg">
			<i class="fa fa-chevron-left" id="prev"></i>
			<i class="fa fa-chevron-right" id="next"></i>
		</div>
		<div class="login">
			<form action="{{route('getlogin')}}" method="post">
				<ol>
				<li><img src="images/logo2.png"></li>

				<li><i class="fa fa-address-book" style="padding-right:13px; "></i><input type="text" name="email" placeholder="Email"><li>
					
				<li><i class="fa fa-key"></i><input type="password" name="password" placeholder="Mật khẩu"><li>

				<li><input type="checkbox" name=""> Duy trì đăng nhập
				<input type="submit" name="" value="Đăng nhập"></li>

				<li>
					<i class="fa fa-facebook" style="padding: 13px 39px;margin: 10px 3px 10px 0px;background-color: rgb(31,118,197);border: none;"></i>
					<i class="fa fa-google" style="padding: 13px 38px;margin: 10px 3px 10px 0px;background-color: rgb(221,7,7);border: none;"></i>
					<i class="fa fa-yahoo" style="padding: 13px 38px;margin: 0px 0px;background-color: rgb(146,39,143);border: none;"></i>
				</li>
				<li><a href="">Quên mật khẩu?</a>
				<a href="{{route('register')}}">Đăng ký</a></li>
			</ol>
			{{ csrf_field() }}
			</form>
		</div>
	</div>
	<div class="info">
		<p align="center"> Copyright © 2018 <a href="">OWL - Học viện cú đêm</a>. All Rights Reserved.</p>
		<p align="center"> Phát triển bởi <a href="https://www.facebook.com/xuantruong97er">Xuân Trường</a> </p>
		<br>
		
		<hr style="border: 2px dashed white;">
		<div class="owlimg">
		<img src="images/owl.png" style="position: absolute;top: -111px; left: 350px;" id="owlimg">
		<p class="notice">{{ $error or 'Bạn phải đăng nhập'}}</p>
		<div>
		<img src="images/bus.png" style="position: absolute;bottom: 20px;right: 50px;" width="200px" id="bus">
	</div>
</body>
</html>