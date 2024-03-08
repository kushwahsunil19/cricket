@extends('layouts.app')

@section('title','Feedback | MVT')
@section('description','MVT BETTING')
@section('keyword','feedback')
@section('content')
<style>
.nav-item.selected label {
    /* Add your selected style here */
    background-color: #4CAF50;
    color: white;
}

</style>


<section class="faqs-section ptt-5 faqs-page">
    <div class="overlay pt-40">
        <div class="container">
            <form action="{{ route('feedback.store') }}" method="post" onsubmit="return validateForm()">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-header text-center">
                            <h3 class="sub-title">Share Your Feedback</h3>
                            <h2 class="title">Your Opinion Matters</h2>
                            <p>Help Us Improve Our Product with Your Feedback</p>
                        </div>
                    </div>
                    <div class="col-lg-8 justify-content-center">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center">
                        <ul class="nav" id="rating" role="tablist">
                            <li class="nav-item" role="presentation">
                                <input type="radio" class="cmn-btn visually-hidden" id="veryGoodRadio" name="rating"
                                    value="Very Good" onchange="handleRadioChange(this)">
                                <label class="cmn-btn" for="veryGoodRadio">Very Good</label>
                            </li>
                            <li class="nav-item" role="presentation">
                                <input type="radio" class="cmn-btn visually-hidden" id="goodRadio" name="rating"
                                    value="Good" onchange="handleRadioChange(this)">
                                <label class="cmn-btn" for="goodRadio">Good</label>
                            </li>
                            <li class="nav-item" role="presentation">
                                <input type="radio" class="cmn-btn visually-hidden" id="mediocreRadio" name="rating"
                                    value="Mediocre" onchange="handleRadioChange(this)">
                                <label class="cmn-btn" for="mediocreRadio">Mediocre</label>
                            </li>
                            <li class="nav-item" role="presentation">
                                <input type="radio" class="cmn-btn visually-hidden" id="badRadio" name="rating"
                                    value="Bad" onchange="handleRadioChange(this)">
                                <label class="cmn-btn" for="badRadio">Bad</label>
                            </li>
                            <li class="nav-item" role="presentation">
                                <input type="radio" class="cmn-btn visually-hidden" id="veryBadRadio" name="rating"
                                    value="Very Bad" onchange="handleRadioChange(this)">
                                <label class="cmn-btn" for="veryBadRadio">Very Bad</label>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content col-lg-8 justify-content-center mt-5">
                        <h5 class="sub-title">What could we improve?</h5>
                        <div class="single-input">
                            <textarea name="comment" id="comment" cols="30" rows="10"
                                placeholder="Enter your message"></textarea>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-10">
                            <div class="btn-border w-100 mt-40">
                                <button type="submit" class="cmn-btn w-100">Send Feedback</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
function handleRadioChange(radio) {
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('selected');
    });
    radio.parentNode.classList.add('selected');
}
</script>
<script>
function setRating(rating) {
    document.getElementById('selected-rating').value = rating;
}

function validateForm() {
    const comment = document.getElementById('comment').value;
    const selectedRating = document.getElementById('selected-rating').value;

    if (selectedRating.trim() === '') {
        alert('Please select a rating before submitting.');
        return false;
    }

    if (comment.trim() === '') {
        alert('Please enter your feedback before submitting.');
        return false;
    }

    return true;
}
</script>
