@extends('templates.admin.master')
@section('content')
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm giỏ hàng</h1>
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
                                Thêm giỏ hàng
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="{{route('admin.produce.add')}}" enctype="multipart/form-data" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label>Tên mặt hàng</label>
                                                <input class="form-control" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <select class="form-control" name="cid">
                                                @foreach($cats as $cat)
                                                    <option value="{{$cat->cid}}">{{$cat->cname}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Giá:</label>
                                                <input class="form-control" name="cost" type="number">
                                            </div>
                                            <div class="form-group">
                                                <label>Sale (%):</label>
                                                <input class="form-control" name="recost" type="number">
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả nội dung</label>
                                                <input class="form-control" name="description">
                                            </div>
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input class="form-control" name="hinhanh" multiple type="file" />
                                            </div>
                                            <div class="form-group">
                                                <label>Chi tiết</label>
                                                <textarea name="detail" id="content" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" id="btn" name="submit" class="btn btn-default">Thêm</button>
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