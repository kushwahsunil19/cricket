@extends('layouts.app')

@section('title', 'Feedback | MVT')
@section('description', 'MVT BETTING')
@section('keyword', 'feedback')
@section('content')
<style>
/*.blog-section {
    padding-top: 40px;
    padding-bottom: 40px;
}*/

.single-blog {
    height: 100%;
    margin-bottom: 20px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.row.blogs-row {
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
}

.single-blog:hover {
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
}

.blog-img {
    height: 200px;
    /* Set a fixed height for the blog image container */
    overflow: hidden;
    /* Ensure the image does not exceed the container */
}

.blog-img img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.blog-content {
    padding: 20px;
}

.bottom-item {
    margin-top: 10px;
}

.pagination {
    margin-top: 20px;
}
.marginTp{
    margin-top: 175px;
}
</style>

<section class="blog-section marginTp   ovf-unset pb-40" >
    <div class="overlay pt-40">
        <div class="col-lg-12">
            <div class="section-header text-center">
                <h3 class="sub-title ">Blogs list</h3>
                <p>Stay updated with our informative and engaging blog posts on various topics that matter to you</p>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                @foreach($blogs->chunk(3) as $chunk)
                <div class="row blogs-row">
                    @foreach($chunk as $blog)
                    <div class="col-lg-4 pt-4 col-md-6">
                        <div class="single-blog">
                            <div class="blog-img">
                                <img src="{{ $blog->image }}" alt="Blog Image">
                            </div>
                            <div class="blog-content">
                                <a href="{{ route('blogs.show', ['slug' => $blog->slug]) }}">
                                    <h5>{{ $blog->title }}</h5>
                                </a>
                                <h6>{{ $blog->tag }}</h6>
                                <p>{{ $blog->description }}</p>
                                <p>{{ $blog->category }}</p>
                                <div class="bottom-item d-flex justify-content-between align-items-center">
                                    <p>{{ $blog->date }}</p>
                                    <a href="{{ route('blogs.show', ['slug' => $blog->slug]) }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach

                <!-- Pagination HTML -->
                <ul class="pagination justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($blogs->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Previous</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $blogs->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @for ($page = 1; $page <= $blogs->lastPage(); $page++)
                        @if ($page == $blogs->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $blogs->url($page) }}">{{ $page }}</a></li>
                        @endif
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($blogs->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $blogs->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                        @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">Next</span>
                        </li>
                        @endif
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="{{ asset('/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush
