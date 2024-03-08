

<?php
if(isset($segments[4])){
  $currentUrl = request()->url();

$segments = explode('/', $currentUrl);

$lastEndpoint = end($segments);
$payerId = request()->query('p_type');
}
if(isset($segments[4]))
{
    $menuUrl = $segments[4];
}else
{

    $menuUrl = '';
}


?>


<!--
<style>
    @media (max-width: 768spx) {
        .header-nav {
            flex-direction: column;
            align-items: center;
        }

    }
</style> -->
<style>
.d-none {
    margin-right: 30px;
}
a.nav-link.sub-btn.sub-menu-a {
    width: max-content;
}
p.pr2 a {
    padding: inherit !important;
    margin: inherit !important;
}

/* .navbar-light .navbar-nav .nav-link {
    color: rgba(0,0,0,.55) !important;
} */
.bg-sub-1
    {
        display:none;
    }
/* .bg-sub {
        display: none !important;
    } */

    @media only screen and (min-width:320px) and (max-width:600px){
        .container-fluid.text-center {
   
    margin-top: 106px!important;
}

        .header-section .navbar-toggler {
  padding-right: 0;
  display: contents;
  border: none;
}

ul.navbar-nav.header-nav {
    width: auto;
}
.modal-content{
    width: inherit !important;
}

p.pr2 {
    font-size: 11px;
}
p.pr2 a {
    padding: inherit !important;
    margin: inherit !important;
}

h1.hd {
    font-size: 23px;
}
p.pr1 {
    font-size: 15px;
}

.container-fluid.text-center {
    margin-top: 0px;
}
.row.top_nav {
    margin-top:-6px;
}
.faqs-section {

    margin-top: 102px;
}
.header-section .navbar-toggler i{
    margin-left: inherit !important;
    float: inline-end;
    margin-top: -48px;

}
nav.navbar {
    flex-wrap: nowrap;
    display: block;
}
.col-lg-12 {
    margin-top: -120px;
}

 .subscribe-modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 100%!important; /* Could be more or less, depending on screen size */
            border-radius: 10px;
        }
    }

@media only screen and (max-width: 768px) {
     .subscribe-modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 100%!important; /* Could be more or less, depending on screen size */
            border-radius: 10px;
        }
    .bg-sub {
        display: none !important;
    }
    .faqs-section {
    position: relative;
    margin-top: 167px;
}
h3.sub-title {
    padding-top: 42px;
}
    .bg-sub-1
    {
        display:block;
    }
    /* .container-fluid.text-center {
    margin-top: 61px;
} */
.homeTable {
    margin-top: 20px !important;
}
    .o{
        margin-left: -252px;
    font-size: 16px;
    font-weight: bold;

    }
    .header-section .navbar-toggler i {
        margin-left: inherit !important;
    }
    .navbar{
        display: block;
    }
    button.navbar-toggler.collapsed {
    float: right!important;
}
    .q{

        max-width: 190%;
    word-wrap: break-word;
    font-size: 10px;

    margin-left: -307px;

    line-height: 13px;
    margin-top: 4px;
    font-weight: bold;
    }


    .table-seciont {
        padding: 0px;
        block-size: 50%;
    }

    .top_nav {
        margin: 110px 10px ;
    }

    .tab {
        margin: 2px 3px;
    }

    .inner_table {
        padding: 0px;
    }


    .margin-rt-10 {
        margin-right: 10px;
        padding-left: 22px;

    }

    .table-bordered td
        {
        padding: 0px 5px;

    }

    .table table-striped table-bordered {
        max-block-size: 60%;
    }


    .nav-item.selected label {
        background-color: #4CAF50;
        color: white;
    }

    .banner-content h1 {
        font-size: 24px;
        /* Adjust the font size as needed */
    }

    .breadcrumb-area {
        font-size: 14px;
    }

    .banner-section {
        background: var(--main);
        height: 300px;
        overflow: hidden;
    }

    .single-input textarea {
        width: 100%;
        max-width: 100%;
    }

    .btn-border {
        width: 100%;
        /* Make the button full width on smaller screens */
        max-width: 100%;
        /* Ensure it doesn't overflow the container */
    }
}
</style>
<style>
    @media only screen and (max-width: 1024px){
        h3.sub-title {
    padding-top: 107px;
}
    }
/* Existing styles for larger screens */

/* Responsive adjustments for smaller screens */
@media only screen and (max-width: 768px) {
    .blog-section {
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .tt.ml-lg-3 {
    margin-left: inherit;
    position: relative;
    left: -40px;
    font-size: 31px;
    text-align: center;
    margin-top: -30px;
}
span.q {
    font-size: 12px;
}
p.o {
    margin-left: inherit!important;
    margin-right: inherit!important;
}
span.q {
    max-width: inherit;
    margin-left: inherit;
}

    .single-blog {
        height: auto;
        margin-bottom: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .blog-img {
        height: 150px;
    }

    .blog-content {
        padding: 15px;
    }
}

/* Hover effect adjustment for touch devices */
@media (hover: none) {
    .single-blog:hover {
        box-shadow: none;
    }
}
</style>
<style>
@media (max-width: 1499px){
 .banner-section.faqs .overlay .shape-area .faqs-illu {
    width: 50%;
}
}
</style>

<style>
.table-tabs .active-color {
    background: #000;
}

.d-none {
    margin-right: 30px;
}

h1,
h1>a {
    font-size: 76px;
    line-height: 98.8px;
    margin-top: -72px;
}
.frm .error-message {
    float: left;
}
</style>

<style>
.small {

    margin-left: 22px;
}
    /*.active{
        background: #D32F2F !important;
        color: #fff!important;
        font-weight: bold!important;
    }
    .nav-link {
         font-weight: bold!important;
    }*/
.table-tabs{
     font-weight: bold!important;
}
</style>
<style>
/* .sub-nav-active {
            background: none !important;
            border-radius: 10px !important;
        } */

.active-color {
    background-color: gray;
    background: none;
    /* / background-color: #e9ecef !important; / */
}
</style>
<style>
        /* Your existing CSS styles */
        /* Modal Styles */
        .subscribeModal {
          display: none;*
          /*  position: relative;*/ /* Stay in place */
         z-index: 1000 !important; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
           /* padding-top: 60px;*/
        }


        .subscribe-modal-content {
            background-color: #fefefe;
            margin: 0% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 39%; /* Could be more or less, depending on screen size */
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .btn {
            border-radius: 35px;

            width: auto;

            height: 39px;
            color: white;
            background-color: #3498DB;
            border: none;
            font-weight: bold;
        }
         .btn:hover {
            border-radius: 35px;

            width: auto;

            height: 39px;
            color: white;
            background-color: #34495E;
            border: none;
            font-weight: bold;
        }


        .hd {
            color: #000;
            font-size: 32px;
        }
        .pr1 {
            font-size: 16px;
        }
        .pr2 {
            font-size: 12px;
        }

        .frm {
    width: 82%;
}
        .faq {
            color: #D32F2F;
            font-size: 12px;
        }


        .faq:hover {
            color: #D32F2F;
        }


    label.form-label {
    margin-bottom: 25px;
}


    </style>
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/toastr/toastr.min.css') }}">
<script src="{{asset ('/admin_assets/plugins/toastr/toastr.min.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<header class="header-section">
    <div class="overlay bg-main">
        <div class="container">
            <div class="row d-flex header-area">
                <nav class="navbar navbar-expand-lg navbar-light" style="padding-left: 0px">
                    <div class="d-flex align-items-center "> <!-- Wrap the logo and additional content in a div -->
                        <a class="navbar-brand" href="{{ asset('/') }}">
                            <img src="{{ getProfileLogo() }}" class="logo" alt="logo">

                        </a>
                       <!--  <div class="tt ml-lg-3">
                            <p class="o">Cricratings</p>
                            <span class="q">The Unofficial Cricket Ratings, Rankings & Awards </span>
                        </div> -->
                    </div>

                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-content">
                        <i class="fas fa-bars"></i>
                    </button>

                    @php
                    $isHomeActive = false;
                    if ($menuUrl == 'latest-ratings' || $menuUrl == 'historical-ratings' || $menuUrl == 'annual-ratings' || $menuUrl == 'all-time-performance') {
                        $isHomeActive = true;
                    }
                    @endphp


                    <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
                        <ul class="navbar-nav header-nav">
                            <li class="custom-btn nav-item">
                                <a class="nav-link @if ($menuUrl == 'blogs') active @endif" aria-current="page"
                                    href="{{ asset('blogs') }}">Blogs</a>
                            </li>
                            <li class="custom-btn nav-item">
                                <a class="nav-link @if ($menuUrl == 'faqs') active @endif" aria-current="page"
                                    href="{{ asset('faqs') }}">FAQs</a>
                            </li>
                            {{-- <li class="custom-btn nav-item">
                                <a class="nav-link @if ($menuUrl == 'frontend-feedback') active @endif"
                                    aria-current="page" href="{{ asset('frontend-feedback') }}">Feedback</a>
                            </li> --}}
                            <li class="custom-btn nav-item">
                                  <a class="nav-link" href="javascript:javascript:void(0)" id="signupButton">Subscribe</a>
                                    <!-- <button id="signupButton">Sign Up</button>
 -->



                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>



    <div class="overlay bg-sub">
        <div class="container"  style="padding-left: 0px;">
            <div class="row d-flex header-area">
                <nav class="navbar navbar-expand-lg navbar-light pl-0" style="padding-left: 0px;">
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-content">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse justify-content-start" id="navbar-content">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0 header-nav" style="align-items:center">
                            <li class="custom-btn" class="nav-item sub-menu-pd " style="padding-left: 0;">
                                <a class="nav-link sub-btn sub-menu-a @if ($menuUrl == '') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="custom-btn" class="nav-item sub-menu-pd " style="padding-left: 0;">
                                <a class="nav-link sub-btn sub-menu-a @if ($menuUrl == 'latest-ratings') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('h/latest-ratings/1') }}">Latest ratings</a>
                            </li>
                            <li class="custom-btn" class="nav-item sub-menu-pd">
                                <a class="nav-link  sub-btn sub-menu-a @if ($menuUrl == 'historical-ratings') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('h/historical-ratings/1') }}">Historical
                                    ratings</a>
                            </li>
                            <li class="custom-btn" class="nav-item sub-menu-pd">
                                <a class="nav-link sub-btn sub-menu-a @if ($menuUrl == 'annual-ratings') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('h/annual-ratings/1') }}">Annual awards</a>
                            </li>
                            {{-- <li class="custom-btn" class="nav-item sub-menu-pd">
                                 <a class="nav-link sub-btn sub-menu-a @if ($menuUrl == 'all-time-performance') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('h/all-time-performance/1') }}">All time
                                    Performances</a>
                            </li> --}}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="overlay  bg-sub-1" style="    background: #E8F9FD;">
        <div class="container"  style="padding-left: 0px;">
        <div class=" ">
                        <ul class="mr-auto mb-2 mb-lg-0 header-nav" style="align-items:center;">
                            <li class="custom-btn" class="nav-item sub-menu-pd " style="padding-left: 0;">
                                <a class="nav-link sub-btn sub-menu-a @if ($menuUrl == '') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="custom-btn" class="nav-item sub-menu-pd " style="padding-left: 0;">
                                <a class="nav-link sub-btn sub-menu-a @if ($menuUrl == 'latest-ratings') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('h/latest-ratings/1') }}">Latest ratings</a>
                            </li>
                            <li class="custom-btn" class="nav-item sub-menu-pd">
                                <a class="nav-link  sub-btn sub-menu-a @if ($menuUrl == 'historical-ratings') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('h/historical-ratings/1') }}">Historical
                                    ratings</a>
                            </li>
                            <li class="custom-btn" class="nav-item sub-menu-pd">
                                <a class="nav-link sub-btn sub-menu-a @if ($menuUrl == 'annual-ratings') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('h/annual-ratings/1') }}">Annual awards</a>
                            </li>
                            {{-- <li class="custom-btn" class="nav-item sub-menu-pd"> --}}
                                 {{-- <a class="nav-link sub-btn sub-menu-a @if ($menuUrl == 'all-time-performance') sub-nav-active @endif"
                                    aria-current="page" href="{{ url('h/all-time-performance/1') }}">All time
                                    Performances</a> --}}
                            {{-- </li> --}}
                        </ul>
                    </div>
        </div>
    </div>

 <!-- SubcribeModel -->
    <div id="signupModal" class="subscribeModal">

        <!-- Modal content -->
        <div class="subscribe-modal-content">
            <a class="close" id="closeModal">&times;</a>
            <h2>Sign Up</h2>
            <center>
            <div class="container"> <!-- Add container div -->
            {{-- <h1 class="hd">Enjoying this website?</h1> --}}
            <p class="pr1">Sign up for our newsletter and stay up to date with the <br>latest rankings, interesting studies, and important updates.</p>
               <form id="signupForm" name="signupForm" action="{{route('store')}}" class="form-horizontal" method="POST">

                @csrf <!-- Add CSRF token -->
                <div class="frm">
                    <label for="name" class="form-label"></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name *"> <!-- Add name attribute -->

                </div>
                <div class="frm">
                    <label for="email" class="form-label"></label> <!-- Change ID to email -->
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email *"> <!-- Add name attribute -->
                </div><br>
                <button type="submit" class="btn" id="saveBtn">Subscribe</button><br>
            </form>
            {{-- <p class="pr2">We don't share your information with 3rd parties.<br> Please read our terms and conditions and privacy policy in <a class="faq" href="{{ route('faqs') }}">FAQs</a>.</p> --}}
            </div> <!-- Close container div -->
            </center>
        </div>
    </div>
<!--  end subcribe Model-->

</header>

<script>
        // Get the modal and button elements
        var modal = document.getElementById("signupModal");
        var button = document.getElementById("signupButton");
        var closeModal = document.getElementById("closeModal");

        // Open the modal when the button is clicked
        button.onclick = function() {
            modal.style.display = "block";

        }

        // Close the modal when the close button is clicked
        closeModal.onclick = function() {
            modal.style.display = "none";
        }



        // Close the modal when the user clicks outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
    <script>
    document.getElementById('signupForm').addEventListener('submit', function(event) {

    var nameField = document.getElementById('name');
    var emailField = document.getElementById('email');
    var nameValue = nameField.value.trim();
    var emailValue = emailField.value.trim();

    if (!nameValue) {
        displayMessage(nameField, 'Name field is required.');
        event.preventDefault();
        return;
    }

    if (!emailValue) {
        displayMessage(emailField, 'Email field is required.');
        event.preventDefault();
        return;
    } else if (!isValidEmail(emailValue)) {
        displayMessage(emailField, 'Please enter a valid email address.');
        event.preventDefault();
        return;
    }
     //alert("Thank you for Subscrtion");
});

function isValidName(name) {
    var namePattern = /^[A-Za-z]+$/;
    return namePattern.test(name);
}

function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function displayMessage(field, message) {
    var existingErrorMessage=field.parentNode.querySelector('.error-message');
    if(existingErrorMessage){
        existingErrorMessage.remove();
    }
    var errorMessage = document.createElement('span');
    errorMessage.className = 'error-message';
    errorMessage.textContent = message;
    errorMessage.style.color='red';
    field.parentNode.insertBefore(errorMessage, field.nextSibling);
}
$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 document.getElementById('signupForm').addEventListener('submit', function(event) {
        e.preventDefault();

        $.ajax({
          data: $('#signupForm').serialize(),
          url: "{{ route('store') }}",
          type: "POST",
          dataType: 'json',

          success: function (data) {

              $('#signupForm').trigger("reset");
              $('#signupModal').modal('hide');
              // table.draw();
                 modal.style.display = "none";
               alert("Thank you for Subscrtion");

          },
          error: function (data) {
              console.log('Error:', data);
              // $('#saveBtn').html('Save Changes');
          }
      });
    });
</script>


