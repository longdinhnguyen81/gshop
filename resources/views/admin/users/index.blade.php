@extends('templates.admin.master')
@section('content')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý người dùng</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Có 100 người dùng
                            </div>
@if(Session::has('msg'))
<span style="color:red;font-size: 20px">{{ Session::get('msg')}}</span>
@endif
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên đăng nhập</th>
                                                <th>Tên đầy đủ</th>
                                                <th>Tài khoản</th>
                                                <th>Tình trạng</th>
                                                <th width="180px">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                            @php
                                                $id = $item->id;
                                                $uname = $item->username;
                                                $fname = $item->fullname;
                                                $money = $item->money;
                                                $urlDel = route('admin.users.del',$id);
                                            @endphp
                                            <tr class="odd gradeX">
                                                <td>{{$id}}</td>
                                                <td>{{$uname}}</td>
                                                <td>{{$fname}}</td>
                                                <td>{{number_format($money,0,',','.')}} VND</td>
                                                <td>
                                            @foreach($sitems as $sitem)
                                                @if($sitem->uid == $item->id)
                                                Đang nạp: {{$sitem->cost}}
                                                <a href="">Xử lý</a>
                                                @else
                                                Không có thông tin
                                                @endif
                                            @endforeach
                                                </td>
                                                <td class="center">
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