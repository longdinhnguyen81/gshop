@extends('templates.admin.master')
@section('content')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa người dùng</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Sửa người dùng
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="{{route('admin.users.edit',$item->uid)}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input class="form-control" name="username" value="{{$item->username}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input class="form-control" type="password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên đầy đủ</label>
                                                <input class="form-control" name="fullname" value="{{$item->fullname}}">
                                            </div>
                                            
                                            <button type="submit" name="submit" class="btn btn-default">Sửa</button>
                                            <button type="reset" class="btn btn-default">Nhập lại</button>
                                        </form>
                                    
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
@stop