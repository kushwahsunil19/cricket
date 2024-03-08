<style>
.mvt-link {
    color: #00ff6d;
}

@media (max-width: 768px) {
    .footer-section {
        padding-top: 20px;
    }

    .footer-link {}

    .copyright p {
        font-size: 12px;
    }

    .social-link {}
}
#myTable_player_length {
    display: none;
}
#myTable_team_length {
    display: none;
}
#myTable_team_filter {
    display: none;
}
#myTable_player_filter {
    display: none;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
    color:#fff !important;
    background: #3498DB !important;
}
</style>
<footer class="footer-section">
    <div class="container pt-40">
        <div class="footer-bottom-area">
            <div class="row">
                <!-- <div class="col-xl-12">
                    <div class="menu-item">
                         <a href="{{asset('/')}}" class="logo">
                            <img src="{{asset('assets/images/logo_new.png')}}" alt="logo" class="footer-logo">
                        </a>
                        <ul class="footer-link">
                            <li><a href="{{asset('contact-us')}}">Contact</a></li>
                            <li><a href="{{asset('blogs')}}">Blogs</a></li>
                            <li><a href="{{asset('faqs')}}">FAQs</a></li>
                            <li><a href="{{asset('feedback')}}">Feedback</a></li>

                        </ul>
                    </div>
                </div> -->
                <div class="col-12">
                    <div class="copyright">
                        <div class="copy-area">
                            <!-- <p> Copyright ©2024 <a href="{{asset('/')}}" class="homeLink">cricratings.com</a> | All Rights Reserved.
                               <br/> This platform is created by RRAlists.
                                These are not official cricket rankings- please visit <a
                                    href="https://www.icc-cricket.com" class="text-cl">https://www.icc-cricket.com
                                    <icc-cricket></icc-cricket>
                                </a>
                                for
                                official cricket rankings.
                                The data used for these rankings is solely the publicly available cricket scorecards.
                            </p> -->
                            <!-- <p><a href="{{asset('/')}}" class="homeLink">Cricketratings</a>® is created by RRAlists® - it’s based on the cricket scorecards for the respective format as available in public domain. These are not official cricket rankings- please visit <a
                                    href="https://www.icc-cricket.com" class="text-cl">https://www.icc-cricket.com
                                    <icc-cricket></icc-cricket>
                                </a> for official cricket rankings. Please reach out to us for any feedback.</p> -->

                        </div>
           <span class="custom-text-footer-note">
            <p > <span>Cricketratings™ is created by RRAlists™ - it’s based on the cricket scorecards for the respective format as available in the public domain. These are not official cricket rankings - please visit<span> <a  href="https://www.icc-cricket.com">https://www.icc-cricket.com</a> <span>for official cricket rankings. This is a beta version, and the content and rankings displayed are not final. Please reach out to us for any feedback.<span>
 </p>
                        <?php $result = getSocialLink();?>
                        <div class="social-link d-flex align-items-center mt-2">
                            <a href="{{$result->facebook}}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{$result->twitter}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{$result->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                            <a href="{{$result->instagram}}"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset ('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset ('/assets/js/jquery-ui.js')}}"></script>
<script src="{{asset ('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset ('/assets/js/fontawesome.js')}}"></script>
<script src="{{asset ('/assets/js/plugin/slick.js')}}"></script>
<script src="{{asset ('/assets/js/plugin/jquery.nice-select.min.js')}}"></script>
<script src="{{asset ('/assets/js/plugin/jquery.downCount.js')}}"></script>
<script src="{{asset ('/assets/js/plugin/counter.js')}}"></script>
<script src="{{asset ('/assets/js/plugin/waypoint.min.js')}}"></script>
<script src="{{asset ('/assets/js/plugin/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset ('/assets/js/plugin/wow.min.js')}}"></script>
<script src="{{asset ('/assets/js/plugin/plugin.js')}}"></script>
<script src="{{asset ('/assets/js/main.js')}}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

    new DataTable('#myTable_team',{
        "lengthMenu": [[100, "All", 50, 25], [2, "All", 50, 25]],
        "language": {
        "emptyTable": "Coming soon"
        }
    });
    new DataTable('#myTable_player',{
        "lengthMenu": [[100, "All", 50, 25], [2, "All", 50, 25]],
        "language": {
        "emptyTable": "Coming soon"
        }
    });


  $(document).on('click','#signupButton',function(){
    $('.fa-bars').trigger('click');
  });

    @if(Session::has('success'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('success') }}");
    @endif
    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error') }}");
    @endif

    $(document).ready(function() {
    // scroll down
    // $("html, body").animate({
    //     scrollTop: $(document).height()

    // }, 9000);

    //scroll back up
    //$("html, body").animate({
      //  scrollTop: 0
    //}, 9000);

});
</script>

</body>

</html>
