<div class="message">
	<?php
		// Request $request;
		// $mabanbe = $request['mabanbe'];
		// $addmessage = $request['message'];
		DB::table('tinnhan')->insert([
            'mabanbe' => 1,
            'mathanhvien' => session('mathanhvien'),
            'noidung' => '123',
            'ngaygio' => date('Y-m-d H:i:s')
        ]);
	?>
		<ol>
			<?php
				$message = DB::table('tinnhan')->where('mabanbe','=',$mabanbe)->get();
			?>
			@foreach($message as $row)
			<li style="<?php if($row->mathanhvien == session('mathanhvien'))echo 'float: right;background-color: #4080ff;color: white;';else echo'float:left';?>"
				title="{{$row->ngaygio}}"
			>
			{{$row->noidung}}
			</li>
			<dir class="clearfix"></dir>
			@endforeach
		</ol>
</div>