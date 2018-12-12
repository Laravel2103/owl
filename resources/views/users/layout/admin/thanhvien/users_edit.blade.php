@extends('admin.layout.layoutindex')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa thông tin thành viên</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/edituser{{$member->mathanhvien}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên thành viên (*)</label>
                                <input class="form-control" name="tenthanhvien" placeholder="Nhập tên thành viên" value="{{$member->tenthanhvien}}" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu (*)</label>
                                <input type="password" class="form-control" name="matkhau" placeholder="Nhập mật khẩu" value="{{$member->matkhau}}"/>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu (*)</label>
                                <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu" value="{{$member->matkhau}}"/>
                            </div>
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{$member->email}}"/>
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control" name="anhdaidien"/>
                                <img src="images/{{$member->anhdaidien}}" style="width: 100px;height: 100px;margin: 10px;vertical-align: middle;"> Tên ảnh: {{$member->anhdaidien}}
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" name="ngaysinh" value="<?php
                                    // $date = date_create("2018-05-29 15:29:06");
                                    $date = date_create($member->ngaysinh);
                                    $date2 = date_format($date,"Y-m-d");
                                    echo $date2;
                                ?>" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ" value="{{$member->diachi}}"/>
                            </div>
                            <div class="form-group">
                                <label>Xu</label>
                                <input type="number" class="form-control" name="xu" placeholder="Nhập xu" value="{{$member->xu}}"/>
                            </div>
                            <!-- <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Member
                                </label>
                            </div> -->
                            <button type="submit" class="btn btn-default">Sửa thành viên</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection