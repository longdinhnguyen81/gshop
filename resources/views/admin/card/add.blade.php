@extends('templates.admin.master')
@section('content')
			<div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm danh mục</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Thêm nhà mạng
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="{{route('admin.card.add')}}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <input class="form-control" name="name" placeholder="Nhập tên nhà mạng">
                                            </div>
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <input class="form-control" type="number" name="discount" placeholder="Nhập discount">
                                            </div>
                                            <button type="submit" class="btn btn-default">Thêm</button>
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