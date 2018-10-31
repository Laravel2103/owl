<form action="{{route('upstatus')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class="up-stt">
			<i class="fa fa-edit fa-lg" style="color: rgb(206,224,241);float: left;"></i>
			<textarea placeholder="Chia sẻ với bạn bè: Tâm trạng bạn thế nào?" name="status"></textarea>
			<i class="fa fa-frown-o fa-lg" style="float: right;"></i>
		</div>
		<div class="tool-stt">
				<input type="file" name="anhstatus" id="file" class="inputfile" style="display: none;">
				<label style="float: left;color: #89be4c;" for="file" title="Đăng ảnh"><i class="fa fa-image"></i> Đăng ảnh</label>
				<label style="float: left;color: #f5c33b;" for="file" title="Liên kết"><i class="fa fa-link"></i> Liên kết</label>
				<input type="submit" name="" style="float: right;" value="Đăng bài">
		</div>
		</form>