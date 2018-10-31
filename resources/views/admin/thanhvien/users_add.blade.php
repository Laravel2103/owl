@extends('admin.layout.layoutindex')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm thành viên
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('adduser')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên thành viên (*)</label>
                                <input class="form-control" name="tenthanhvien" placeholder="Nhập tên thành viên" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu (*)</label>
                                <input type="password" class="form-control" name="matkhau" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu (*)</label>
                                <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control" name="anhdaidien" />
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" name="ngaysinh"/>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ" />
                            </div>
                            <div class="form-group">
                                <label>Xu</label>
                                <input type="number" class="form-control" name="xu" placeholder="Nhập xu" />
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
                            <button type="submit" class="btn btn-default">Thêm thành viên</button>
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