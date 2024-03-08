@extends('layouts.app')

@section('title', $blog->title)
@section('description', $blog->meta_description)

@section('description', substr(strip_tags($blog->content), 0, 150))
@section('content')
<style>
    /* .img {
        max-width: 57%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .blog-img {
        float: left;
        margin-right: 20px;
    } */

    .blog-section .single-blog .blog-content {
        padding: 15px;
        background: white !important;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    h3,
    h3>a {
        font-size: 43px;
        line-height: 55.9px;
        margin-top: -10px;
        color: black;
    }

    h5,
    h5>a {
        font-size: 24px;
        line-height: 31.2px;
        margin-top: -6px;
        color: black;
    }
</style>


<section class="blog-section ptt-5 ovf-unset pb-70">
    <div class="overlay pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="single-blog">
                        <div class="blog-content">
                            <div>
                                <h3>{{ $blog->title }}</h3><br>
                                <div class="blog-img">
                                    <img src="{{ $blog->image }}" alt="Blog Image">
                                </div><br><br>
                                <h5>{{ $blog->tag }}</h5><br>
                                <div>{!! $blog->content !!}</div>
                                <br><br>
                                <p>(This post was last updated:  {{ $blog->date }},{{ $blog->updated_at->format('H:i:s') }}).</p>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="{{asset('/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- <script>
    $(document).ready(function () {
        // Initialize Summernote without specifying the height
        $('#summernote').summernote({
            // Add more options as needed
        });
    });
</script> -->
@endpush
