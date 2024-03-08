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
                <h1>Create BLog</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="blog-list">Blog</a></li>
                    <li class="breadcrumb-item active">Create Blog</li>
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
                        <h3 class="card-title">Add BLog</h3>
                    </div>
                    <form method="post" id="formData" action="{{ route('add-blog') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title * :</label>
                                <input required type="text" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Meta Description * :</label>
                                <input required type="text" name="description" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile2">Image *</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="Image" id="exampleInputFile2"
                                            onchange="updateFileNameLabel2()">
                                        <label class="custom-file-label" id="fileLabel2" for="exampleInputFile2">Choose
                                            file
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Date * :</label>
                                <input required type="date" name="date" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Tag :</label>
                                <input required type="text" name="tag" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label>Category* :</label>
                                <select class="form-control select2-hidden-accessible" required="1"
                                    data-placeholder="Enter Category" rel="select2" name="category" tabindex="-1"
                                    aria-hidden="true" aria-required="true" required>
                                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                                    <option value="seo">SEO</option>
                                    <option value="Sport Betting">Sport Betting</option>
                                    <option value="GoodFirms">GoodFirms</option>
                                    <option value="blockchain">Blockchain</option>
                                    <option value="technology">Technology</option>
                                    <option value="Software Development">Software Development</option>
                                    <option value="ecommerce">Ecommerce</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="FinTech">FinTech</option>
                                    <option value="e-Learning-Software development">e-Learning-Software development
                                    </option>
                                    <option value="IoT/ Manufacturing">IoT/ Manufacturing</option>
                                    <option value="News">News</option>
                                    <option value="Banking IT">Banking IT</option>
                                    <option value="Big Data">Big Data</option>
                                    <option value="Business Intelligence">Business Intelligence</option>
                                    <option value="CRM">CRM</option>
                                    <option value="ERP">ERP</option>
                                    <option value="Data Analytics">Data Analytics</option>
                                    <option value="Digital Transformation">Digital Transformation</option>
                                    <option value="Enterprise Applications">Enterprise Applications</option>
                                    <option value="IT Consulting">IT Consulting</option>
                                    <option value="IT Service Management">IT Service Management</option>
                                    <option value="Information Security">Information Security</option>
                                    <option value="Infrastructure Management">Infrastructure Management</option>
                                    <option value="Managed IT">Managed IT</option>
                                    <option value="Mobile App Development">Mobile App Development</option>
                                    <option value="UI and UX Design">UI and UX Design</option>
                                    <option value="Web Development">Web Development</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Content *:</label>
                                <!-- <input required type="text" name="tag" class="form-control" /> -->
                                <!-- <input type="hidden" id="myInput" name="table_content"> -->
                                <!-- <textarea id="summernote" name="content"></textarea> -->
                                <textarea name="content" class="form-control" rows="4" cols="50"></textarea>
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
@endsection
@push('script')
<script src="{{asset ('/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset ('/admin_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script src="{{asset ('/admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
// Function to update file label for Image upload
function updateFileNameLabel2() {
    var fileName = document.getElementById("exampleInputFile2").files[0].name;
    document.getElementById("fileLabel2").innerHTML = fileName;
}

// Summernote Initialization
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

    // Click event for paragraphs
    $(document).on('click', 'p', function() {
        var $summernote = $('.note-editable');
        var selectedParagraph = $summernote.find('highlighted');
        selectedParagraph.removeClass('highlighted')
        $(this).addClass('highlighted');
        console.log('clicked paragraph');
    });

    // Click event for heading tags
    $(document).on('click', 'h1, h2, h3, h4, h5, h6', function() {
        console.log('click h tag');
        var $summernote = $('.note-editable');
        var selectedParagraph = $summernote.find('');
        selectedParagraph.removeClass('');
        $('h1, h2, h3, h4, h5, h6').removeClass('highlighted');
        $(this).addClass('highlighted');
        console.log('clicked H tag');
    });

    // Click event for inserting links
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
});

// Your Express server setup for handling file uploads using Multer
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