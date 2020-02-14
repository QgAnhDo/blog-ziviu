@extends('admin.layouts.master')

@section('title')
    Sửa post tag
@endsection

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Base -->
    <base href="{{asset('')}}">
@endsection

@section('content')
    <!-- Main content -->
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{ $err }}<br />
            @endforeach
        </div>
    @endif

    @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif

    <section class="content">
        <a class="btn btn-primary btn-sm" href="{{route('admin.post-tags')}}">Về trang danh sách</a><br /><br />
        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-sm-8">
                    <label for="pota_post_id">Tin tức:</label>
                    <select class="form-control" name="pota_post_id" id="pota_post_id">
                        @foreach($post as $item)
                            <option value="{{$item->pos_id}}" {{$item->pos_id == $post_tags->pota_post_id ? "selected" : ""}}>{{$item->pos_title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="pota_tag_id">Tag:</label>
                    <select class="form-control" name="pota_tag_id" id="pota_tag_id">
                        @foreach($tags as $item)
                            <option value="{{$item->tag_id}}" {{$item->tag_id == $post_tags->pota_tag_id ? "selected" : ""}}>{{$item->tag_name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Chỉnh sửa</button>
            </form>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
