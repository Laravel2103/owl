<!-- Thanh navbar  -->
<nav class="navbar navbar-expand-md bg-info navbar-dark fixed-top p-1">
	<div class="container">
		<ul class="navbar-nav row w-100 justify-content-between">
			<li class="col-2 col-sm-3  col-md-5 col-lg-2   nav-item">
				<a class="navbar-brand" href="#"><img src="img/logo8.png" class="img-fluid w-50 w-sm-100"></a>
			</li>
			<li class="col-10 col-sm-7 col-md-5 col-lg-5  nav-item align-self-end">
				<button type="button" class="btn btn-warning shadow-sm float-right align-middle" data-toggle="modal" data-target="#myModal">Đăng nhập</button>

				<button type="button" class="btn btn-warning shadow-sm float-right mr-2" data-toggle="modal" data-target="#Modal_Register">Đăng ký</button>
			</li>
		</ul>
	</div> 
</nav>
<!-- The Modal -->

<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-light">
				<h4 class="modal-title">Đăng nhập</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="{{route('Login')}}" method="post">
				{{ csrf_field() }}
			<!-- Modal body -->
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope"></i></span>
								</div>
								<input type="text" class="form-control border-left-0" name="email" placeholder="Email">
							</div>
						</div>
						<div class="col-12 mt-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" class="form-control border-left-0" name="password" placeholder="Mật khẩu">
							</div>
						</div>
						<div class="col-12 mt-3">
							<input type="submit" name="submit" class="btn btn-primary float-right" value="Đăng nhập">
						</div>
						
						<li>
							<a href="{{url('facebook/redirect')}}" class="btn btn-primary" style="color: rgb(31,118,197);">Facebook</a>
							<a href="{{url('google/redirect')}}" class="btn btn-primary" style="color: rgb(221,7,7);">Google</a>
						</li>
					</div>
				</div>
			</div>
			</form>

		</div>
	</div>
</div>


<!-- Modal dang ky -->
<!-- The Modal -->
<div class="modal fade" id="Modal_Register">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-light">
				<h4 class="modal-title">Đăng ký</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="{{route('Register')}}" method="post">
				{{ csrf_field() }}
			<!-- Modal body -->
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-12 mb-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" class="form-control border-left-0" name="username" placeholder="Tên người dùng">
							</div>
						</div>

						<div class="col-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope"></i></span>
								</div>
								<input type="text" class="form-control border-left-0" name="email" placeholder="Email">
							</div>
						</div>
						<div class="col-12 mt-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" class="form-control border-left-0" name="password" placeholder="Mật khẩu">
							</div>
						</div>
						<div class="col-12 mt-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" class="form-control border-left-0" name="repassword" placeholder="Nhập lại mật khẩu">
							</div>
						</div>

						<div class="col-12 mt-3">
							<!--  Hiển thị thông tin trạng thái tạo bài viết -->
					    @if (session('status'))
					        <div class="alert alert-info">{{session('status')}}</div>
					    @endif
							<input type="submit" name="submit" class="btn btn-primary float-right" value="Đăng ký">
						</div>
					</div>
				</div>
			</div>
			</form>

		</div>
	</div>
</div>