@extends('admin.layout.layoutindex')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm bình luận
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('addcomment')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Thành viên (*):</label>
                                <select name="mathanhvien">
                                    <?php
                                        $member = DB::table('thanhvien')->get();
                                    ?>
                                    @foreach($member as $row)
                                        <option value="{{$row->mathanhvien}}">{{$row->tenthanhvien}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nội dung (*):</label>
                                <textarea placeholder="Nhập nội dung" rows="10" cols="140" style="resize: none;" name="noidung"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mã status</label>
                                <select name="mastatus">
                                    <?php
                                        $status = DB::table('status')->get();
                                    ?>
                                    @foreach($status as $row)
                                         <option value="{{$row->mastatus}}">{{$row->mastatus}}</option>
                                    @endforeach
                                </select>
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
                            <button type="submit" class="btn btn-default">Thêm bình luận</button>
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