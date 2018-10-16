@extends('templates.admin.master')
@section('content')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý đơn hàng</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                Có {{$items->total()}} đơn hàng
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
                                                <th>Tên user</th>
                                                <th>Tên hàng</th>
                                                <th>Giá</th>
                                                <th>Tình trạng</th>
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
                                            $id = $item->pay_id;
                                            $username = $item->username;
                                            $name = $item->name;
                                            $active = $item->active;
                                            $urlEdit = route('admin.cat.edit',$id);
                                            $urlDel = route('admin.cat.del',$id);
                                            $cost = $item->cost;
                                            $recost = $item->recost;
                                            $money = $cost * (100 - $recost) / 100;
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
                                                <td class="center">{{$username}}</td>
                                                <td class="center">{{$name}}</td>
                                                <td class="center">{{$money}}</td>
                                                <td class="center" id="result-{{$id}}">
                                                    <a href="javascript:void(0)" onclick="return getActive({{$id}})">
                                                    @if($active == 1)
                                                    <img src="/templates/admin/images/active.png"></a><span>Chưa xử lý</span>
                                                    @else
                                                    <img src="/templates/admin/images/deactive.png"></a><span>Đã xử lý</span>
                                                    @endif
                                                </td>
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
<script type="text/javascript">
    function getActive(id){
        $.ajax({
          url: "{{route('ajax.produce.active')}}",
          type: 'GET',
          cache: false,
          data: {
                id: id,
            },
          success: function(data){

            $('#result-'+id).html(data);
          }, 
          error: function() {
           alert("Có lỗi");
         }
       }); 
        return false;
      }
</script>