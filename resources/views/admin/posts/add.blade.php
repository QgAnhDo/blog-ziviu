@extends('admin.layouts.master')

@section('title')
	Thêm bài viết mới
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
    	<a class="btn btn-primary btn-sm" href="{{route('admin.posts')}}">Về trang danh sách</a><br /><br />
		<div class="panel-body">
			<form action="" method="post" enctype="multipart/form-data">
				@csrf
                <div class="col-sm-8">
                    <div class="form-group col-sm-12">
                        <label for="name">Tiêu đề (*):</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Nhập tiêu đề">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="description">Mô tả:</label>
                        <textarea class="form-control" name="description" id="description" rows="5">Nhập mô tả ngắn</textarea>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="pos_content">Nội dung (*):</label>
                        <textarea class="form-control" name="pos_content" id="pos_content"></textarea>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="pos_website">Nguồn bài viết (Link website):</label>
                        <input type="text" class="form-control" name="pos_website" id="pos_website">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-12">
                        <label for="category">Danh mục:</label>
                        <select class="form-control" name="category" id="category">
                        @foreach($category as $item)
                            <option value="{{$item->cat_id}}">{{$item->cat_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="pos_hot">Bài viết hot? (*):</label>
                        <input type="radio" name="pos_hot" value="1"> Nổi bật
                        <input type="radio" name="pos_hot" value="0"> Không<br>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="pos_status">Trạng thái?</label>
                        <input type="radio" name="pos_status" value="1" checked> Hoạt động
                        <input type="radio" name="pos_status" value="0"> Không<br>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="pos_image">Thêm ảnh (*):</label>
                        <input type="file" class="form-control" name="pos_image" id="pos_image">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-primary" type="submit" name="submit" value="add">Thêm Mới</button>
                    <a class="btn btn-danger" href="{{route('admin.posts')}}">Trở lại</a>
                </div>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'pos_content' );
</script>
@endsection
