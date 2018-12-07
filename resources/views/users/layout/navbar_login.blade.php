<!-- Navbar -->
	<nav class="navbar navbar-expand-sm bg-owl shadow-sm fixed-top">
		<div class="container">
			<!-- Nav -->
			<ul class="navbar-nav row w-100 justify-content-between">
				<!-- Logo -->
				<li class="navbar-brand col-1 text-white p-0">
					<a class="" href="#"><img src="img/logo8.png" class="img-fluid w-70" id="logo" alt="Owl Study"></a>
				</li>
				<!-- End logo -->
				<!-- Input Search -->
				<li class="nav-item col-6 mr-5 pr-5">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text border-0" style="background-color: white !important;"><i class="fa fa-search"></i></span>
						</div>
						<input type="text" class="form-control border-0" placeholder="Tìm kiếm...">
					</div> 
				</li>
				<!-- End Input Search -->
				<!-- Icon Add Friends -->
				<li class="nav-item col-1 pr-0 align-self-center" style="position: relative;">
					<a  id="btnaddfriend"><i class="fa fa-user-plus fa-2x float-right"></i></a>
					<div class="bg-white shadow-sm border" id="showaddfriend" style="position: absolute;bottom: -330px;left: -50px; width: 400px;display: none;">
						<div class="row p-0 m-0">
							<div class="col-12 border-bottom p-1 align-self-center">
								<h6 class="mb-0">Lời mời kết bạn</h6>
							</div>
							
							@foreach($addfriends as $af)
							@foreach($author as $at)
							@if($af->user1 == $at->id)
							<div class="col-12 border-bottom p-1">
								<div class="row pl-2">
									<div class="col-2 align-self-center">
										<img src="img/avatar.png" class="img-fluid">
									</div>
									<div class="col-4">
										<a href="">{{$at->username}}</a>
										<p class="mb-0">2 bạn chung</p>
									</div>
									<div class="col-6 align-self-center">
										<a href="agreefriend={{$af->id}}" class="btn btn-success p-1">Chấp nhận</a>
										<a href="unagreefriend={{$af->id}}" class="btn btn-danger p-1">Từ chối</a>
									</div>
								</div>
							</div>
							@endif
							@endforeach
							@endforeach

							<!-- <div class="col-12 border-bottom p-1">
								<div class="row pl-2">
									<div class="col-2 align-self-center">
										<img src="img/avatar.png" class="img-fluid">
									</div>
									<div class="col-4">
										<a href="">Xuân Trường</a>
										<p class="mb-0">2 bạn chung</p>
									</div>
									<div class="col-6 align-self-center">
										<a href="" class="btn btn-success p-1">Chấp nhận</a>
										<a href="" class="btn btn-danger p-1">Từ chối</a>
									</div>
								</div>
							</div>

							<div class="col-12 border-bottom p-1">
								<div class="row pl-2">
									<div class="col-2 align-self-center">
										<img src="img/avatar.png" class="img-fluid">
									</div>
									<div class="col-4">
										<a href="">Xuân Trường</a>
										<p class="mb-0">2 bạn chung</p>
									</div>
									<div class="col-6 align-self-center">
										<a href="" class="btn btn-success p-1">Chấp nhận</a>
										<a href="" class="btn btn-danger p-1">Từ chối</a>
									</div>
								</div>
							</div>

							<div class="col-12 border-bottom p-1">
								<div class="row pl-2">
									<div class="col-2 align-self-center">
										<img src="img/avatar.png" class="img-fluid">
									</div>
									<div class="col-4">
										<a href="">Xuân Trường</a>
										<p class="mb-0">2 bạn chung</p>
									</div>
									<div class="col-6 align-self-center">
										<a href="" class="btn btn-success p-1">Chấp nhận</a>
										<a href="" class="btn btn-danger p-1">Từ chối</a>
									</div>
								</div>
							</div>

							<div class="col-12 border-bottom p-1">
								<div class="row pl-2">
									<div class="col-2 align-self-center">
										<img src="img/avatar.png" class="img-fluid">
									</div>
									<div class="col-4">
										<a href="">Xuân Trường</a>
										<p class="mb-0">2 bạn chung</p>
									</div>
									<div class="col-6 align-self-center">
										<a href="" class="btn btn-success p-1">Chấp nhận</a>
										<a href="" class="btn btn-danger p-1">Từ chối</a>
									</div>
								</div>
							</div>

							<div class="col-12 align-seft-center">
								<center><a href="" class="m-auto text-center">Xem tất cả</a></center>
							</div> -->

							<div class="col-12"></div>
						</div>
					</div>
				</li>
				<!-- Icon Chatbox -->
				<li class="nav-item col-1 pr-0 align-self-center">
					<i class="fas fa-comment-dots fa-2x float-right"></i>
				</li>
				<!-- Icon Nofition -->
				<li class="nav-item col-1 align-self-center">
					<i class="fas fa-globe-americas fa-2x float-right"></i>
				</li>
				<li class="nav-item col-1 align-self-center">
					<img src="img/avatar.jpg" class=" rounded-circle img-fluid float-right w-55">
				</li>
			</ul>
			<!-- End Nav -->
		</div>
	</nav>
	<!-- End Navbar -->