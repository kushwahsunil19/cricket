@extends('admin.layouts.app')

@push('singlePageCss')
<link rel="stylesheet" href="{{ asset('/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('path/to/summernote.css') }}">
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

.note-editor.note-frame .note-editing-area .note-editable {
    word-wrap: break-word;
    overflow: auto;
    padding: 112px !important;
}
</style>

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>AboutUs Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">About Us</li>
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
                        <h3 class="card-title">Update About Us</h3>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form method="post" action="{{ route('admin.aboutus-update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <!-- <label for="aboutUsContent">About Us Content</label> -->
                            <textarea id="summernote" name="content" row="40" col="10">{!! $aboutUsContent !!}</textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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

<!-- Include Summernote JS -->
<!-- <script src="{{ asset('path/to/summernote.js') }}"></script> -->
@endsection

@push('script')
<script src="{{ asset('/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>

function updateFileNameLabel() {
    var fileName = document.getElementById("exampleInputFile").files[0].name;
    document.getElementById("fileLabel").innerHTML = fileName;
}

// function updateFileNameLabel1() {
//     var fileName = document.getElementById("exampleInputFile1").files[0].name;
//     document.getElementById("fileLabel1").innerHTML = fileName;
// }
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
            ['custom', ['customButton']],
        ],
        buttons: {
            customButton: function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fa fa-link"></i> Add Sidebar Link',
                    tooltip: 'Custom Button',
                    className: 'btn-custom',
                    click: function() {
                        var $summernote = $('.note-editable');
                        var selectedParagraph = $summernote.find('p.highlighted');
                        var $highlightedH1 = $summernote.find('h1.highlighted');
                        var $highlightedH2 = $summernote.find('h2.highlighted');
                        var $highlightedH3 = $summernote.find('h3.highlighted');
                        var $highlightedH4 = $summernote.find('h4.highlighted');
                        var $highlightedH5 = $summernote.find('h5.highlighted');
                        var $highlightedH6 = $summernote.find('h6.highlighted');
                        if (selectedParagraph.length) {
                            var position = $summernote.find('p').index(
                                selectedParagraph);
                            var positionWords = positionToWords(position);
                            if (positionWords !== null && positionWords.trim() !== "") {
                                var generatedId = 'custom-id-' + positionWords;
                                selectedParagraph.attr('id', generatedId);
                                selectedParagraph.removeClass('highlighted');
                                $('#hrefid').val(generatedId);
                                $('#linkModal').modal('show');
                            }
                        } else if ($highlightedH1.length) {
                            var position = $summernote.find('h1').index($highlightedH1);
                            console.log('postion ', position);
                            var positionWords = positionToWords(position);
                            if (positionWords !== null && positionWords.trim() !== "") {
                                var generatedId = 'custom-h1-id-' + positionWords;
                                $highlightedH1.attr('id', generatedId);
                                $highlightedH1.removeClass('highlighted');
                                $('#hrefid').val(generatedId);
                                $('#linkModal').modal('show');
                            }

                        } else if ($highlightedH2.length) {
                            var position = $summernote.find('h2').index($highlightedH2);
                            console.log('postion ', position);
                            var positionWords = positionToWords(position);
                            if (positionWords !== null && positionWords.trim() !== "") {
                                var generatedId = 'custom-h2-id-' + positionWords;
                                $highlightedH2.attr('id', generatedId);
                                $highlightedH2.removeClass('highlighted');
                                $('#hrefid').val(generatedId);
                                $('#linkModal').modal('show');
                            }

                        } else if ($highlightedH3.length) {
                            var position = $summernote.find('h3').index($highlightedH3);
                            console.log('postion ', position);
                            var positionWords = positionToWords(position);
                            if (positionWords !== null && positionWords.trim() !== "") {
                                var generatedId = 'custom-h3-id-' + positionWords;
                                $highlightedH3.attr('id', generatedId);
                                $highlightedH3.removeClass('highlighted');
                                $('#hrefid').val(generatedId);
                                $('#linkModal').modal('show');
                            }

                        } else if ($highlightedH4.length) {
                            var position = $summernote.find('h4').index($highlightedH4);
                            console.log('postion ', position);
                            var positionWords = positionToWords(position);
                            if (positionWords !== null && positionWords.trim() !== "") {
                                var generatedId = 'custom-h4-id-' + positionWords;
                                $highlightedH4.attr('id', generatedId);
                                $highlightedH4.removeClass('highlighted');
                                $('#hrefid').val(generatedId);
                                $('#linkModal').modal('show');
                            }

                        } else if ($highlightedH5.length) {
                            var position = $summernote.find('h5').index($highlightedH5);
                            console.log('postion ', position);
                            var positionWords = positionToWords(position);
                            if (positionWords !== null && positionWords.trim() !== "") {
                                var generatedId = 'custom-h5-id-' + positionWords;
                                $highlightedH5.attr('id', generatedId);
                                $highlightedH5.removeClass('highlighted');
                                $('#hrefid').val(generatedId);
                                $('#linkModal').modal('show');
                            }

                        } else if ($highlightedH6.length) {
                            var position = $summernote.find('h6').index($highlightedH6);
                            console.log('postion ', position);
                            var positionWords = positionToWords(position);
                            if (positionWords !== null && positionWords.trim() !== "") {
                                var generatedId = 'custom-h6-id-' + positionWords;
                                $highlightedH6.attr('id', generatedId);
                                $highlightedH6.removeClass('highlighted');
                                $('#hrefid').val(generatedId);
                                $('#linkModal').modal('show');
                            }
                        } else {
                            alert('Please click first in content.')
                        }

                    }
                });
                return button.render();
            }
        }
    });
    $(document).on('click', 'p', function() {
        var $summernote = $('.note-editable');
        var selectedParagraph = $summernote.find('p.highlighted');
        selectedParagraph.removeClass('highlighted')
        $(this).addClass('highlighted');
        console.log('clicked paragraph');
    });
    $(document).on('click', 'h1, h2, h3, h4, h5, h6', function() {
        console.log('click h tage');
        var $summernote = $('.note-editable');
        var selectedParagraph = $summernote.find('p.highlighted');
        selectedParagraph.removeClass('highlighted');
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

function uploadImage(file) {
    let formData = new FormData();
    formData.append('image', file);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('upload') }}",
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#summernote').summernote('insertImage', data.url);
        }
    });
}

function positionToWords(position) {
    var words = ["first", "second", "third", "fourth", "fifth", "sixth", "seventh", "eighth", "ninth", "tenth",
        "eleventh", "twelfth", "thirteenth", "fourteenth", "fifteenth", "sixteenth", "seventeenth", "eighteenth",
        "nineteenth", "twentieth", "twenty-first", "twenty-second", "twenty-third", "twenty-fourth", "twenty-fifth",
        "twenty-sixth", "twenty-seventh", "twenty-eighth", "twenty-ninth", "thirtieth"
    ];
    if (position < words.length) {
        return words[position];
    } else {
        return (position + 1) + "th";
    }
}
</script>
@endpush