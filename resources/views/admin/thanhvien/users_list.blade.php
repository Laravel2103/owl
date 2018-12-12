@extends('admin.layout.layoutindex')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách thành viên
                        </h1>
                        <a href="{{route('adduserview')}}" style="position: absolute;top: 40px;right: 20px;text-decoration: none;color: white;background-color: #7c9b1e;padding: 10px;border-radius: 10px;box-shadow: 0 1px 3px 0 rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 2px 1px -1px rgba(0,0,0,.12);"><i class="fa fa-plus"></i> Thêm thành viên</a>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Mật khẩu</th>
                                <th>Email</th>
                                <th>Ảnh đại diện</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Xu</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->mathanhvien}}</td>
                                <td>{{$row->tenthanhvien}}</td>
                                <td>{{$row->matkhau}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->anhdaidien}}</td>
                                <td>{{$row->ngaysinh}}</td>
                                <td>{{$row->diachi}}</td>
                                <td>{{$row->xu}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/edituserview{{$row->mathanhvien}}"> Sửa</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="admin/deleteuser{{$row->mathanhvien}}"> Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection