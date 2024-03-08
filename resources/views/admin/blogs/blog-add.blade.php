<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
?>

@extends('admin.layouts.app')
@push('singlePageCss')
<link rel="stylesheet" href="{{asset ('/admin_assets/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/summernote/summernote-bs4.min.css') }}">
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
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit BLog</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active">Edit Blog</li>
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
                        <h3 class="card-title">Edit BLog</h3>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form method="post" action="{{ route('update-blog', ['id' => $blogs->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title * :</label>
                                <input required type="text" name="name" class="form-control"
                                    value="{{ $blogs->title }}" />
                            </div>
                            <div class="form-group">
                                <label>Meta Description * :</label>
                                <input required type="text" name="description" class="form-control"
                                    value="{{ $blogs->description }}" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Banner Image *</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="bennerImage"
                                            id="exampleInputFile"
                                            onchange="updateFileNameLabel('fileLabel', 'exampleInputFile')">
                                        <label class="custom-file-label" id="fileLabel" for="exampleInputFile">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile1">Meta Image *</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="metaImage"
                                            id="exampleInputFile1"
                                            onchange="updateFileNameLabel('fileLabel1', 'exampleInputFile1')">
                                        <label class="custom-file-label" id="fileLabel1" for="exampleInputFile1">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile2">Image *</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="Image" id="exampleInputFile2"
                                            onchange="updateFileNameLabel('fileLabel2', 'exampleInputFile2')">
                                        <label class="custom-file-label" id="fileLabel2" for="exampleInputFile2">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Date * :</label>
                                <input required type="date" name="date" class="form-control"
                                    value="{{ $blogs->date }}" />
                            </div>
                            <div class="form-group">
                                <label>Tag :</label>
                                <input required type="text" name="tag" class="form-control" value="{{ $blogs->tag }}" />
                            </div>

                            <div class="form-group">
                                <label>Category* :</label>
                                <select class="form-control select2-hidden-accessible" required="1"
                                    data-placeholder="Enter Category" rel="select2" name="category" tabindex="-1"
                                    aria-hidden="true" aria-required="true" required>
                                    <option value="1"> {{ $blogs->category == 1 ? 'selected' : '' }}Artificial
                                        Intelligence</option>
                                    <option value="2"> {{ $blogs->category == 2 ? 'selected' : '' }}seo</option>
                                    <option value="3"> {{ $blogs->category == 3 ? 'selected' : '' }}Sport Betting
                                    </option>
                                    <option value="4"> {{ $blogs->category == 4 ? 'selected' : '' }}GoodFirms</option>
                                    <option value="5"> {{ $blogs->category == 5 ? 'selected' : '' }}blockchain</option>
                                    <option value="6"> {{ $blogs->category == 6 ? 'selected' : '' }}technology</option>
                                    <option value="7"> {{ $blogs->category == 7 ? 'selected' : '' }}Software Development
                                    </option>
                                    <option value="8"> {{ $blogs->category == 8 ? 'selected' : '' }}ecommerce</option>
                                    <option value="9"> {{ $blogs->category == 9 ? 'selected' : '' }}Manufacturing
                                    </option>
                                    <option value="10" {{ $blogs->category == 10 ? 'selected' : '' }}>Healthcare
                                    </option>
                                    <option value="11" {{ $blogs->category == 11 ? 'selected' : '' }}>FinTech</option>
                                    <option value="12" {{ $blogs->category == 12 ? 'selected' : '' }}>
                                        e-Learning-Software development</option>
                                    <option value="13" {{ $blogs->category == 13 ? 'selected' : '' }}>IoT/ Manufacturing
                                    </option>
                                    <option value="14" {{ $blogs->category == 14 ? 'selected' : '' }}>News</option>
                                    <option value="15" {{ $blogs->category == 15 ? 'selected' : '' }}>Banking IT
                                    </option>
                                    <option value="16" {{ $blogs->category == 16 ? 'selected' : '' }}>Big Data</option>
                                    <option value="17" {{ $blogs->category == 17 ? 'selected' : '' }}>Business
                                        Intelligence</option>
                                    <option value="18" {{ $blogs->category == 18 ? 'selected' : '' }}>CRM</option>
                                    <option value="19" {{ $blogs->category == 19 ? 'selected' : '' }}>ERP</option>
                                    <option value="20" {{ $blogs->category == 20 ? 'selected' : '' }}>Data Analytics
                                    </option>
                                    <option value="21" {{ $blogs->category == 21 ? 'selected' : '' }}>Digital
                                        Transformation</option>
                                    <option value="22" {{ $blogs->category == 22 ? 'selected' : '' }}>Enterprise
                                        Applications</option>
                                    <option value="23" {{ $blogs->category == 23 ? 'selected' : '' }}>IT Consulting
                                    </option>
                                    <option value="24" {{ $blogs->category == 24 ? 'selected' : '' }}>IT Service
                                        Management</option>
                                    <option value="25" {{ $blogs->category == 25 ? 'selected' : '' }}>Information
                                        Security</option>
                                    <option value="26" {{ $blogs->category == 26 ? 'selected' : '' }}>Infrastructure
                                        Management</option>
                                    <option value="27" {{ $blogs->category == 27 ? 'selected' : '' }}>Managed IT
                                    </option>
                                    <option value="28" {{ $blogs->category == 28 ? 'selected' : '' }}>Mobile App
                                        Development</option>
                                    <option value="29" {{ $blogs->category == 29 ? 'selected' : '' }}>UI and UX Design
                                    </option>
                                    <option value="30" {{ $blogs->category == 30 ? 'selected' : '' }}>Web Development
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Content *:</label>
                                <textarea name="content" class="form-control" rows="4"
                                    cols="50">{{ $blogs->content }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Blog</button>
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
@endsection
@push('script')
<script src="{{ asset('/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
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
<script src="{{asset ('/admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
function updateFileNameLabel() {
    var fileName = document.getElementById("exampleInputFile").files[0].name;
    document.getElementById("fileLabel").innerHTML = fileName;
}

function updateFileNameLabel1() {
    var fileName = document.getElementById("exampleInputFile1").files[0].name;
    document.getElementById("fileLabel1").innerHTML = fileName;
}

function updateFileNameLabel2() {
    var fileName = document.getElementById("exampleInputFile2").files[0].name;
    document.getElementById("fileLabel2").innerHTML = fileName;
}

function updateFileNameLabel(labelId, inputId) {
    var fileName = document.getElementById(inputId).files[0].name;
    document.getElementById(labelId).innerHTML = fileName;
}
$(function() {
    $('#summernote').summernote({
        callbacks: {
            onImageUpload: function(files) {
                uploadImage(files[0]);
            }
        },

        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear', 'style']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview']],
        ],

    });
    $(document).on('click', 'p', function() {
        var $summernote = $('.note-editable');
        var selectedParagraph = $summernote.find('highlighted');
        selectedParagraph.removeClass('highlighted')
        $(this).addClass('highlighted');
        console.log('clicked paragraph');
    });
    $(document).on('click', 'h1, h2, h3, h4, h5, h6', function() {
        console.log('click h tage');
        var $summernote = $('.note-editable');
        var selectedParagraph = $summernote.find('');
        selectedParagraph.removeClass('');
        $('h1, h2, h3, h4, h5, h6').removeClass('highlighted');
        $(this).addClass('highlighted');
        console.log('clicked H tag');
    });

    $(document).on('click', '#insertLinkButton', function() {
        var ne = $('#linkURL').val();
        var hrf = $('#hrefid').val();
        var newValu1e = '<a href="#' + hrf + '">' + ne + '</a>';
        var currentValue = $("#myInput").val();
        var newValue;
        if (currentValue) {
            newValue = currentValue + ',' + newValu1e;
        } else {
            newValue = newValu1e;
        }

        $("#myInput").val(newValue);
        $('#linkURL').val('');
        $('#hrefid').val('');
        $('#linkModal').modal('hide');
    });
})
const express = require('express');
const multer = require('multer');
const path = require('path');
const app = express();
const port = 3000;

app.use(express.static('public'));
const storage = multer.diskStorage({
    destination: function(req, file, cb) {
        cb(null, 'public/assets/images');
    },
    filename: function(req, file, cb) {
        cb(null, Date.now() + path.extname(file.originalname));
    },
});

const upload = multer({
    storage: storage
});

// Route to handle file uploads
app.post('/upload', upload.single('Image'), (req, res) => {
    res.json({
        message: 'File uploaded successfully'
    });
});

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
</script>

@endpush