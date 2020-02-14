@extends('admin.layouts.master')

@section('title')
	Danh sách category
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Miêu tả</th>
                  <th>ID cha</th>
                  <th>Danh mục hot</th>
                  <th>Trạng thái</th>
                  <th>Ngày tạo</th>
                  <th>Ngày sửa</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($category as $item)
                  <tr>
                    <td>{{ $item->cat_id }}</td>
                    <td>{{ $item->cat_name }}</td>
                    <td>{{ $item->cat_description }}</td>
                    <td>{{ $item->cat_parent_id }}</td>
                    <td>
                        @if($item->cat_hot == 1) {{'Có'}}
                        @else {{'Không'}}
                        @endif
                    </td>
                    <td>
                        @if($item->cat_active == 1)
                            <span style="color: green"><b>Bật</b></span>
                        @else
                            <span style="color: red"><b>Tắt</b></span>
                        @endif
                    </td>
                    <td>{{ $item->cat_created_at }}</td>
                    <td>{{ $item->cat_updated_at }}</td>
                    <td>
                        <a href="{{route('admin.category.edit', ['id' => $item->cat_id])}}">Sửa</a>
                        |
                        <a href="{{route('admin.category.delete', ['id' => $item->cat_id])}}">Xóa</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>ID cha</th>
                  <th>Danh mục hot</th>
                  <th>Trạng thái</th>
                  <th>Ngày tạo</th>
                  <th>Ngày sửa</th>
                  <th>Hành động</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
