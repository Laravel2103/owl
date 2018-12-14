<!-- Navbar -->
	<nav class="navbar navbar-expand bg-owl shadow-sm fixed-top">
		<div class="container">
			<!-- Nav -->
			<ul class="navbar-nav row w-100 justify-content-between">
				<!-- Logo -->
				<li class="navbar-brand col-1 text-white p-0">
					<a class="" href=""><img src="img/logo8.png" class="img-fluid w-70" id="logo" alt="Owl Study"></a>
				</li>
				<!-- End logo -->
				<!-- Toggler/collapsibe Button -->
  				
    				<span class="navbar-toggler-icon d-block d-sm-block d-md-none"></span>

				<!-- Input Search -->
				<li class="nav-item col-6 mr-5 pr-5 d-none d-sm-block mr-sm-0 pr-sm-2">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text border-0" style="background-color: white !important;"><i class="fa fa-search"></i></span>
						</div>
						<input type="text" class="form-control border-0" placeholder="Tìm kiếm...">
					</div> 
				</li>
				<!-- End Input Search -->
				<!-- Icon Add Friends -->
				<li class="nav-item col-1 pr-0 align-self-center dropdown text-center">
					<a data-toggle="dropdown"><i class="fa fa-user-plus fa-2x "></i></a>
					<div class="bg-white shadow-sm border dropdown-menu rounded-0 pt-0 pb-1" style="margin-top: 12%;">
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
							<div class="col-12 text-center"><a>Xem tất cả</a></div>
						</div>
					</div>
				</li>
				<!-- Icon Chatbox -->
				<li class="nav-item col-1 pr-0 align-self-center dropdown text-center">
					<a data-toggle="dropdown"><i class="fas fa-comment-dots fa-2x"></i></a>
					<div class="bg-white shadow-sm border dropdown-menu rounded-0 pt-0 pb-1" style="margin-top: 12%;right: 30%;">
						<div class="row p-0 m-0">
							<div class="col-12 border-bottom p-1 align-self-center">
								<h6 class="mb-0">Tin nhắn</h6>
							</div>
							
							@foreach($message as $ms)
							@foreach($author as $at)
							@if($ms->id_user == $at->_id)
							<div class="col-12 border-bottom p-1">
								<div class="row pl-2">
									<div class="col-2 align-self-center">
										<img src="img/{{$at->avatar}}" class="img-fluid">
									</div>
									<div class="col-4">
										<a href="">{{$at->username}}</a>
										<p class="mb-0">{{$ms->content}}</p>
									</div>									
								</div>

							</div>
							@endif
							@endforeach
							@endforeach
							<div class="col-12 text-center"><a>Xem tất cả</a></div>
						</div>
					</div>
				</li>
				<!-- Icon Nofition -->
				<li class="nav-item col-1 align-self-center dropdown text-center">
					<a data-toggle="dropdown"><i class="fas fa-globe-americas fa-2x"></i></a>
					<div class="bg-white shadow-sm border dropdown-menu rounded-0 pt-0 pb-1" style="margin-top: 12%;right: 30%;">
						<div class="row p-0 m-0">
							<div class="col-12 border-bottom p-1 align-self-center">
								<h6 class="mb-0">Thông báo</h6>
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
							<div class="col-12 text-center"><a>Xem tất cả</a></div>
						</div>
					</div>
				</li>
				<li class="nav-item col-1 align-self-center dropdown text-center d-none d-sm-none d-md-block">
					<a data-toggle="dropdown"><img src="img/avatar.jpg" class=" rounded-circle img-fluid float-right w-55"></a>
					<div class="dropdown-menu rounded-0 bg-white shadow-sm border" style="margin-top: 11%;">
						<div class="row">
						<div class="col-12">
							13213
						</div>
						</div>
					</div>
				</li>
			</ul>
			<!-- End Nav -->
		</div>
	</nav>
	<!-- End Navbar -->