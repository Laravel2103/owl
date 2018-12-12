@extends("users.layout.navbar")

@section("content")
<!-- Body -->
<div class="row w-100">
	
	<!-- MenuBar -->
	<div class="col-lg-2 col-xl-2 d-none d-sm-none d-lg-block pr-0 ml-5 pl-5 mt-5 pt-4">
		<ul class="list-group shadow-sm">
			@if(empty(session('iduser')))
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center bg-light">
				<img src="img/owlup.png" class="img-thumbnail">
			</li>
			<h4>Khách xem</h4>
			@else
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center bg-light">
				<img src="img/{{$User_Settup->avatar}}" class="img-thumbnail">
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center test p-1">
				<a href="{{url('/')}}" class="p-2 w-100 text-dark"><i class="fa fa-home" style="color: #fd7e14"></i> Trang chủ 
				<span class="badge badge-primary badge-pill ml-1">50</span></a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center test p-1 bg-light font-weight-bold">
				<a href="profileid{{session('iduser')}}" class="p-2 w-100 text-dark"><i class="fa fa-address-book" style="color: #20c997"></i> Trang cá nhân</a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-1">
				<a href="" class="p-2 w-100 text-dark"><i class="fas fa-school" style="color: #dc3545"></i> Học viện
				<span class="badge badge-primary badge-pill">50</span></a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-1">
				<a href="#" class="p-2 w-100 text-dark"><i class="fas fa-book-reader" style="color: #007bff"></i> Thư viện
				<span class="badge badge-primary badge-pill">99</span></a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-1">
				<a href="{{url('settup')}}" class="p-2 w-100 text-dark"><i class="fa fa-cog" style="color: #6f42c1"></i> Cài đặt
				<span class="badge badge-primary badge-pill">50</span></a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-1">
				<a href="{{url('logout')}}" class="p-2 w-100 text-dark"><i class="fas fa-sign-out-alt" style="color: #dc3545"></i> Đăng xuất
				</a>
			</li>
			@endif
		</ul>
	</div>
	<!-- End MenuBar -->
	<div class="col-lg-7 mt-5 pt-4">
		<div style="position:relative">
			<img src="img/banner3.jpg" alt="" class="img-fluid border">
			<span style="position: absolute; bottom: 10px; left: 20px; font-size: 30px; font-weight:bold;">{{$User_Settup->username}}</span>
		</div>
		<div class="row mr-0">

	<!-- NewFeed -->
	<div class="col-lg-8 col-xl-8 col-sm-12 mt-3 ml-lg-0 mr-lg-0 ml-sm-5">
		<div class="settup">
			<h3> Cài đặt thông tin</h3>
			<hr>
			<form action="{{route('postsettup')}}" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td><i class="fa fa-address-book-o"></i> Tên thành viên: </td>
						<td><input type="text" name="tenthanhvien" placeholder="Tên thành viên" value="{{$User_Settup->username}}"></td>
					</tr>
					<tr>
						<td><i class="fa fa-key"></i> Mật khẩu: </td>
						<td><input type="password" name="matkhau" value="{{$User_Settup->password}}"></td>
					</tr>
					<tr>
						<td><i class="fa fa-envelope-o"></i> Email: </td>
						<td><input type="email" name="email" placeholder="email" value="{{$User_Settup->email}}"></td>
					</tr>
				</table>
				<hr>
				<table>
					<tr>
						<td width="185px;"><i class="fa fa-camera-retro"></i> Ảnh đại diện:</td>
						<td><input type="file" name="anhdaidien">
							<img src="img/{{$User_Settup->avatar}}" width="100px" height="100px">
						</td>
					</tr>
					<tr>
						<td><i class="fa fa-calendar"></i> Ngày sinh:</td>
						<td><input type="date" name="ngaysinh" value="<?php
                                    $date = date_create($User_Settup->ngaysinh);
                                    $date2 = date_format($date,"Y-m-d");
                                    echo $date2;
                                ?>"></td>
					</tr>
					<tr>
						<td><i class="fa fa-street-view"></i> Địa chỉ:</td>
						<td><textarea name="diachi" value="{{$User_Settup->diachi}}"></textarea></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Chấp nhận">
			</form>
		</div>
	</div>


	<!-- End NewFeed -->

			<!-- Tag and New Friends -->
			<div class="col-lg-4 col-xl-4 d-none d-md-none d-lg-block mt-3 mr-0">
				<!-- Khung goi y ket ban -->
				<div class="row bg-light border shadow-sm rounded p-1">
					<div class="col-12 text-info text-center">
						<h4>Gợi ý kết bạn</h4>
					</div>
					<div class="list-group">
					@foreach($gykb as $kb)
						<div class="list-group-item list-group-item-action p-1" id="box{{$kb->_id}}">
							<div class="row m-0">
								<div class="col-2 m-2 pl-0 pr-0">
									<img src="img/avatar.jpg" class="img-fluid w-100 rounded-circle">
								</div>
								<div class="col-5 pl-0 align-self-center">
									<a href="" class="align-bottom">{{$kb->username}}</a><br>
									<span class="align-top" style="font-size: 11px">2 bạn chung</span>
								</div>
								<div class="col-2 align-self-center pl-0">
									<button id="btnaddfriend{{$kb->id}}" class="btn btn-success p-1">Kết bạn</button>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$('#btnaddfriend{{$kb->id}}').click(function(){
								$.get('addfriend{{$kb->id}}',function(data){
									//$('#box{{$kb->id}}').html(data);
									alert(data);
								});
							});
						</script>
					@endforeach
					</div>
				</div>
				<!-- Ket thuc khung goi y ket ban -->

				<!-- Khung cac muc bai viet -->
				<div class="row bg-light mt-3 shadow-sm rounded p-1 border">
					<div class="col-12 text-warning text-center">
						<h4>Các thẻ bài viết</h4>
					</div>
					<div class="row bg-white rounded p-1 m-0 d-inline-flex mh-25 border w-100">
						<!-- Mot the tag -->
						<a href="" class="ml-1 mt-1">
							<div class="bg-secondary p-1 shadow-sm tag text-white">
								<i class="fa fa-circle"></i><span class="pl-2">#IT</span>
							</div>
						</a>
						<!-- Mot the tag -->
						<a href="" class="ml-1 mt-1">
							<div class="bg-secondary p-1 shadow-sm tag text-white">
								<i class="fa fa-circle"></i><span class="pl-2">#IT</span>
							</div>
						</a>
						<!-- Mot the tag -->
						<a href="" class="ml-1 mt-1">
							<div class="bg-secondary p-1 shadow-sm tag text-white">
								<i class="fa fa-circle"></i><span class="pl-2">#IT</span>
							</div>
						</a>
					</div>
				</div>
				<!-- End Tag and New Friends -->
			</div>
		</div>
	</div>

	<!-- List Friend Online -->
	<div class="col-lg-2 col-xl-2 bg-white h-100 position-fixed float-right pt-5 pl-0 pr-0 shadow-sm" style="z-index: 2; top:0px; right: 0px;">
		<div class="pl-2 pt-3 pb-0 text-secondary border-bottom">
			<h5 class="d-none d-lg-none d-xl-block">Danh sách bạn bè</h5>
			<h5 class="d-block d-lg-block d-xl-none">Chatbox</h5>
		</div>
		<!-- Hien thi 1 ban be -->
		
		@foreach($friends as $fr)
		@if($fr->user1 == session('iduser'))
		<?php
			$id_friend = $fr->user2;
		?>
		@else
		<?php
			$id_friend = $fr->user1;
		?>
		@endif
		@foreach($author as $at)
		@if($at->_id == $id_friend)
		<a id="btn_friend{{$fr->id}}">
			<div class="row ml-0 friends-online">
				<div class="col-12">
					<div class="row">
						<div class="col-3 col-lg-6 col-xl-3 pr-0 align-middle mt-1 mb-1 mr-2">
							<img src="img/{{$at->avatar}}" class="img-fluid w-100 rounded-circle">
						</div>
						<div class="col-6 col-xl-6 pl-0 align-self-center d-none d-lg-none d-xl-block">
							<span>{{$at->username}}</span>
						</div>
						<div class="col-2 col-lg-2 col-xl-2 text-success align-self-center pl-0 online-button">
							<i class="fa fa-circle"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
		<!-- Ket thuc hien thi mot ban be -->
		<Script>
			var countbox = 0
			$("#btn_friend{{$fr->id}}").click(function(){
				$.get("addchatbox={{$fr->id}}="+countbox,function(data){
					$("#chatbox").append(data);
					countbox = countbox +1;
				})
			})
		</Script>
		@endif
		@endforeach
		@endforeach



		<div class="row align-items-end position-fixed bg-light p-0 ml-0" style=" bottom: 0px;">
			<div class="col-2 pr-0 text-secondary align-middle pb-1">
				<i class="fa fa-search align-middle pb-2"></i>
			</div>
			<div class="col-10 pl-0">
				<input type="text" name="" class="w-100 border-0 bg-light  p-2"  placeholder="Tìm kiếm">
			</div>
		</div>
	</div>
	<!-- End List Friend Online -->

	
	<!-- End Body -->

	<!-- Chatbox -->
		<!-- <div class="position-fixed shadow-sm" style="bottom: 0px; right: 18%; z-index: 9; width: 260px;">
			<div class="rounded-top bg-primary p-1 shadow-sm">
				Xuan Truong
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			</div>
			<div class="bg-white p-1 shadow-sm" style="height: 300px">
				qưewqe<br>
				bg-primary<br>
				qưewqe<br>
				bg-primary<br>
				qưewqe<br>
				bg-primary<br>
			</div>
			<div>
				<input type="text" class="w-100 border-0 border-top bg-light p-1" name="">
			</div>
		</div> -->
		<!-- End Chatbox -->

		<!-- Chatbox -->
		<!-- <div class="position-fixed shadow-sm" style="bottom: 0px; right: 38%; z-index: 9; width: 260px;">
			<div class="rounded-top bg-primary p-1 shadow-sm">
				Xuan Truong
			</div>
			<div class="bg-white p-1 shadow-sm" style="height: 300px">
				qưewqe<br>
				bg-primary<br>
				qưewqe<br>
				bg-primary<br>
				qưewqe<br>
				bg-primary<br>
			</div>
			<div>
				<input type="text" class="w-100 border-0 border-top bg-light p-1" name="">
			</div>
		</div> -->
		<!-- End Chatbox -->



	<script type="text/javascript" src="js/script.js"></script>
@endsection