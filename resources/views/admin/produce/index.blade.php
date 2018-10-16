@extends('templates.admin.master')
@section('content')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý shop</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                Có {{$items->total()}} mặt hàng
                            </div>
@if(Session::has('msg'))
<span style="color:red;font-size: 20px">{{ Session::get('msg')}}</span>
@endif
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="col-sm-6" style="padding-bottom: 20px">
                                    <a href="{{route('admin.produce.add')}}" class="btn btn-success btn-md">Thêm tin tức</a>
                                </div>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên hàng</th>
                                                <th>Danh mục</th>
                                                <th>Lượt mua</th>
                                                <th>Hình ảnh</th>
                                                <th width="180px">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                @foreach($items as $item)
                                    @php
                                        $id = $item->pid;
                                        $name = $item->name;
                                        $cname = $item->cname;
                                        $count = $item->count;
                                        $picture = '/storage/app/files/' . $item->picture;
                                        $urlEdit = route('admin.produce.edit',$id);
                                        $urlDel = route('admin.produce.del',$id);
                                    @endphp
                                            <tr class="odd gradeX">
                                                <td>{{$id}}</td>
                                                <td>{{$name}}</td>
                                                <td>{{$cname}}</td>
                                                <td>{{$count}}</td>
                                                <td class="center">
                                                    <img style="width:150px;height: 100px" src="{{$picture}}">
                                                </td>
                                                <td class="center">
                                                    <a href="{{$urlEdit}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                    <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{$urlDel}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    {{$items->links()}}
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
@stop
