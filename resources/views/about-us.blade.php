@extends('layouts.app')

@section('title','Feedback | MVT')
@section('description','MVT BETTING')
@section('keyword','feedback')
@section('content')


<!-- <section class="faqs-section faqs-page">
    <div class="overlay pt-40">
        <div class=" ">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-header text-center">
                        @if(isset($aboutUsContent->aboutUsContent))
                        <p>{!! $aboutUsContent->aboutUsContent !!}</p>
                        @else
                        <p>No content available.</p>
                        @endif
                    </div>
                </div>
</section> -->
<section class="faqs-section ptt-5 faqs-page">
    <div class="overlay pt-40">
        <div class=" ">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-header text-center">
                        @if(isset($aboutUsContent->aboutUsContent))
                        <p>{!! $aboutUsContent->aboutUsContent !!}</p>
                        @else
                        <p>No content available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
