@extends('admin.layouts.master')

@section('title')
	Danh sách người dùng
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách người dùng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Tên đăng nhập</th>
                  <th>Email</th>
                  <th>Avatar</th>
                  <th>Phone</th>
                  <th>Facebook</th>
                  <th>Trạng thái</th>
                  <th>Ngày tạo</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $item)
                  <tr>
                    <td>{{ $item->use_id }}</td>
                    <td>{{ $item->use_name }}</td>
                    <td>{{ $item->use_loginname }}</td>
                    <td><a target="_blank" href="mallto:{{ $item->use_email }}">{{ $item->use_email }}</a></td>
                    <td style="max-width: 100px">{{ $item->use_avatar }}</td>
                    <td>{{ $item->use_phone }}</td>
                    <td><a target="_blank" href="https://facebook.com/profile.php?id={{ $item->use_facebook_id }}">{{ $item->use_facebook_id }}</a></td>
                    <td>{{ $item->use_active }}</td>
                    <td>{{ $item->use_created_at }}</td>
                    <td><a href="{{route('admin.users.edit', ['id' => $item->use_id])}}">Sửa</a> | <a href="{{route('admin.users.delete', ['id' => $item->use_id])}}">Xóa</a></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Tên đăng nhập</th>
                  <th>Email</th>
                  <th>Avatar</th>
                  <th>Phone</th>
                  <th>Facebook</th>
                  <th>Trạng thái</th>
                  <th>Ngày tạo</th>
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