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
				<img src="img/avatar.png" class="img-thumbnail">
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center test p-0">
				<a href="{{url('/')}}" class="p-2 w-100"><i class="fa fa-home"></i> Trang chủ 
				<span class="badge badge-primary badge-pill ml-1">50</span></a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center test p-0">
				<a href="profileid{{session('iduser')}}" class="p-2 w-100"><i class="fa fa-address-book"></i> Trang cá nhân</a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-0">
				<a href="" class="p-2 w-100"><i class="fa fa-address-book"></i> Trang cá nhân
				<span class="badge badge-primary badge-pill">50</span></a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-0">
				<a href="#" class="p-2 w-100"><i class="fa fa-address-book"></i> Trang cá nhân
				<span class="badge badge-primary badge-pill">99</span></a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-0">
				<a href="#" class="p-2 w-100"><i class="fa fa-address-book"></i> Trang cá nhân
				<span class="badge badge-primary badge-pill">50</span></a>
			</li>
			<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-0">
				<a href="{{url('logout')}}" class="p-2 w-100"><i class="fa fa-address-book"></i> Đăng xuất
				</a>
			</li>
			@endif
		</ul>
	</div>
	<!-- End MenuBar -->

	<!-- NewFeed -->
	<div class="col-lg-5 col-xl-5 col-sm-12 mt-5 pt-4 ml-lg-0 mr-lg-0 ml-sm-5">
		<!-- Khung soan thao bai viet -->
		<form action="{{route('UpStt')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			@if(empty(session('iduser')))
			<div class="alert alert-warning shadow-sm mt-3">
				<strong>Thông báo!</strong> <span class="" data-toggle="modal" data-target="#myModal">Đăng nhập</span> để có thể đăng tải bài viết.
			</div>
			@else
			<div class="bg-light rounded shadow-sm border">
				<div class="row border-bottom mr-1 ml-1">
					<div class="col-4 col-sm-4 border-right p-1 pl-2 text-center">
						<a href="" class=""><i class="fa fa-pencil"></i> Đăng bài viết</a>
					</div>
					<div class="col-5 col-sm-5 border-right p-1 pl-2 text-center">
						<a href=""><i class="fa fa-image"></i> Album ảnh/ video</a>
					</div>
					<div class="col-3 col-sm-3 p-1 pl-2 text-center">
						<a href=""><i class="fa fa-video-camera"></i> Trực tiếp</a>
					</div>
				</div>
				<div class="row bg-white ml-1 mr-1 border-bottom mb-2">
					<div class="col-md-2 col-sm-2 col-2 align-self-center pr-0">
						<img src="img/avatar.jpg" width="38px" class="rounded-circle img-fluid">
					</div>
					<div class="col-md-10 col-sm-10 col-10 pl-0 ">
						<textarea class="w-100 pl-0 pr-3 pt-3 pb-3" id="status" placeholder="Bạn đang nghĩ gì vậy?" rows="1" onkeyup="getVal();" name="contentstt"></textarea>
					</div>
				</div>
				<div class="row ml-1 mr-1 mb-2 justify-content-center">
					<input type="text" id="lat" name="lat" style="display:none">
					<input type="text" id="lon" name="lon" style="display:none">
					<input type="file" id="file" name="imagestatus" style="display:none">
					<div class="col-lg-3 col-2 bg-white rounded ml-1 border p-1"><label for="file" class="btn btn-primary w-100 mb-0"><i class="fas fa-image"></i><span class="d-none d-lg-inline"> Ảnh/video</span></label></div>
					<div class="col-lg-2 col-2 bg-white rounded ml-1 border p-1"><span class="btn btn-primary w-100" id="btn-add-position"><i class="fas fa-code"></i><span class="d-none d-lg-inline"> Code</span></span></div>
					<div class="col-lg-3 col-2 bg-white rounded ml-1 border p-1"><span class="btn btn-primary w-100"><i class="fa fa-tag"></i><span class="d-none d-lg-inline"> Gắn thẻ</span></span></div>
					<div class="col-lg-3 col-5 rounded ml-1  p-0 align-self-center pl-3"><input type="submit" class="btn btn-primary w-100 h-100 align-middle shadow-sm" value="Đăng bài"></div>
				</div>
			</div>
			@endif
		</form>
		<!-- Ket thuc khung soan thao bai viet -->
	
		<!-- Mot bai status -->
		@foreach($status as $stt)
		<div class="post bg-white rounded shadow-sm border z-3 mt-3">
			<!-- Thong tin tac gia -->
			<div class="pt-3 pr-3 pl-3">
				<div class="row">
					<div class="col-2 pr-0 avatar-post align-self-center">
						<img src="img/avatar.png" alt="" class="rounded-circle img-fluid w-75">
					</div>
					<div class="col-8 pl-0">
						@foreach($author as $at)
						@if($stt->author == $at->id)
						<div  style="position: relavtive">
							<a href="profileid{{$at->id}}" id="authorname{{$stt->id}}">{{$at->username}}</a><br>
							<div id="authorshow{{$stt->id}}" class="bg-light rounded shadow-sm border p-3" style="position: absolute; top: -100px; left: 0px;display: none;">
								<div class="row">
									<div class="col-3">
										<img src="img/avatar.png" alt="" class="img-fluid">
									</div>
									<div class="col-5">
										<span>{{$at->username}}</span>
									</div>
									@if($at->id != session('iduser'))
									<div class="col-4">
										<span class="btn btn-primary" id="chat{{$at->id}}" >Nhắn tin</span>
									</div>
									@endif
								</div>
							</div>
						</div>
						<script>
							$("#authorname{{$stt->id}}").mouseenter(function(){
								$("#authorshow{{$stt->id}}").show();
							});

							$("#authorname{{$stt->id}}").mouseleave(function(){
								$("#authorshow{{$stt->id}}").mouseleave(function(){
									$("#authorshow{{$stt->id}}").hide();
								});
							});

							$("#chat{{$at->id}}").click(function(){
								$.get("chat{{$at->id}}",
									function(data){
										$("#chatbox").html(data);
									//alert(data);
									//alert(data);
									//$("#danhgiabtn{{$stt->id}}").html("<i class='fas fa-grin-hearts fa-lg text-success'></i><span class='text-success font-weight-bold'> Rất hay</span>");
									//$("#comment{{$stt->id}}").prepend(data);
								});
								// alert("Đã gửi lời mời kết bạn!");
							})
						</script>
						@endif
						@endforeach
						<span class="text-secondary">
							<?php

							$hour = substr($stt->time,11,2);
							$hourNow = date('H');
							$day = substr($stt->time,0,2);
							$dayNow = date('d');
							$month = substr($stt->time,3,2);
							$monthNow = date('m');
							$year = substr($stt->time,6,4);
							$yearNow = date('Y');
							if($hour == $hourNow && $day == $dayNow && $month == $monthNow && $year == $yearNow)
							{
								$minute = substr($stt->time,14,2);
								$minuteNow = date('i');
								if($minuteNow - $minute == 0)
									echo "Vừa xong";
								else
								{
									$lastMinute = $minuteNow - $minute;
									echo $lastMinute." phút trước";
								}
							}
							else
							{
								if($day == $dayNow && $month == $monthNow && $year == $yearNow)
								{
									$lastHour = $hourNow - $hour;
									echo $lastHour." giờ trước";
								}
								else
								{
									if($month == $monthNow && $year == $yearNow)
									{
										$lastday = $dayNow - $day;
										if($lastday == 1)
										{
											$minutetomorrow = substr($stt->time,11,5);
											echo $minutetomorrow." hôm qua";
										}

										else
											echo $stt->time;

									}
									else
										echo $stt->time;
								}
							}
							?> <i class="fas fa-globe-americas"></i></span>
					</div>
					<div class="col-2">
						<i class="fas fa-ellipsis-v float-right"></i>
					</div>
				</div>

				<!-- Phan noi dung chu viet status -->
				<div class="row mt-1">
					<div class="col-12">
						<p class="mb-1 mt-1">{{$stt->content}}</p>
					</div>
				</div>
			</div>
			<!-- Ket thuc thong tin tac gia -->

			<!-- Phan hinh anh status -->
			<div class="row">
				<div class="col-12">
					@if($stt->images != '')
					<img src="img/{{$stt->images}}" alt="" class="img-fluid border-top border-bottom">
					@endif
				</div>
			</div>
			<!-- Ket thuc phan hinh anh status -->

			<!-- Phan duoi status -->
			<div class="pb-3 pr-3 pl-3">
				<!-- Phan thanh chat luong bai viet -->
				<div class="row m-2">
					<div class="col-12 pl-0 pr-0">
						<div class="progress">
							<div class="progress-bar" id="rate{{$stt->id}}" style="width:{{$stt->rate}}%">Hay</div>
						</div>
					</div>
				</div>
				<!-- Ket thuc phan thanh chat luong bai viet -->

				<div class="row border-top border-bottom ml-0 mr-0">
					<div class="col-4 text-center p-2 btn-in-status" style="position: relative;">
						<a class="text-danger" id="danhgiabtn{{$stt->id}}">
						<?php $flat = 0; ?>
						@foreach($reviews as $rv)
						@if($rv->idstt == $stt->id && $rv->iduser == session('iduser'))
						@if($rv->rev == 'good')
						<i class='fas fa-grin-hearts fa-lg text-success'></i><span class='text-success font-weight-bold'> Rất hay</span>
						@endif
						@if($rv->rev == 'normal')
						<i class='fas fa-grin-alt fa-lg text-warning'></i><span class='text-warning font-weight-bold'> Bình thường</span>
						@endif
						@if($rv->rev == 'bad')
						<i class='fas fa-tired fa-lg text-danger'></i><span class='text-danger font-weight-bold'> Dở tệ</span>
						@endif
						<?php $flat = 1; ?>
						@endif
						@endforeach
						<?php if($flat == 0)
							echo "<i class='fa fa-gavel fa-lg '></i> Đánh giá</a>";
						?>
						<div class="bg-light rounded-top shadow-sm p-2 border border-bottom-0" id="danhgiashow{{$stt->id}}"" style="position: absolute; top: -49px; left: 0px; display:none;">
							<div class="row">
								<i class="fas fa-grin-hearts fa-2x col-4 text-success" data-toggle="tooltip" data-placement="top" title="Rất hay" id="good{{$stt->id}}"></i>
								<i class="fas fa-grin-alt fa-2x col-4 text-warning" data-toggle="tooltip" data-placement="top" title="Bình thường" id="normal{{$stt->id}}"></i>
								<i class="fas fa-tired fa-2x col-4 text-danger" data-toggle="tooltip" data-placement="top" title="Tệ lắm" id="bad{{$stt->id}}"></i>
							</div>	
						</div>
					</div>
					<div class="col-4 text-center p-2 btn-in-status">
						<a class="text-info" id="comment-btn{{$stt->id}}"><i class="fa fa-coffee fa-lg"></i> Thảo luận</a>
					</div>
					<div class="col-4 text-center p-2 btn-in-status">
						<a href="" class="text-warning"><i class="fa fa-link fa-lg"></i> Chia sẻ</a>
					</div>
				</div>

				<script>
					$("#good{{$stt->id}}").click(function(){
						$.get("confirm{{$stt->id}}/good",
							function(data){
							$("#rate{{$stt->id}}").animate({width: '90%'});
							//alert(data);
							$("#danhgiabtn{{$stt->id}}").html("<i class='fas fa-grin-hearts fa-lg text-success'></i><span class='text-success font-weight-bold'> Rất hay</span>");
							//$("#comment{{$stt->id}}").prepend(data);
							
						});
					});
					$("#normal{{$stt->id}}").click(function(){
						$.get("confirm{{$stt->id}}/normal",
							function(data){
							//alert(data);
							$("#danhgiabtn{{$stt->id}}").html("<i class='fas fa-grin-alt fa-lg text-warning'></i><span class='text-warning font-weight-bold'> Bình thường</span>");
							//$("#comment{{$stt->id}}").prepend(data);
							$("#rate{{$stt->id}}").animate({width: '50%'});
						});
					});
					$("#bad{{$stt->id}}").click(function(){
						$.get("confirm{{$stt->id}}/bad",
							function(data){
							//alert(data);
							$("#danhgiabtn{{$stt->id}}").html("<i class='fas fa-tired fa-lg text-danger'></i><span class='text-danger font-weight-bold'> Dở tệ</span>");
							//$("#comment{{$stt->id}}").prepend(data);
							$("#rate{{$stt->id}}").animate({width: '10%'});
						});
					});
					$("#danhgiabtn{{$stt->id}}").mouseenter(function(){
						$("#danhgiashow{{$stt->id}}").show();
					});
					$("#danhgiabtn{{$stt->id}}").mouseleave(function(){
						$("#danhgiashow{{$stt->id}}").mouseleave(function(){
							$("#danhgiashow{{$stt->id}}").hide();
						});
					});
					
				</script>
				<div id="comment-box{{$stt->id}}">

					@if(empty(session('iduser')))
					<div class="alert alert-warning mt-3">
						<strong>Thông báo!</strong> <span class="" data-toggle="modal" data-target="#myModal">Đăng nhập</span> để có thể bình luận bài viết.
					</div>
					@else
					<div class="row mt-2" >
						<div class="col-12">
							<div class="input-group">
								<input type="text" name="comment" id="cmtcontent{{$stt->id}}" class="form-control" placeholder="Nhập bình luận...">
								<div class="input-group-append">
									<span id="postcomment{{$stt->id}}" class="btn btn-primary">Bình luận</span>
								</div>
							</div>
						</div>
					</div>
					<script>
						$("#postcomment{{$stt->id}}").click(function(){
							var content = $("#cmtcontent{{$stt->id}}").val();
							$.get("postcomment{{$stt->id}}/"+content,
								function(data){
									$("#comment{{$stt->id}}").prepend(data);
								// alert(data);
							});
							$("#cmtcontent{{$stt->id}}").val('');	

						});
						$("#comment-btn{{$stt->id}}").click(function(){
							
							$("#comment-box{{$stt->id}}").slideToggle();
							$("#cmtcontent{{$stt->id}}").focus();
						});
						
					</script>
					@endif
					<div id="comment{{$stt->id}}">
						@foreach($comment as $cmt)
						@if($cmt->idstt == $stt->id)
						<div class="row mt-2 pr-3">
							<div class="col-2 pr-1">
								<img src="img/avatar.png" class="img-thumbnail w-90 rounded">
							</div>
							<div class="col-10 pr-4 w-100 pb-1 bg-light border rounded  comment-content">
								<div class="row justify-content-between">
									<div class="col-10 col-sm-10 col-lg-10">
										<a href="" class="name-in-comment">
										@foreach($author as $at)
										@if($at->id == $cmt->author)
											{{$at->username}}
										@endif
										@endforeach
										</a>:
										<span class="text-secondary time-of-comment"> 
										<?php
										$hour = substr($cmt->time,11,2);
										$hourNow = date('H');
										$day = substr($cmt->time,0,2);
										$dayNow = date('d');
										$month = substr($cmt->time,3,2);
										$monthNow = date('m');
										$year = substr($cmt->time,6,4);
										$yearNow = date('Y');
										if($hour == $hourNow && $day == $dayNow && $month == $monthNow && $year == $yearNow)
										{
											$minute = substr($cmt->time,14,2);
											$minuteNow = date('i');
											if($minuteNow - $minute == 0)
												echo "Vừa xong";
											else
											{
												$lastMinute = $minuteNow - $minute;
												echo $lastMinute." phút trước";
											}
										}
										else
										{
											if($day == $dayNow && $month == $monthNow && $year == $yearNow)
											{
												$lastHour = $hourNow - $hour;
												echo $lastHour." giờ trước";
											}
											else
											{
												if($month == $monthNow && $year == $yearNow)
												{
													$lastday = $dayNow - $day;
													if($lastday == 1)
													{
														$minutetomorrow = substr($cmt->time,11,5);
														echo $minutetomorrow." hôm qua";
													}

													else
														echo $cmt->time;

												}
												else
													echo $cmt->time;
											}
										}

										?> 
										<i class="fa fa-clock-o"></i>
										</span>
									</div>
									<div class="col-1 col-sm-1 col-lg-2 align-self-end">
										<i class="fa fa-ellipsis-h align-middle"></i>
									</div>
								</div>

								<div class="row ">
									<div class="col-12 text-justify pr-2">
										<span>{{$cmt->content}}</span>
									</div>
								</div>

							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!-- End NewFeed -->

	<!-- Tag and New Friends -->
	<div class="col-lg-2 col-xl-2 d-none d-md-none d-lg-block mt-5 pt-4">
		@if(!empty(session('iduser')))
		<!-- Khung goi y ket ban -->
		<div class="row bg-light border shadow-sm rounded p-1">
			<div class="col-12 text-info text-center">
				<h4>Gợi ý kết bạn</h4>
			</div>
			@foreach($GoiYKetBan as $kb)
			@if($test == 1)
				<div class="col-12 bg-white rounded-top border" id="box{{$kb->_id}}">
					<div class="row">
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
			@else
			@foreach($friends as $fr)
			@if($kb->_id != $fr->user1 && $kb->_id != $fr->user2)
			<!-- Thong tin mot nguoi muon ket ban -->
			<div class="col-12 bg-white rounded-top border" id="box{{$kb->_id}}">
				<div class="row">
					<div class="col-2 m-2 pl-0 pr-0">
						<img src="img/avatar.jpg" class="img-fluid w-100 rounded-circle">
					</div>
					<div class="col-5 pl-0 align-self-center">
						<a href="" class="align-bottom">{{$kb->username}}</a><br>
						<span class="align-top" style="font-size: 11px">2 bạn chungs</span>
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
			@endif
			@endforeach
			@endif
			@endforeach
		</div>
		<!-- Ket thuc khung goi y ket ban -->
		@endif

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

	<div id="chatbox"></div>
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
							<img src="img/avatar.jpg" class="img-fluid w-100 rounded-circle">
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
			$("#btn_friend{{$fr->id}}").click(function(){
				$.get("addchatbox={{$fr->id}}",function(data){
					$("#chatbox").html(data);
				})
			})
		</Script>
		@endif
		@endforeach
		@endforeach

		<!-- Hien thi 1 ban be -->
		<!-- <a href="">
			<div class="row ml-0 friends-online">
				<div class="col-12">
					<div class="row">
						<div class="col-3 col-lg-6 col-xl-3 pr-0 align-middle mt-1 mb-1 mr-2">
							<img src="img/avatar.jpg" class="img-fluid w-100 rounded-circle">
						</div>
						<div class="col-6 col-xl-6 pl-0 align-self-center d-none d-lg-none d-xl-block">
							<span>Xuân Trường</span>
						</div>
						<div class="col-2 col-lg-2 col-xl-2 text-success align-self-center pl-0 online-button">
							<i class="fa fa-circle"></i>
						</div>
					</div>
				</div>
			</div>
		</a> -->

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
		</div>
		<!-- End Chatbox -->

	<script type="text/javascript" src="js/script.js"></script>
@endsection