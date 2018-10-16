@extends('templates.admin.master')
@section('content')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý thẻ cào</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                Có 3 thẻ cào
                            </div>
                            <!-- /.panel-heading -->
@if(Session::has('msg'))
<span style="color:red;font-size: 20px">{{ Session::get('msg')}}</span>
@endif
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên người nạp</th>
                                                <th>Serial</th>
                                                <th>Code</th>
                                                <th>Nhà mạng</th>
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
                                            $id = $item->sid;
                                            $name = $item->username;
                                            $seri = $item->serial;
                                            $code = $item->code;
                                            $cname = $item->card_name;
                                            $urlDel = route('admin.setcard.del',$id);
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
                                            
                                                <td class="center">{{$name}}</td>
                                                <td class="center">{{$seri}}</td>
                                                <td class="center">{{$code}}</td>
                                                <td class="center">{{$cname}}</td>
                                                <td class="center">
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