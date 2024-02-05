@extends('website.layout.master')

@section('content')
<div class="stricky-header stricked-menu main-menu main-header-two">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<section class="page-header @@extraClassName" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
    <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
    <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
    <div class="container text-center">
        <h2 class="page-header__title">About</h2><!-- /.page-title -->
        <ul class="page-header__breadcrumb list-unstyled">
            <li><a href="index-2.html">Home</a></li>
            <li><span>About</span></li>
        </ul><!-- /.page-breadcrumb list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->
<!-- About Start -->
<section class="about-two about-two--about">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__thumb wow fadeInLeft" data-wow-delay="100ms"><!-- about thumb start -->
                    <div class="about-two__thumb__one eduact-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
                        <img src="{{ asset('website/assets/images/resources/about-2-2-about.jpg')}}" alt="eduact">
                    </div><!-- /.about-thumb-one -->
                    <div class="about-two__thumb__two">
                        <img src="{{ asset('website/assets/images/resources/about-2-1-about.jpg')}}" alt="eduact">
                        <div class="about-two__thumb__two-icon"><span class="icon-business"></span></div>
                    </div><!-- /.about-thumb-two -->
                    {{-- <div class="about-two__fact">
                        <div class="about-two__fact__icon"><span class="icon-trophy"></span></div>
                        <div class="about-two__fact__content">
                            <div class="about-two__fact__count">
                                +<span class="count-box">
                                    <span class="count-text" data-stop="230" data-speed="1500"></span>
                                </span>
                            </div><!-- /.fact-one__count -->
                            <h3 class="about-two__fact__title">Awesome Awards</h3><!-- /.fact-one__title -->
                        </div>
                    </div><!-- /.fact-item --> --}}
                    <div class="about-two__thumb__shape1 wow zoomIn" data-wow-delay="300ms">
                        <img src="{{ asset('website/assets/images/shapes/about-2-shape-1.png')}}" alt="eduact">
                    </div><!-- /.about-shape-one -->
                    <div class="about-two__thumb__shape2 wow zoomIn" data-wow-delay="400ms">
                        <img src="{{ asset('website/assets/images/shapes/about-2-shape-2.png')}}" alt="eduact">
                    </div><!-- /.about-shape-two -->
                    <div class="about-two__thumb__shape3 wow zoomIn" data-wow-delay="400ms">
                        <img src="{{ asset('website/assets/images/shapes/about-2-shape-3.png')}}" alt="eduact">
                    </div><!-- /.about-shape-two -->
                    <div class="about-two__thumb__shape4 wow zoomIn" data-wow-delay="400ms">
                        <img src="{{ asset('website/assets/images/shapes/about-2-shape-4.png')}}" alt="eduact">
                    </div><!-- /.about-shape-two -->
                </div><!-- about thumb end -->
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="100ms">
                <div class="about-two__content"><!-- about content start-->
                    <div class="section-title">
                        <h5 class="section-title__tagline">
                            About Us
                            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                                <g clip-path="url(#clip0_324_36194)">
                                    <path d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                                    <path d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                                    <path d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                                    <path d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                                </g>
                            </svg>
                        </h5>
                        <h2 class="about-two__about-box__title">WHY UPADHYE CLASSES ?</h2>
                    </div><!-- section-title -->
                    
                    <div class="about-two__about-box">
                        <div class="about-two__about-box__top">
                            <div class="about-two__about-box__icon">
                                {{-- <span class="icon-logical-thinking"></span> --}}
                                <img src="{{ asset('website/assets/images/about/faculty.png')}}" style="width: 40px" alt="eduact">
                            </div>
                            <h4 class="blog-details__comment__name">Experienced Faculty</h4>
                        </div>
                        <p class="about-two__about-box__text">
                            The Institute holds a highly experienced, qualified, and professional faculty. The faculty is experienced with their respective subjects and is available at the centers for the students and the parents. Parents/students can communicate and /or take guidance from faculty through easy accessibility on the premises. The faculty is well-informed and closely monitors the learning process of students.
                        </p>
                    </div><!-- /.icon-box -->
                    <div class="about-two__about-box">
                        <div class="about-two__about-box__top">
                            <div class="about-two__about-box__icon">
                                {{-- <span class="icon-vision"></span> --}}
                                <img src="{{ asset('website/assets/images/about/book.png')}}" style="width: 40px" alt="eduact">
                            </div>
                            <h4 class="blog-details__comment__name">Excellent Study Material:</h4>
                        </div>
                        <p class="about-two__about-box__text">
                            The provision of well-developed state-of-the-art study material is provided for the best and productive learning for our students. Upadhye classe’s study material is well revised and motivating the students to keep on working hard towards success. 
                        </p>
                    </div><!-- /.icon-box -->
                    <div class="about-two__about-box">
                        <div class="about-two__about-box__top">
                            <div class="about-two__about-box__icon">
                                {{-- <span class="icon-vision"></span> --}}
                                <img src="{{ asset('website/assets/images/about/book.png')}}" style="width: 40px" alt="eduact">

                            </div>
                            <h4 class="blog-details__comment__name"> Scientific Teaching Methodology</h4>
                        </div>
                        <p class="about-two__about-box__text">
                            The institute believes in bringing out the best from our students. Teaching methodology is worked through an in-depth observation of students capabilities and thus bringing out the best in it. We towards getting to know the interests, goals, strengths and weaknesses of the students and put our teaching methodos accordingly.
                        </p>
                    </div><!-- /.icon-box -->
                    <div class="about-two__about-box">
                        <div class="about-two__about-box__top">
                            <div class="about-two__about-box__icon">
                                {{-- <span class="icon-vision"></span> --}}
                                <img src="{{ asset('website/assets/images/about/teaching.png')}}" style="width: 40px" alt="eduact">
                            </div>
                            <h4 class="blog-details__comment__name"> Test System</h4>
                        </div>
                        <p class="about-two__about-box__text">
                            U-test series is a well defined and a systematic method provided for students. It is developed in such a way that the students can access to it easily. The test system is broad and detailed covering the subjects according to comparative exam patterns. Our tests are available offline as well as online  

                        </p>
                    </div><!-- /.icon-box -->
                </div><!-- about content end -->
            </div>
        </div>
    </div>
</section>
<!-- About End -->
@endsection