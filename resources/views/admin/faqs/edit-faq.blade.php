@extends('admin.layouts.app')
@section('title', 'FAQs | MVT')
@section('description', 'MVT BETTING')
@section('keyword', 'mvt')
@section('content')

@push('singlePageCss')
<link rel="stylesheet" href="{{ asset('/admin_assets/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin_assets/plugins/summernote/summernote-bs4.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

<style>
.btn-custom {
    background-color: #337ab7;
    color: #fff;
    border: none;
    padding: 5px 10px;
}
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>FAQs Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">FAQS</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit FAQS</h3>
                    </div>
                    <form method="post" id="formData" action="{{ route('faqs-update', ['faq' => $faq->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category *:</label>
                                <select type="text" class="form-control" name="category_id" required>
                                    @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ $faq->category_id == $id ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Question * :</label>
                                <input required type="text" name="question" class="form-control" value="<?php echo $faqsData->question; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Answer * :</label>
                                <input required type="text" name="answer" class="form-control"  value="<?php echo $faqsData->answer; ?>" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkModalLabel">Side content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="linkURL" name="table_content" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="name">Your Href</label>
                    <input type="text" disabled class="form-control" id="hrefid">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="insertLinkButton">Insert Name</button>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="{{ asset('/admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/toastr/toastr.min.js') }}"></script>

<script>
$(function() {
    $("#formData").submit(function() {

    });

    $("#faqTable").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "sScrollX": "100%",
        "sScrollXInner": "110%",
    }).buttons().container().appendTo('#faqTable_wrapper .col-md-6:eq(0)');
});
</script>
@endpush

@endsection
