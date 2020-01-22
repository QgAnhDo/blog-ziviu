@extends('admin.layouts.master')

@section('title')
	Thêm danh mục mới
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
    <section class="content">

		<div class="panel-body">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Tên danh mục</label>
					<input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Nhập tên danh mục">
				</div>
				<div class="form-group">
					<label for="name">Mô tả</label>
					<input type="text" class="form-control" name="description" id="description" placeholder="Nhập mô tả">
				</div>
				<div class="form-group">
					<label for="name">Ảnh đại diện</label>
					<input type="file" class="form-control" name="avatar" id="avatar">
				</div>

				<div class="form-group">
					<label for="cat_hot">Danh mục hot?</label>
					<input type="radio" name="cat_hot" value="1"> Nổi bật
					<input type="radio" name="cat_hot" value="0"> Không<br>
				</div>

				<div class="form-group">
					<label for="cat_status">Trạng thái?</label>
					<input type="radio" name="cat_active" value="1"> Hoạt động
					<input type="radio" name="cat_active" value="0"> Không<br>
				</div>

				<button class="btn btn-primary" type="submit" name="submit">Thêm Mới</button>
				<a class="btn btn-danger" type="submit" name="" href="list.php">Trở lại</a>			
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
</body>
</html>
@endsection
