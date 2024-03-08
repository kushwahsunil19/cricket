@extends('layouts.app')

@section('title','Contact Us')
@section('description','Contact us page')
@section('keyword','Contact us')
@section('content')

<section class="contact-section ptt-5">
    <div class="overlay">
        <div class="container bg-area">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="title text-black">Get in touch with us</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="form-content">
                        <form action="{{ route('contact.store') }}" method="post">
                            @if(session('message'))
                            <div class='alert alert-success mt-3'>
                                {{ session('message') }}
                            </div>
                            @endif
                            @csrf

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <label for="fname" class="form-label">Name</label>
                                        <input type="text" id="fname" name="name" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" name="email" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" id="phone" name="phone" placeholder="Enter your phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" id="subject" name="subject" placeholder="Enter your subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-input">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea id="message" name="message" placeholder="Enter your message" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-10">
                                    <div class="btn-border w-100 mt-40">
                                        <button class="cmn-btn w-100" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(e.target);

    axios.post(e.target.action, Object.fromEntries(formData))
        .then(response => {
            alert('Email sent successfully');
        })
        .catch(error => {
            alert('Error sending email');
            console.error(error);
        });
});
</script>
@endsection
