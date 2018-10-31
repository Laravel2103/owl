<!-- <script type="text/javascript">
	$(document).ready(function(){
		$("#xchatbox").click(function(){
			$("#chatbox").html("");
		});
		$('#boxmess').animate({ scrollTop: $('#boxmess').get(0).scrollHeight}, 0);
    	$("#message").keypress(function(event){
    		if(event.keyCode == 13 || event.which == 13)
    		{
    			event.preventDefault();
    		var message = $("#message").val();
    		var mabanbe = $("#mabanbe").val();
    		$.get('sendmessage'+message+mabanbe,function(data){
    			$("#messagebox").html(data);
    		});
	        $("#message").val("");
	        $('#boxmess').animate({ scrollTop: $('#boxmess').get(0).scrollHeight}, 1500);
	    }
    	});
	});
</script> -->
<div class="friend-online">
	<?php
		$ketnoi = DB::table('banbe')->where([
			['mathanhvien1','=',session('mathanhvien')],
			['ketnoi','=',true]
		])->orwhere([
			['mathanhvien2','=',session('mathanhvien')],
			['ketnoi','=',true]
		])->get();
	?>
		<h3>Danh sách bạn bè</h3>
		<input type="text" name="friend" placeholder="Tìm kiếm">
		<div class="list-friend">
			@foreach($ketnoi as $row)
			<?php
				$mem1 = DB::table('banbe')->where([
					['mathanhvien1','=',session('mathanhvien')],
					['mabanbe','=',$row->mabanbe]
				])->first();
				$member;
				if(!isset($mem1))
				{
					$member = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien1)->first();
				}
				else
				{
					$member = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien2)->first();
				}
			?>
			<script type="text/javascript">
				$(document).ready(function(){
			    	$("#addchatbox{{$row->mabanbe}}").click(function(){
			    		$.get('addchatbox{{$row->mabanbe}}',function(data){
    						//alert(data);
    						$("#chatbox").html(data);
    					});
			    	});
				});
			</script>
			<a id="addchatbox{{$row->mabanbe}}"><img src="images/{{$member->anhdaidien}}"> {{$member->tenthanhvien}} <span class="fa fa-circle"></span></a>
			<?php
				unset($mem1);
			?>
			@endforeach
			<!-- <a href=""><img src="images/avatar.jpg"> Xuân Trường <span class="fa fa-circle"></span></a> -->
		</div>
</div>

<div class="chatbox" id="chatbox">
	
</div>