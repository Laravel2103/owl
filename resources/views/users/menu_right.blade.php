<div class="menu-right">
		<div class="new-friend">
		<?php
			$member = DB::table('thanhvien')->where('mathanhvien','!=',session('mathanhvien'))->take(5)->get();
		?>
			<h2>Gợi ý kết bạn</h2>
			<div class="menu-right-content">
				<ol>
					@foreach($member as $row)
					<?php
						$mem = DB::table('banbe')->where([
							['mathanhvien1','=',$row->mathanhvien],
							['mathanhvien2','=',session('mathanhvien')]
						])->orwhere([
							['mathanhvien2','=',$row->mathanhvien],
							['mathanhvien1','=',session('mathanhvien')]
						])->first();
					?>
					@if(empty($mem))
						<li><a href="addfriend={{$row->mathanhvien}}"><img src="images/{{$row->anhdaidien}}"> {{$row->tenthanhvien}}<i class="fa fa-plus"></a></i></li>
					<?php
						unset($mem);
					?>
					@endif
					@endforeach
					<!-- <li><a href=""><img src="images/avatar.jpg"> Xuân Trường<i class="fa fa-plus"></a></i></li>
					<li><a href=""><img src="images/avatar.jpg"> Xuân Trường<i class="fa fa-plus"></a></i></li> -->
				</ol>
			</div>
		</div>
		<div class="new-post">
				<h2>Bài viết mới</h2>
				<div class="new-post-content">
					<ol>
						<li><span style="background-color: #ff9f1b;">1</span><a href="">Bài viết 1</a></li>
						<li><span style="background-color: #85d074;">2</span><a href="">Bài viết 2</a></li>
						<li><span style="background-color: #c687e8;">3</span><a href="">Bài viết 3</a></li>
						<li><span style="background-color: #3dbdee;">4</span><a href="">Bài viết 4</a></li>
						<li><span style="background-color: #ee8391;">5</span><a href="">Bài viết 5</a></li>
					</ol>
				</div>
		</div>
	</div>