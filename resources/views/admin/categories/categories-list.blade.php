  @extends('admin.layouts.app')
  @push('singlePageCss')
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  @endpush
  @section('content')
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Categories Data</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Categories</li>
                  </ol>
              </div>
          </div>
      </div>
  </section>
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title" style="padding-top:8px;">Categories listing</h3>
                          <button type="button" data-toggle="modal" data-target="#createModel" style="width: 120px;float:right;" class="btn btn-block btn-primary">Add Category</button>
                      </div>
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>S.No</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Created Date</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($data as $item)
                                  <tr>
                                      <td>{{$loop->iteration }}</td>
                                      <td>{{$item->name}}</td>
                                      <td>
                                          @if($item->status)
                                          Active
                                          @else
                                          Deactivate
                                          @endif
                                      </td>
                                      <td>{{$item->created_at}}</td>
                                      <td class="project-actions text-right">
                                          <a class="btn btn-info btn-sm" href="#">
                                              <i class="fas fa-pencil-alt">
                                              </i>
                                              Edit
                                          </a>
                                          <a class="btn btn-danger btn-sm" href="#">
                                              <i class="fas fa-trash">
                                              </i>
                                              Delete
                                          </a>
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="createModel" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog " role="document">
              <div class="modal-content">
                  <div class="card card-primary" style="margin-bottom:0px;">
                      <div class="card-header">
                          <h3 class="card-title">Add Category</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <form action="{{ route('add-category') }}" method="post">
                          <div class="card-body">
                          @csrf
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Category Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Category Name">
                              </div>
                              <div class="form-group">
                                  <label>Status</label>
                                  <select class="form-control select2 select2-hidden-accessible" name="status">
                                      <option value="1">Active</option>
                                      <option value="0">Deactivate</option>
                                  </select>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-danger">
                                  <i class="fa fa-ban"></i> Reset
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

  </section>

  @endsection
  @push('script')
  <script src="{{asset ('/admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{asset ('/admin_assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script>
      $(function() {
          $("#example1").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": false,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });
  </script>
  @endpush