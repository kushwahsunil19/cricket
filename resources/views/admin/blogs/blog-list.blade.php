@extends('admin.layouts.app')
@push('singlePageCss')
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{asset ('/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/toastr/toastr.min.css') }}">

@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blog Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Blog</li>
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
                        <h3 class="card-title" style="padding-top:8px;">Blogs listing</h3>
                        <a href="/admin/create-blog"> <button type="button" style="width: 120px;float:right;"
                                class="btn btn-block btn-primary">Add Blog</button></a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Tag</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Content</th>
                                    <th>Last Updated</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $item)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle; height: 50px;">{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->tag }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <!-- <td>{{ $item->updated_at }}</td> -->
                                    <td>{{ $item->updated_at->format('h:i:s A') }}</td>
                                    <!-- <td>{{ $item->image }}</td> -->
                                    <td>
                                        <img src="{{ asset('storage/public/uploads/' . pathinfo($item->image)['basename']) }}"
                                            alt="{{ pathinfo($item->image)['basename'] }}"
                                            style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <td class="project-actions text-right">

                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('edit-blog', ['id' => $item->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                            data-target="#deleteModel-{{ $item->id }}">
                                            <i class="fas fa-trash">
                                            </i>
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
    @foreach($blogs as $item)
    <div class="modal fade" id="deleteModel-{{ $item->id }}" tabindex="-1" role="dialog" thetheadad
        aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Delete Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete this blog?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                    document.getElementById('deleteBlog-{{ $item->id }}').submit();">Confirm</button>
                    <form id="deleteBlog-{{ $item->id }}" action="{{ route('delete-blog', ['id' => $item->id]) }}"
                        method="GET" style="display:none;" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="modal fade" id="createModel" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
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
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                    placeholder="Enter Category Name">
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
<script src="{{asset ('/admin_assets/plugins/toastr/toastr.min.js')}}"></script>

<script>
@if(Session::has('message'))
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.success("{{ session('message') }}");
@endif
@if(Session::has('error'))
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.success("{{ session('error') }}");
@endif
$(function() {

    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "sScrollX": "100%",
        "sScrollXInner": "110%",
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "width": "100%"
    });
});
</script>
@endpush