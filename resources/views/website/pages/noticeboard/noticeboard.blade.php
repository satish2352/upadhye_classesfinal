@extends('website.layout.master')

@section('content')
    <div class="stricky-header stricked-menu main-menu main-header-two">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
        <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
        <div class="container text-center">
            <h2 class="page-header__title">NoticeBoard</h2><!-- /.page-title -->
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="index-2.html">Home</a></li>
                <li><span>NoticeBoard</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <!-- Course Start -->
    <section class="course-three"
        style="background-image: url({{ asset('website/assets/images/shapes/course-bg-3.png') }});" id="course">
        <div class="container">
            <div class="section-title wow fadeInUp text-center" data-wow-delay="100ms">
                {{-- <h5 class="section-title__tagline">
                    Course
                    <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                        <g clip-path="url(#clip0_324_36194)">
                            <path
                                d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                            <path
                                d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                            <path
                                d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                            <path
                                d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                        </g>
                    </svg>
                </h5> --}}
                <h2 class="section-title__title">NoticeBoard</h2>
            </div><!-- section-title -->
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-delay="200ms">
                    <div class="col-xl-3 wow fadeInUp " data-wow-delay="200ms">
                        <div class="course-three__item p-2">
                            <div class="course-three__content ">
                                {{-- <ul class="course-details__sidebar__lists clerfix"> --}}
                                    <div class="d-flex  align-items-center justify-content-center">
                                    <img src="{{ asset('website/assets/images/pdf.png') }}"
                                    alt="eduact" style="width:60%">
                                    </div>
                                    <br>
                                    <div class="d-flex align-items-center justify-content-center">
                                    <button type="submit" class="eduact-btn eduact-btn-second">
                                        <span class="eduact-btn__curve"></span>Download<i class="icon-arrow"></i>
                                    </button>
                                    </div>
                            </div><!-- /.course-content -->
                        </div><!-- /.course-card-two -->
                    </div>
                 
                </div>


            </div>
        </div>
    </section>
    <!-- Course End -->
@endsection
