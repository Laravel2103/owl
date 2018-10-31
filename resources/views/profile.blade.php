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
<body>
	<!-- Phan thanh menu -->
	<div class="navbar">
		<div class="navbar-left">
			<a href="index.html"><img src="images/logo2.png" width="90px" height="49px"></a>
		</div>
		<div class="search">
			<input type="text" name="search" placeholder="Tìm bạn bè...">
			<a href=""><i class="fa fa-search fa-lg"></i></a>
		</div>
		<div class="navbar-mid"><a href="">
			<a href=""><i class="fa fa-university"> Học viện</i></a>
			<a href=""><i class="fa fa-book"> Tự học</i></a>
		</div>
		<div class="navbar-right">
			<a href=""><i class="fa fa-user-plus fa-2x" style="position: absolute;top: 25px;left: 10px;"></i></a>
			<a href=""><i class="fa fa-comments fa-2x" style="position: absolute;top: 25px;left: 80px;"></i></a>
			<a href=""><i class="fa fa-bell fa-2x" style="position: absolute;top: 25px;left: 150px;"></i></a>
			<!-- Phan so xuong trang ca nhan -->
			<div class="dropdown">
				<a class="dropbtn"><img src="images/avatar.jpg" style="position: absolute;top: 5px;left: 220px;"></a>
				<div class="dropdown-content">
    				<a href="#"><i class="fa fa-address-book"></i> Trang cá nhân</a>
    				<a href="#"><i class="fa fa-cog"></i> Cài đặt</a>
    				<a href="#"><i class="fa fa-comment"></i> Trợ giúp</a>
    				<a href="#" style="border: none;"><i class="fa fa-mail-reply"></i> Đăng xuất</a>
  				</div>
  			</div>
		</div>
	</div>
	<div class="nav-profile">
		<img src="images/avatar.jpg">
		<div class="clearfix"></div>
		<h2 style="text-align: center;margin-bottom: 5px;">Đoàn Xuân Trường</h2>
		<a href="" class="nav-active"><i class="fa fa-clock-o"></i> Dòng thời gian</a>
		<a href=""><i class="fa fa-drivers-license-o"></i> Thông tin</a>
		<a href=""><i class="fa fa-image"></i> Ảnh</a>
		<a href=""><i class="fa fa-film"></i> Video</a>
		<a href=""><i class="fa fa-cog"></i> Cài đặt</a>
		<ol>
	</div>

	<div class="new-feed" style="margin: 70px 0px 10px 27%;">
		<div class="up-stt">
			<i class="fa fa-edit fa-lg" style="color: rgb(206,224,241);float: left;"></i>
			<textarea placeholder="Chia sẻ với bạn bè: Tâm trạng bạn thế nào?"></textarea>
			<i class="fa fa-frown-o fa-lg" style="float: right;"></i>
		</div>
		<div class="tool-stt">
			<input type="file" name="file" id="file" class="inputfile" style="display: none;">
			<label class="fa fa-image" style="float: left;" for="file" title="Đăng ảnh"> Đăng ảnh</label>
			<label class="fa fa-link" style="float: left;" for="file" title="Liên kết"> Liên kết</label>
			<input type="submit" name="submit" style="float: right;" value="Đăng bài">
		</div>
		<!-- Phan 1 status -->
		<div class="status">
			<i class="fa fa-angle-down fa-lg" style="position: absolute;top: 10px;right: 20px;color: gray;"></i>
			<!-- phan thong tin nguoi dang -->
			<div class="meminfo">
				<img src="images/avatar.jpg">
				<ol>
					<li><a href="" style="font-size: 21px;">Đoàn Xuân Trường</a></li>
					<li><p>Thành viên - 11:30 21/03/1997</p></li>
				</ol>
			</div>
			<div class="clearfix"></div>
			<!-- Phan noi dung status -->
			<div class="content">
				<p>Đây là phần nội dung nè</p>
				<img src="images/xinchaotinhyeu.jpg">
			</div>
			<div class="clearfix"></div>
			<!-- binh luan, like, share -->
			<div class="like">
				<i class="fa fa-heart" style="color: red;margin-top: 10px;"> 1,6k yêu thích</i>
				<hr style="background-color: rgb(229,229,229);margin: 10px 0px 5px;">
				<ol>
					<li><a href=""><i class="fa fa-heart-o"> Yêu thích</i></a></li>
					<li><a id="comment"><i class="fa fa-comment-o"> Bình luận</i></a></li>
					<li><a href=""><i class="fa fa-link"> Chia sẻ</i></a></li>
				</ol>
			</div>
			<div class="comment">
				<img src="images/avatar.jpg">
				<input type="text" name="" placeholder="Viết bình luận...">
			</div>
		</div>

		<!-- Phan 1 status -->
		<div class="status">
			<i class="fa fa-angle-down fa-lg" style="position: absolute;top: 10px;right: 20px;color: gray;"></i>
			<!-- phan thong tin nguoi dang -->
			<div class="meminfo">
				<img src="images/avatar.jpg">
				<ol>
					<li><a href="" style="font-size: 21px;">Đoàn Xuân Trường</a></li>
					<li><p>Thành viên - 11:30 21/03/1997</p></li>
				</ol>
			</div>
			<div class="clearfix"></div>
			<!-- Phan noi dung status -->
			<div class="content">
				<p>Đây là phần nội dung nè</p>
				<img src="images/xinchaotinhyeu.jpg">
			</div>
			<div class="clearfix"></div>
			<!-- binh luan, like, share -->
			<div class="like">
				<i class="fa fa-heart" style="color: red;margin-top: 10px;"> 1,6k yêu thích</i>
				<hr style="color: rgb(229,229,229);margin: 10px 0px 5px;">
				<ol>
					<li><a href=""><i class="fa fa-heart-o"> Yêu thích</i></a></li>
					<li><a href=""><i class="fa fa-comment-o"> Bình luận</i></a></li>
					<li><a href=""><i class="fa fa-link"> Chia sẻ</i></a></li>
				</ol>
			</div>
			<div class="comment">
				<img src="images/avatar.jpg">
				<input type="text" name="" placeholder="Viết bình luận...">
			</div>
		</div>
	</div>
</body>
</html>