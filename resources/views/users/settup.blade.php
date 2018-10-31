@extends('users.layout.layoutindex')
@section('content')
<!-- Phan thanh menu ben trai -->
	<div class="menu-left">
		<h2>Menu</h2>
		<div class="menu-left-content">
			<center><img src="images/{{$member->anhdaidien}}"></center>
			<div class="clearfix"></div>
			<span>{{ $member->tenthanhvien}}</span>
		</div>
		<div class="menu-left-list">
				<a href="{{route('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
				<a href="profile={{session('mathanhvien')}}"><i class="fa fa-address-book"></i> Trang cá nhân</a>
				<a href="{{route('settup')}}"  class="menu-active"><i class="fa fa-cog"></i> Cài đặt</a>
				<a href=""><i class="fa fa-comment"></i> Trợ giúp</a>
				<a href=""><i class="fa fa-mail-reply"></i> Đăng xuất</a>
		</div>
	</div>
	<div class="new-feed">
		<div class="settup">
			<h3> Cài đặt thông tin</h3>
			<hr>
			<form action="{{route('postsettup')}}" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td><i class="fa fa-address-book-o"></i> Tên thành viên: </td>
						<td><input type="text" name="tenthanhvien" placeholder="Tên thành viên" value="{{$member->tenthanhvien}}">
					</tr>
					<tr>
						<td><i class="fa fa-key"></i> Mật khẩu: </td>
						<td><input type="password" name="matkhau" value="{{$member->matkhau}}" style="padding: 10px;font-size: 18px;width: 100%;"></td>
					</tr>
					<tr>
						<td><i class="fa fa-envelope-o"></i> Email: </td>
						<td><input type="email" name="email" placeholder="email" value="{{$member->email}}">
					</tr>
				</table>
				<hr>
				<table>
					<tr>
						<td width="185px;"><i class="fa fa-camera-retro"></i> Ảnh đại diện:</td>
						<td><input type="file" name="anhdaidien">
							<img src="images/{{$member->anhdaidien}}" width="100px" height="100px">
						</td>
					</tr>
					<tr>
						<td><i class="fa fa-calendar"></i> Ngày sinh:</td>
						<td><input type="date" name="ngaysinh" value="<?php
                                    $date = date_create($member->ngaysinh);
                                    $date2 = date_format($date,"Y-m-d");
                                    echo $date2;
                                ?>"></td>
					</tr>
					<tr>
						<td><i class="fa fa-street-view"></i> Địa chỉ:</td>
						<td><textarea name="diachi" value="{{$member->diachi}}"></textarea></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Chấp nhận">
			</form>
		</div>
	</div>
@endsection