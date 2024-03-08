@extends('layouts.app')

@section('title','FAQs | MVT')
@section('description','MVT BETTING')
@section('keyword','mvt')
@section('content')

<style>

@media screen and (max-width: 825px) {
    .faqs-section.faqs-page ul .cmn-btn {
        max-width: 100%;
        margin: 0px auto;
        text-align: left;
    }

    .faqs-section.faqs-page ul {
        border: 1px solid var(--border-color);
        border-radius: 50px;
        padding: 10px 5px;
        margin-bottom: 40px;
    }
}

@media (max-width: 575px) {
    .faqs-section .accordion .accordion-item .accordion-button {
        padding-left: 20px !important;
        padding-right: 60px !important;
    }
}
</style>


<section class="faqs-section ptt-5 faqs-page">
    <div class="overlay pt-40">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-header text-center">
                        <h3 class="sub-title">Frequently Asked Questions</h3>
                        {{-- <h2 class="title">If you have questions we have answer</h2>
                        <p>Answers for our most popular questions about bettings.</p> --}}
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mb-5">
                {{-- <ul class="nav" role="tablist">
                    @foreach($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="cmn-btn" id="{{ $category->id }}" data-bs-toggle="tab"
                            data-bs-target="#faqs-container-{{ $category->id }}" type="button" role="tab"
                            aria-controls="faqs-container-{{ $category->id }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $category->category }}
                        </button>
                    </li>
                    @endforeach
                </ul> --}}
            </div>

            <div class="tab-content">
                @foreach($categories as $category)
                <div class="tab-pane fade {{ $loop->first ? 'show active ' : '' }}"
                    id="faqs-container-{{ $category->id }}" role="tabpanel" aria-labelledby="{{ $category->id }}">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-10">
                            <div class="faq-box">
                                <div class="accordion" id="accordion{{ $category->id }}">
                                    @if(isset($faqsByCategory[$category->id]))
                                    @foreach($faqsByCategory[$category->id] as $faq)
                                    <div class="accordion-item">
                                        <h5 class="accordion-header" id="heading{{ $faq->id }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h5>
                                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse show"
                                            aria-labelledby="heading{{ $faq->id }}"
                                            data-bs-parent="#accordion{{ $category->id }}">
                                            <div class="accordion-body">
                                                <p>{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>


<script>
$(document).ready(function() {
    $('.cmn-btn').click(function() {
        var categoryId = $(this).attr('id');

        // AJAX request
        $.ajax({
            url: '/fetch-faqs/' + categoryId,
            method: 'GET',
            success: function(data) {
                // Update the content of the corresponding container
                $('#faqs-container-' + categoryId).html(data);

                // Optional: You may want to show/hide the active class for the tabs
                $('.cmn-btn').removeClass('active');
                $(this).addClass('active');
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>


@endsection
