@extends('users.layout.layoutindex')
@section('content')
<!-- Phan noi dung - new-feed -->
<!-- Phan thanh menu ben trai -->
	<div class="menu-left">
		<h2>Menu</h2>
		<div class="menu-left-content">
			<center><img src="images/{{session('anhdaidien')}}"></center>
			<div class="clearfix"></div>
			<span>{{ session('tenthanhvien')}}</span>
		</div>
		<div class="menu-left-list">
				<a href="" class="menu-active"><i class="fa fa-home"></i> Trang chủ</a>
				<a href="profile={{session('mathanhvien')}}"><i class="fa fa-address-book"></i> Trang cá nhân</a>
				<a href=""><i class="fa fa-institution"></i> Học viện</a>
				<a href=""><i class="fa fa-book"></i> Thư viện</a>
				<a href=""><i class="fa fa-coffee"></i> Thảo luận</a>
		</div>
	</div>
	@include('users.new_feed')
	<!-- ket thuc phan noi dung -->
@endsection
