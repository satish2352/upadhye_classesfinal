@extends('website.layout.master')

@section('content')
    <div class="stricky-header stricked-menu main-menu main-header-two">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
        <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
        <div class="container text-center">
            <h2 class="page-header__title">Pre Foundation Batch</h2><!-- /.page-title -->
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="index-2.html">Home</a></li>
                <li><span>Pre Foundation Batch</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <!-- Course Start -->
    <section class="course-three"
        style="background-image: url({{ asset('website/assets/images/shapes/category-bg-3.jpg') }});" id="course">
        <div class="container">
            <div class="section-title wow fadeInUp text-center" data-wow-delay="100ms">
                <h5 class="section-title__tagline">
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
                </h5>
                <h2 class="section-title__title">Offerd Courses</h2>
            </div><!-- section-title -->
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-delay="200ms">
                    <div class="course-three__item">
                        <div class="course-three__content p-3 w-100">
                            {{-- <ul class="course-details__sidebar__lists clerfix"> --}}

                            <div class="row pt-2">
                                <div class="col-lg-3 d-flex align-items-center">

                                    <h3 class="testimonial-two__title"><span class="icon-color-yekkow"><i
                                                class="icon-instructor"></i></span> Course Type :</h3>
                                </div>
                                <div class="col-lg-9"><span class="course-details__overview__text">For student 8 to 10th science (P.C.M.B).</span></div>
                            </div>
                            <hr>

                            <div class="row ">
                                <div class="col-lg-3 d-flex align-items-center">
                                    <h3 class="testimonial-two__title"><span class="icon-color-yekkow"><i
                                                class="icon-history"></i></span> Course Duration</h3>
                                </div>
                                <div class="col-lg-9"><span class="course-details__overview__text">Student can option for 1, 2 or 3 year course.</span></div>
                            </div>
                            <hr>
                             <div class="row ">
                                <div class="col-lg-3 d-flex align-items-center">
                                    <h3 class="testimonial-two__title"><span class="icon-color-yekkow"><i
                                                class="icon-book"></i></span> Preparation :</h3>
                                </div>
                                <div class="col-lg-9"><span class="course-details__overview__text">Preparation for olympiads | KVPY | NTSE | MTSE | IMO | NSO | ICHO IPHO | IBO.</span></div>
                            </div>
                            <hr>
                        </div><!-- /.course-content -->
                    </div><!-- /.course-card-two -->
                </div>


            </div>
        </div>
    </section>
    <!-- Course End -->
@endsection
