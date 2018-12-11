<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Chatbox -->
<div class="position-fixed shadow-sm" style="bottom: 0px; right: 18%; width: 260px;box-shadow: 0 0px 5px 0 rgba(0, 0, 0, .20) !important;" >
			<div id="chats" class="rounded-top p-1 pl-2 border border-top-0 border-left-0  border-right-0" style="box-shadow: 0 4px 1px 0 rgba(0, 0, 0, .20) !important;background-color: #f5f6f7;z-index: 1032 !important">
				<div class="row m-0">
					<div class="col-9 pl-0 align-self-center">
						<i class="fa fa-circle text-success" style="font-size: 8px;"></i> <span>Xuan Truong</span>
					</div>
					<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button> -->
					<div class="col-1">
						<i class="fas fa-video"></i>
					</div>
					<div class="col-1">
						<i class="fas fa-times"></i>
					</div>
				</div>
			</div>
			<div class="bg-white p-1" id="messagebox{{$id_friend}}" style="height: 270px;overflow-y: auto;">
                @foreach($messages as $ms)
                @if($ms->id_user != session('iduser'))
				<!-- Tin nhan nguoi ban -->
				<div class="row m-0">
					<div class="col-2 p-0 align-self-end">
						<img src="img/avatar.png" alt="" class="img-fluid rounded-circle w-80">
					</div>
					<div class="col-9">
						<div class="row">
							<div class="col-12 p-1 rounded" style="background-color: #f2f3f5">
								{{$ms->content}}
							</div>
									<!-- <div class="col-12 p-1 rounded" style="margin-top: 1px; background-color: #f2f3f5">
										Nhắn tin qweq q eqw qweqwe qwe qweqw qweqwe qweqwe qeqwqwe  ưqeqwe
									</div>
									<div class="col-12 p-1 rounded" style="margin-top: 1px; background-color: #f2f3f5">
										Nhắn tin qweq q eqw qweqwe qwe qweqw qweqwe qweqwe qeqwqwe  ưqeqwe
									</div> -->
							
						</div>
					</div>
				</div>
                @else
				<!-- Tin nhan cua minh -->
				<div class="row m-0 justify-content-end mt-2">
					<div class="col-9">
						<div class="row">
                            <div class="col-12 bg-primary p-1 text-white rounded">
                                {{$ms->content}}
                            </div>
                            <!-- <div class="col-12 bg-primary p-1 text-white rounded" style="margin-top: 1px;">
                                Nhắn tin qweq q eqw qweqwe qwe qweqw qweqwe qweqwe qeqwqwe  ưqeqwe
                            </div> -->
						</div>
					</div>
				</div>
                @endif
                @endforeach
			</div>
			<div>
				<input id="message_content{{$id_friend}}" type="text" class="w-100 border border-bottom-0 border-left-0  border-right-0 bg-light p-2" name="" placeholder="Nhập tin nhắn...">
			</div>
			<div class="bg-white w-100 p-1">
					<i class="far fa-file-image" style="font-size: 20px;color: #626871"></i>
			</div>
		</div>
		<script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			$("#chatss").focus(function(){
				$("#chats").css({"background-color":"#007bff","color":"white"});
			});
			$("#chatss").blur(function(){
				$("#chats").css({"background-color":"#f5f6f7","color":"gray"});
            });
            //$('#messagebox{{$id_friend}}').animate({ scrollTop: $('#boxmess".$mabanbe."').get(0).scrollHeight}, 0);
            $('#message_content{{$id_friend}}').keypress(function(event){
                if(event.keyCode == 13 || event.which == 13)
                {
                    event.preventDefault();
                    var message = $('#message_content{{$id_friend}}').val();
                    $.get('addmessages/{{$id_friend}}/'+message,function(data){
                        $('#messagebox{{$id_friend}}').append(data);
                        //alert(data)
					});
                    // $.post("addmessages",
                    // {
                    //     id_friend: "{{$id_friend}}",
                    //     content: message
                    // },
                    // function(data){
                    //     alert(data);
                    // });
                    $('#message_content{{$id_friend}}').val('');
                    //$('#messagebox{{$id_friend}}').animate({ scrollTop: $('#boxmess".$mabanbe."').get(0).scrollHeight}, 1500);
                    // setInterval(function(){
                    // ('#messagebox".$mabanbe."').load.fadeIn(data);},1000);
                    //alert(1);
                }
            });
            // $('#xchatbox{{$id_friend}}').click(function(){
            //     $('#chatboxroom{{$id_friend}}').hide();
            // });
		</script>
		<!-- End Chatbox -->