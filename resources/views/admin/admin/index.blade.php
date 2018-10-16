@extends('templates.admin.master')
@section('content')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý admin</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Có 4 admin
                            </div>
@if(Session::has('msg'))
<span style="color:red;font-size: 20px">{{ Session::get('msg')}}</span>
@endif
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="col-sm-6" style="padding-bottom: 20px">
                                    <a href="{{route('admin.admin.add')}}" class="btn btn-success btn-md">Thêm admin</a>
                                </div>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên đăng nhập</th>
                                                <th>Tên đầy đủ</th>
                                                <th width="180px">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                            @php
                                                $id = $item->id;
                                                $uname = $item->username;
                                                $fname = $item->fullname;
                                                $urlDel = route('admin.admin.del',$id);
                                                $urlEdit = route('admin.admin.edit',$id);
                                            @endphp
                                            <tr class="odd gradeX">
                                                <td>{{$id}}</td>
                                                <td>{{$uname}}</td>
                                                <td>{{$fname}}</td>
                                                <td class="center">
                                                    <a href="{{$urlEdit}}" title="" class="btn btn-primary"><i class="fa fa-edit"></i>Sửa</a>
                                                    <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{$urlDel}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
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
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
@stop