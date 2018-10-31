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
			<?php
			if($member->mathanhvien != session('mathanhvien'))
			{
				$ketnoi = DB::table('banbe')->where([
					['mathanhvien1','=',session('mathanhvien')],
					['mathanhvien2','=',$member->mathanhvien]
				])->orwhere([
					['mathanhvien2','=',session('mathanhvien')],
					['mathanhvien1','=',$member->mathanhvien]
				])->first();
				if(empty($ketnoi))
				{
					echo "<a href='addfriend=".$member->mathanhvien."'><i class='fa fa-user-plus'></i> Kết bạn</a>";
				}
				else
				{
					echo "<a href='disfriend=".$member->mathanhvien."'><i class='fa fa-user-times'></i> Hủy kết bạn</a>";
				}
			}
			?>
				<a href="{{route('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
				<a href="profile={{session('mathanhvien')}}"  class="menu-active"><i class="fa fa-address-book"></i> Trang cá nhân</a>
				<a href="{{route('settup')}}"><i class="fa fa-cog"></i> Cài đặt</a>
				<a href=""><i class="fa fa-comment"></i> Trợ giúp</a>
				<a href=""><i class="fa fa-mail-reply"></i> Đăng xuất</a>
		</div>
	</div>
	@include('users.new_feed')
@endsection