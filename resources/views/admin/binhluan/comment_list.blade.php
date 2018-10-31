@extends('admin.layout.layoutindex')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách bình luận
                        </h1>
                        <a href="{{route('addcommentview')}}" style="position: absolute;top: 40px;right: 20px;text-decoration: none;color: white;background-color: #7c9b1e;padding: 10px;border-radius: 10px;box-shadow: 0 1px 3px 0 rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 2px 1px -1px rgba(0,0,0,.12);"><i class="fa fa-plus"></i> Thêm bình luận</a>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Nội dung</th>
                                <th>Ngày giờ</th>
                                <th>Tác giả</th>
                                <th>Mã status</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comment as $row)
                            <tr class="odd gradeX" align="center">
                                <?php
                                    $thanhvien = DB::table('thanhvien')->where('mathanhvien','=',$row->mathanhvien)->first();
                                ?>
                                <td>{{$row->mabinhluan}}</td>
                                
                                
                                <td>{{$row->noidung}}</td>
                                <td>{{$row->ngaygio}}</td>
                                <td>{{$thanhvien->tenthanhvien}}</td>
                                <td>{{$row->mastatus}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/editcommentview{{$row->mabinhluan}}"> Sửa</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="admin/deletecomment{{$row->mabinhluan}}"> Xóa</a></td>
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