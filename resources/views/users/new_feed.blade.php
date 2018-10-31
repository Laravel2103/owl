<div class="new-feed">
		@include('users.upstt')
		@foreach($status as $row)
		<?php
			$author = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien)->first();
			$like = DB::table('yeuthich')->where([
            		['mathanhvien','=',session('mathanhvien')],
            		['mastatus','=',$row->mastatus],
            		])->first();
		?>
		<script>
				$(document).ready(function(){
			    	$("#comment{{$row->mastatus}}").click(function(){
			        	$("#listcomment{{$row->mastatus}}").slideToggle("slow");
			    	});
				});
		</script>
		<!-- Phan 1 status -->
		<div class="status">
			<i class="fa fa-angle-down fa-lg" style="position: absolute;top: 10px;right: 20px;color: gray;"></i>
			<!-- phan thong tin nguoi dang -->
			<div class="meminfo">
				<img src="images/{{$author->anhdaidien}}">
				<ol>
					<li><a href="profile={{$author->mathanhvien}}" style="font-size: 21px;">{{$author->tenthanhvien}}</a></li>
					<li><p>Thành viên - <?php 
						$date = date_create($row->ngaygio);
                        $date2 = date_format($date,"H:i - d/m/Y");
                        echo $date2;
					?></p></li>
				</ol>
			</div>
			<div class="clearfix"></div>
			<!-- Phan noi dung status -->
			<div class="content">
				<p>{!!$row->noidung!!}</p>
				@if(!empty($row->hinhanh))
					<img src="images/{{$row->hinhanh}}" style="max-width: 500px;margin-top: 7px;">
				@endif
			</div>
			<div class="clearfix"></div>
			<!-- binh luan, like, share -->
			<div class="like">
				<i class="fa fa-heart-o" style="color: red;margin-top: 10px;font-weight: bold;"></i><span style="color: red;font-weight: bold;"> {{$row->soyeuthich}} yêu thích</span>
				<hr style="color: #e5e5e5;background: #e5e5e5;border: 0;height: 1px;margin: 10px 0px 5px;">
				<ol>
					<li><a href="stt={{$row->mastatus}}" style="
						<?php 
							if(empty($like)) 
								echo 'color:gray'; 
							else
								echo 'color:red' ;
						?>"><i class="
						<?php 
							if(empty($like)) 
								echo 'fa fa-heart-o'; 
							else
								echo 'fa fa-heart' ;
						?>
						"></i> Yêu thích</a></li>
					<li><a id="comment{{$row->mastatus}}"><i class="fa fa-comment-o"></i> Bình luận</a></li>
					<li><a href=""><i class="fa fa-link"></i> Chia sẻ</a></li>
				</ol>
			</div>
			<div class="comment" id="listcomment{{$row->mastatus}}">
				<form action="comment{{$row->mastatus}}" method="post">
					{{ csrf_field() }}
					<img src="images/{{session('anhdaidien')}}">
					<input type="text" name="comment" placeholder="Viết bình luận..." >
					<input type="submit" value="Bình luận">
				</form>
				<div class="clearfix"></div>
				<div class="listcomment">
				<table>
					<div id="cmt">
					<?php
						$cmt = DB::table('binhluan')->where('mastatus','=',$row->mastatus)->get();
					?>
					@if(!empty($cmt))
					@foreach($cmt as $row)
						<?php
							$auth = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien)->first();
						?>
						<tr>
							<td><img src="images/{{$auth->anhdaidien}}"></td>
							<td style="padding-left: 5px;padding-top: 5px;margin-top: 0px;"><p style=""><a href="profile={{$auth->mathanhvien}}">{{$auth->tenthanhvien}}</a> : {{$row->noidung}}</p></td>
						</tr>
					@endforeach
					@endif
					</div>
				</table>
				</div>
			</div>
		</div>
		@endforeach
	</div>