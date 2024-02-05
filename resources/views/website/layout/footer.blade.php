<footer class="main-footer">
    <div class="main-footer__bg" style="background-image: url({{ asset('website/assets/images/shapes/footer-bg-1.png')}});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-5 wow fadeInUp" data-wow-delay="100ms">
                <div class="main-footer__about">
                    <a href="index-2.html" class="main-footer__logo">
                        <img src="{{ asset('website/assets/images/footer-logo-two.png')}}" alt="eduact" width="159" height="40">
                    </a><!-- /.footer-logo -->
                    <p class="main-footer__about__text">UPADHYE CLASSES stand at top in educational institutes especially for engineering and medical entrance examinations. It is coaching unit for students of XI and XII who aim to pursue career in respective fields.</p>
                    <div class="main-footer__social">
                        <a href="https://www.facebook.com/Upadhyeclass/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/p/CMo0nFYjmJM/?igshid=qyx0qsh45k91" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Frkupadhye" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCn6JXOHr112mYwWmQbFGwNA" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div><!-- /.footer-social -->
                </div><!-- footer-top -->
            </div>
            <div class="col-xl-3 col-md-4 wow fadeInUp" data-wow-delay="200ms">
                <div class="main-footer__navmenu main-footer__widget01">
                    <h3 class="main-footer__title">Courses</h3>
                    <ul>
                        <li><a href="{{ route('iitjeebatch') }}">JEE (MAIN+ADVANCED)</a></li>
                        <li><a href="{{ route('repeatersbatch') }}">Repeaters Batch</a></li>
                        <li><a href="{{ route('revisionbatch') }}">Revision Batch</a></li>
                        <li><a href="{{ route('progressivebatch') }}">XI Science</a></li>
                        <li><a href="{{ route('progressivebatch-xii') }}">XII Science</a></li>
                        <li><a href="{{ route('crashcoursebatch') }}">Crash course</a></li>
                    </ul><!-- /.list-unstyled -->
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.footer-menu -->
            </div>
            <div class="col-xl-2 col-md-3 wow fadeInUp" data-wow-delay="300ms">
                <div class="main-footer__navmenu main-footer__widget02">
                    <h3 class="main-footer__title">Useful Links</h3>
                    <ul>
                        <li><a href="{{ route('applicatioform') }}">Admission Process</a></li>
                        <li><a href="{{ route('contactus') }}">Contact</a></li>
                        <li><a href="{{ route('feespayment') }}">Online Fees Payment</a></li>
                        <li><a href="{{ route('updadhyeclasses') }}">WHY UPADHYE CLASSES</a></li>
                    </ul><!-- /.list-unstyled -->
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.footer-menu -->
            </div>
            <div class="col-xl-4 col-md-12 wow fadeInUp" data-wow-delay="400ms">
                <div class="main-footer__newsletter">
                    <h3 class="main-footer__title">Contact Us</h3>
                    <ul class="main-footer-two__info-list">
                        <li onclick="openMap()" style="cursor: pointer;"><span class="icon-Location"> 
                        </span>Upadhye Classes, 1st & 2nd Floor, Phoenix Towers, Near Jyoti Stores, New Pandit Colony, Off Gangapure Road, 422 002</li>
                        <li><span class="icon-Telephone"></span><a href="tel:9850511000">9850511000</a></li>
                        <li><span class="icon-Email"></span><a href="mailto:upadhyeclasses@gmail.com">upadhyeclasses@gmail.com</a></li>
                    </ul>
                    {{-- <form class="main-footer__email-box mc-form" data-url="MC_FORM_URL" novalidate="novalidate">
                        <div class="main-footer__email-input-box">
                            <input type="email" placeholder="Email Address" name="EMAIL">
                        </div>
                        <button type="submit" class="eduact-btn"><span class="eduact-btn__curve"></span>Subscribe</button>
                    </form> --}}
                    <div class="mc-form__response"></div>
                </div><!-- /.footer-mailchimp -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</footer><!-- /.main-footer -->


<section class="copyright text-center">
    <div class="container wow fadeInUp" data-wow-delay="400ms">
        <p class="copyright__text">Copyright <span class="dynamic-year"></span><!-- /.dynamic-year --> 
            | Upadhye Classes Designed by 
            <a href="https://www.sumagoinfotech.com/index1.php" target="_blank">
                <img src="{{ asset('website/assets/images/red-heart.png')}}" className="img-fluid" style="width:20px " alt="" />
              </a>
              From Nashik 
              {{-- <a to="https://sumagoinfotech.com/" class="cursor" target="_blank">
            <img src="{{ asset('website/assets/images/logo_sm.png')}}" className="img-fluid " alt="" style="width:18px" >
          </a> --}}
        </p>
       
    </div><!-- /.container -->
</section><!-- /.copyright -->

</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
<div class="mobile-nav__overlay mobile-nav__toggler"></div>
<!-- /.mobile-nav__overlay -->
<div class="mobile-nav__content">
    <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
    <div class="logo-box">
        <a href="index-2.html" aria-label="logo image"><img src="assets/images/logo-light.png" width="183" height="48" alt="eduact" /></a>
    </div>
    <!-- /.logo-box -->
    <div class="mobile-nav__container"></div>
    <!-- /.mobile-nav__container -->
    <ul class="mobile-nav__contact list-unstyled">
        <li>
            <i class="fas fa-envelope"></i>
            <a href="mailto:upadhyeclasses@gmail.com">upadhyeclasses@gmail.com</a>
        </li>
        <li>
            <i class="fa fa-phone-alt"></i>
            <a href="tel:9850511000">9850511000</a>
        </li>
    </ul><!-- /.mobile-nav__contact -->
    <div class="mobile-nav__social">
        <a href="https://twitter.com/rkupadhye?lang=en"><i class="fab fa-twitter"></i></a>
        <a href="https://www.facebook.com/Upadhyeclass/"><i class="fab fa-facebook"></i></a>
        <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
        <a href="https://www.youtube.com/channel/UCn6JXOHr112mYwWmQbFGwNA"><i class="fab fa-instagram"></i></a>
    </div><!-- /.mobile-nav__social -->
</div>
<!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
<div class="search-popup__overlay search-toggler"></div>
<!-- /.search-popup__overlay -->
<div class="search-popup__content">
    <form role="search" method="get" class="search-popup__form" action="#">
        <input type="text" id="search" placeholder="Search Here..." />
        <button type="submit" class="eduact-btn"><span class="eduact-btn__curve"></span><i class="icon-Search"></i></button>
    </form>
</div>
<!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="https://wa.me/9850511000"
style="position: fixed; bottom: 98px; right: 24px;"
target="_blank"
className="btn-whatsapp-pulse">
<img src="https://i.ibb.co/VgSspjY/whatsapp-button.png" alt="whatsapp">
{{-- <i className="fa fa-whatsapp"></i> --}}
</a>  
<!-- back-to-top-start -->
<a href="#" class="scroll-top">
<svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
</svg>
</a>
<!-- back-to-top-end -->

<script src="{{ asset('website/assets/vendors/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jarallax/jarallax.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/nouislider/nouislider.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/odometer/odometer.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/wnumb/wNumb.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jquery-circleType/jquery.circleType.js')}}"></script>
<script src="{{ asset('website/assets/vendors/jquery-lettering/jquery.lettering.min.js')}}"></script>
<script src="{{ asset('website/assets/vendors/tilt/tilt.jquery.js')}}"></script>
<script src="{{ asset('website/assets/vendors/wow/wow.js')}}"></script>
<script src="{{ asset('website/assets/vendors/isotope/isotope.js')}}"></script>
<script src="{{ asset('website/assets/vendors/countdown/countdown.min.js')}}"></script>
<!-- template js -->
<script src="{{ asset('website/assets/js/eduact.js')}}"></script>

<script>
    $('.show-btn').click(function(e) {
        $("#show_id").val($(this).attr("data-id"));
        $("#showform").submit();
    })
</script>
{{-- <script>
    $('.show-detail-btn').click(function(e) {
       
        $("#show-detail_id").val($(this).attr("data-id"));
        alert('detail_id');
        $("#showdetailform").submit();
    })
</script> --}}
<script>
    $('.show-detail-btn').click(function(e) {
        var detailId = $(this).attr("data-id");
        alert('detail_id: ' + detailId);
        $("#show-detail_id").val(detailId);
        $("#showdetailform").submit();
    })
</script>

<script>
    $('.active-btn').click(function(e) {
        $("#active_id").val($(this).attr("data-id"));
        $("#activeform").submit();
    })
</script>
<script>
    function openMap() {
        // Specify the map's URL in the href attribute
        var mapUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3749.097414944681!2d73.77351471474529!3d20.004425786562145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddebdc3fa72841%3A0x1b567c479d5596a6!2sUpadhye%20Classes!5e0!3m2!1sen!2sin!4v1680260496216!5m2!1sen!2sin"; // Replace with the actual coordinates or address

        // Open the map link in a new tab or window
        window.open(mapUrl, "_blank");
    }
</script>
</body>


<!-- Mirrored from bracketweb.com/eduact-html/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Dec 2023 09:38:35 GMT -->
</html>