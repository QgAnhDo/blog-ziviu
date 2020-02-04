@extends('admin.layouts.master')

@section('title')
	Danh sách bài viết
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
      <a class="btn btn-primary btn-sm" href="{{route('admin.posts.add')}}">Thêm mới</a><br /><br />
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách bài viết</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tiêu đề</th>
                  <th>Mô tả</th>
                  <th>Bài viết hot</th>
                  <th>Trạng thái</th>
                  <th>Rating</th>
                  <th>Ngày tạo</th>
                  <th width="70">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $item)
                  <tr>
                    <td>{{ $item->pos_id }}</td>
                    <td>{{ $item->pos_title }}</td>
                    <td>{{ $item->pos_description }}</td>
                    <td>
                        @if($item->pos_hot == 1) {{'Có'}}
                        @elseif($item->pos_hot == 0) {{'Không'}}
                        @endif
                    </td>
                    <td>
                        @if($item->pos_active == 1) {{'Bật'}}
                        @elseif($item->pos_active == 0) {{'Tắt'}}
                        @endif
                    </td>
                    <td>{{ $item->pos_rating }}</td>
                    <td>{{ date('d-m-Y H:i:s', $item->pos_created_at) }}</td>
                    <td>
                        <a href="{{route('admin.posts.edit', ['id' => $item->pos_id])}}">Sửa</a> | <a href="{{route('admin.posts.delete', ['id' => $item->pos_id])}}">Xóa</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Mô tả</th>
                  <th>Danh mục hot</th>
                  <th>Trạng thái</th>
                  <th>Rating</th>
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
