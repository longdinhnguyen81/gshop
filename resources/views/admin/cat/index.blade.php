@extends('templates.admin.master')
@section('content')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý danh mục</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                Có 100 danh mục
                            </div>
                            <!-- /.panel-heading -->
@if(Session::has('msg'))
<span style="color:red;font-size: 20px">{{ Session::get('msg')}}</span>
@endif
                            <div class="panel-body">
                                <div class="col-sm-6" style="padding-bottom: 20px">
                                    <a href="{{route('admin.cat.add')}}" class="btn btn-success btn-md">Thêm danh mục</a>
                                </div>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên danh mục</th>
                                                <th width="180px">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 0;
                                            $class = "";
                                        @endphp
                                    @foreach($items as $item)
                                        @php
                                            $id = $item->cid;
                                            $name = $item->cname;
                                            $urlEdit = route('admin.cat.edit',$id);
                                            $urlDel = route('admin.cat.del',$id);
                                            $i++;
                                        @endphp
                                    
                                        @if($i%2 == 0)
                                            @php
                                                $class = "odd gradeX";
                                            @endphp
                                        @else
                                            @php
                                                $class = "even gradeC"
                                            @endphp
                                        @endif
                                            <tr class="{{$class}}">
                                                <td class="center">{{$id}}</td>
                                            
                                                <td class="center">{{$name}}
                                                    <ul>
                                                    @foreach($cItems as $cItem)
                                                        @php
                                                            $cid = $cItem->cid;
                                                            $cname = $cItem->cname;
                                                            $pid = $cItem->parrent_id;
                                                        @endphp
                                                    @if($id == $pid)
                                                        <li>
                                                            {{$cname}}
                                                            <a href="{{route('admin.cat.edit',$cid)}}">Sửa</a>|
                                                            <a style="color:red" href="{{route('admin.cat.del',$cid)}}">Xóa</a>
                                                        </li>
                                                    @endif
                                                    @endforeach
                                                    </ul>
                                                </td>
                                                <td class="center">
                                                    <a href="{{$urlEdit}}" title="" class="btn btn-primary"><i class="fa fa-edit"></i>Sửa</a>
                                                    <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{$urlDel}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a></td>
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