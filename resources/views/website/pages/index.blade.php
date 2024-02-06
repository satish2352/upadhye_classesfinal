@extends('website.layout.master')

@section('content')
<style>
       .container-marquee {
    width: 100%;
    height: 10em;
    margin: 2em auto;
    overflow: hidden;
    /* background: #ffffff; */
    position: relative;
}

.slider {
    top: 1em;
    position: relative;
    box-sizing: border-box;
    animation: slider 5s linear infinite;
    list-style-type: none;
    text-align: left;
}

.slider:hover {
    animation-play-state: paused;
}

@keyframes slider {
    0%   { top:   10em }
    100% { top: -14em }
}

.blur .slider {
  	margin: 0;
    padding: 0 1em;
    line-height: 1.5em;
}

.blur:before, .blur::before,
.blur:after,  .blur::after {
    left: 0;
    z-index: 1;
    content: '';
    position: absolute;
    width: 100%; 
    height: 2em;
    /* background-image: linear-gradient(180deg, #FFF, rgba(255,255,255,0)); */
}

.blur:after, .blur::after {
    bottom: 0;
    transform: rotate(180deg);
}

.blur:before, .blur::before {
    top: 0;
}

</style>
    <div class="stricky-header stricked-menu main-menu main-header-two">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <!--Main Slider Start-->
    <section class="main-slider">
        <div class="main-slider__one eduact-owl__carousel owl-carousel"
            data-owl-options='{
                "loop": true,
                "animateOut": "slideOutDown",
                "animateIn": "fadeIn",
                "items": 1,
                "smartSpeed": 1000, 
                "autoplay": true, 
                "autoplayTimeout": 5000, 
                "autoplayHoverPause": true,
                "nav": false,
                "dots": true,
                "margin": 0
            }'>

            @if (empty($data_output_slider))
                <div class="main-slider__item">
                    <div class="item">
                        <div class="container">
                            <div class="row">
                                <h3 class="d-flex justify-content-center" style="color: #fff">No Data Found For Slider</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($data_output_slider as $slider)
                    <div class="item">
                        <div class="main-slider__item">
                            <div class="main-slider__bg"
                                style="background-image: url({{ asset('website/assets/images/shapes/slider-bg-1.jpg') }});">
                            </div>
                            <!-- slider-image-->
                            <div class="main-slider__shape-one"><img
                                    src="{{ asset('website/assets/images/shapes/slider-shape-1.png') }}" alt="eduact" />
                            </div>
                            <!-- slider-shape-1 -->
                            <div class="main-slider__shape-two"><img
                                    src="{{ asset('website/assets/images/shapes/slider-shape-2.png') }}" alt="eduact" />
                            </div>
                            <!-- slider-shape-2 -->
                            <!-- Add other slider content based on your data -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="main-slider__content">
                                            <h2 class="main-slider__title">{{ $slider['rank_no'] }} <br>
                                                <span>Congratulations !</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="main-slider__layer">
                                            <div class="main-slider__layer-thumb eduact-tilt"
                                                data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
                                                <img src="{{ Config::get('DocumentConstant.SLIDER_VIEW') }}{{ $slider['image'] }}"
                                                    alt="{{ strip_tags($slider['rank_no']) }} Image"
                                                    style="padding-right: 60px">
                                                {{-- <h3 class="">(IIT POWAI SELECTION)</h3> --}}
                                            </div>
                                            <svg viewBox="0 0 884 578" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M77.978 55.4516C245.177 -111.529 296.923 154.357 535.599 128.113C909.567 87.0169 938.305 347.546 826.648 525.777C714.974 704.007 550.407 814.987 320.862 731.954C54.1102 635.466 -103.473 236.656 77.978 55.4516Z" />
                                                <path
                                                    d="M77.978 55.4516C245.177 -111.529 296.923 154.357 535.599 128.113C909.567 87.0169 938.305 347.546 826.648 525.777C714.974 704.007 550.407 814.987 320.862 731.954C54.1102 635.466 -103.473 236.656 77.978 55.4516Z" />
                                            </svg>
                                        </div>
                                        <div class="main-slider__shape-three">
                                            <svg viewBox="0 0 152 152" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="76" cy="76" r="63.7419" stroke="#F57005"
                                                    stroke-width="24" />
                                            </svg>
                                        </div><!-- slider-shape-3 -->
                                        <div class="main-slider__shape-four">
                                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="16" cy="16" r="15" stroke="#F1F2FD"
                                                    stroke-width="2" />
                                            </svg>
                                        </div><!-- slider-shape-4 -->
                                        <div class="main-slider__shape-five">
                                            <svg viewBox="0 0 124 101" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M118.712 10.0661C118.712 10.0661 48.8261 -23.0444 10.0927 36.3064C3.19101 46.8818 -5.89196 76.3137 5.86651 93.2798C17.625 110.246 31.9191 95.0447 39.4615 82.9168C47.0161 70.7815 63.3887 39.7207 103.51 21.3862C112.963 17.063 132.273 16.0369 118.712 10.0661Z" />
                                            </svg>
                                        </div><!-- slider-shape-5 -->
                                        <div class="main-slider__shape-six">
                                            <img src="{{ asset('website/assets/images/shapes/slider-shape-6.png') }}"
                                                alt="eduact" />
                                        </div><!-- slider-shape-6 -->
                                        <div class="main-slider__shape-seven">
                                            <img src="{{ asset('website/assets/images/shapes/slider-shape-7.png') }}"
                                                alt="eduact" />
                                        </div><!-- slider-shape-6 -->
                                        <div class="main-slider__shape-eight">
                                            <span class="icon-business"></span>
                                        </div><!-- slider-shape-6 -->
                                        <div class="main-slider__shape-nine">
                                            <img src="{{ asset('website/assets/images/shapes/slider-shape-9.png') }}"
                                                alt="eduact" />
                                        </div><!-- slider-shape-6 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <!-- Main Slider End -->
    <!-- Service Start -->
    <section class="service-two"
        style="background-image: url({{ asset('website/assets/images/shapes/service-bg-2.jpg') }});">
        <div class="container">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="100ms">
                <h5 class="section-title__tagline">
                    Our Service
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
                <h2 class="wow fadeInRight section-title__title ">COURSES OFFERED</h2>
            </div><!-- section-title -->
            <div class="row">

                @if (empty($data_output_courses_offered))
                    <div class="container">
                        <div class="row">
                            <h3 class="d-flex justify-content-center" style="color: #fff">No Data Found Courses Offered</h3>
                        </div>
                    </div>
                @else
                    @foreach ($data_output_courses_offered as $coursesOffered)
                        <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="service-two__item text-center">
                                <div class="service-two__wrapper">
                                    <svg viewBox="0 0 303 117" fill="#F6F6F6" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="151" cy="-129" r="246" />
                                    </svg>
                                    <div class="service-two__icon">
                                        {{-- <span class="icon-education"></span> --}}
                                        <img src="{{ Config::get('DocumentConstant.COURSES_OFFERED_VIEW') }}{{ $coursesOffered['image'] }}"
                                            alt="{{ strip_tags($coursesOffered['title']) }} Image" width="70px"
                                            class="img-fluid" />
                                    </div><!-- /.service-icon -->
                                    <h3 class="service-two__title pricing-one_ellipse">
                                        <a data-id="{{ $coursesOffered['id'] }}"
                                            class="show-btn">{{ $coursesOffered['title'] }}</a>
                                    </h3><!-- /.service-title -->
                                    <p class="service-two__text two__text_ellipse">
                                        {{ strip_tags($coursesOffered['description']) }}</p><!-- /.service-content -->


                                    <a 
                                    {{-- href="{{ url('/course-details') }}"  --}}
                                    class="service-two__rm show-detail-btn"
                                        data-id="{{ $coursesOffered['id'] }}" 
                                      style="cursor: pointer"
                                        >Read More<span
                                            class="icon-caret-right"></span></a>



                                </div>
                            </div><!-- /.service-card-one -->
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <form method="POST" action="{{ url('/course-details') }}" id="showdetailform">
            @csrf
            <input type="hidden" name="show_detail_id" id="show_detail_id" value="">
        </form>
    </section>
    <!-- Service End -->
    <!-- Testimonial Start -->
    <section class="testimonial-three">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="testimonial-three__wrapper">
                        <div class="testimonial-three__carousel eduact-owl__carousel owl-theme owl-carousel"
                            data-owl-options='{
        "items": 1,
        "margin": 0,
        "smartSpeed": 700,
        "loop":true,
        "autoplay": true,
        "nav":true,
        "URLhashListener":true,
        "dots":false,
        "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"]
        }'>
                            <!-- Testimonial Item -->
                            <div class="item" data-hash="item1">
                                <div class="testimonial-three__item">
                                    <div class="testimonial-three__author">
                                        <img src="{{ asset('website/assets/images/resources/testimonial-3-1.jpg') }}"
                                            alt="eduact">
                                    </div><!-- testimonial-author -->

                                </div>
                            </div>
                            <!-- Testimonial Item -->
                            <!-- Testimonial Item -->
                            <div class="item" data-hash="item2">
                                <div class="testimonial-three__item">
                                    <div class="testimonial-three__author">
                                        <img src="{{ asset('website/assets/images/resources/testimonial-3-2.jpg') }}"
                                            alt="eduact">
                                    </div><!-- testimonial-author -->

                                </div>
                            </div>
                            <!-- Testimonial Item -->
                            <!-- Testimonial Item -->
                            <div class="item" data-hash="item3">
                                <div class="testimonial-three__item">
                                    <div class="testimonial-three__author">
                                        <img src="{{ asset('website/assets/images/resources/testimonial-3-3.jpg') }}"
                                            alt="eduact">
                                    </div><!-- testimonial-author -->

                                </div>
                            </div>
                            <!-- Testimonial Item -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <section class="course-details">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="course-details__tabs tabs-box">
                                        <ul class="course-details__tabs__lists tab-buttons list-unstyled">
                                            <!-- Dynamic tabs based on $categories -->
                                            @forelse($categories as $index => $category)
                                                <li data-tab="#category_{{ $category['id'] }}"
                                                    class="tab-btn {{ $index === 0 ? 'active' : '' }}">
                                                    <span>{{ $category['title'] }}</span>
                                                </li>
                                            @empty
                                                No Categories found
                                            @endforelse
                                        </ul><!-- tab-title -->
                                        <div class="tabs-content">
                                            <!-- Dynamic tab content based on $categories -->
                                            @foreach ($categories as $index => $category)
                                                <div class="tab {{ $index === 0 ? 'active' : '' }} fadeInUp animated"
                                                    id="category_{{ $category['id'] }}">
                                                    <section class="team-one marquee-height"
                                                        style="background-image: url({{ asset('website/assets/images/shapes/team-bg-1.png') }});">
                                                        <div class="container">
                                                            <div class="section-title text-center wow fadeInUp"
                                                                data-wow-delay="100ms">
                                                                {{-- <h2 class="section-title__title">{{ $category['title'] }} Results</h2> --}}
                                                            </div><!-- section-title -->
                                                            
                                                            <div class="container-marquee blur">
                                            <ul class="slider">
                                        
                                                @forelse($gallery_data as $key => $item)
                                                    {{-- Check if the item's marquee_tab_id matches the category id --}}
                                                    @if ($item['marquee_tab_id'] == $category['id'])
                                                        <li>
                                                            <p>{{ $item['title'] }}
                                                            <span><img src="{{ asset('website/assets/images/img1.png') }}"></span></p>
                                                        </li>
                                                    @endif
                                                @empty
                                                    <li>
                                                        <p>No Items found for this category</p>
                                                    </li>
                                                @endforelse
                                        
                                            </ul>
                                        </div>
                                        <!--                    <div class="row">-->
                                        <!--                        <?php //$k = 1; ?>-->
                                        <!--                        @forelse($gallery_data as $key => $item)-->
                                                                   
                                        <!--                            @if ($item['marquee_tab_id'] == $category['id'])-->
                                        <!--                                <div class="col-lg-12 col-md-12 wow fadeInUp"-->
                                        <!--                                    data-wow-delay="200ms">-->

                                        <!--                                    <marquee width="100%" direction="up"-->
                                        <!--                                        height="50px" scrolldelay="50"-->
                                        <!--                                        onMouseOver="this.stop()"-->
                                        <!--                                        onMouseOut="this.start()"-->
                                        <!--                                        scrollamount="5">-->

                                        <!--                                        <span style="font-size:18px;">-->
                                        <!--                                            <li>{{ $item['title'] }} <span><img-->
                                        <!--                                                        src="{{ asset('website/assets/images/img1.png') }}"></span>-->
                                        <!--                                            </li><br>-->
                                        <!--                                        </span>-->
                                        <!--                                    </marquee>-->


                                        <!--                                        {{-- <h1 class="card__image toZoom d-block w-100 img-fluid" id="img{{ $key }}" attr="else" loading="lazy">{{ $item['title'] }}</h1> --}}-->



                                        <!--                                </div>-->
                                                            
                                        <!--    @endif-->
                                        <!--@empty-->
                                        <!--    No Items found for this category-->
                                        <!--    @endforelse-->
                                        <!--    <?php //$k++; ?>-->
                                        <!--</div>-->
                                       </section>
                                            </div>
                                            @endforeach
                                        </div><!-- tab-content-category_id -->
       
        </div>
        </div>

    </section><!-- course-details-end -->
    </div>
    </div>

    </div>
    </section>
    <!-- Course End -->




    <!-- Category Start -->
    <section class="category-two" style="background-image: url(assets/images/shapes/category-bg-2.png);">
        <div class="container wow fadeInUp" data-wow-delay="200ms">
            <div class="section-title text-center">
                <h5 class="section-title__tagline">
                    Our Courses
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
                <h2 class="section-title__title">Upcoming courses</h2>
            </div><!-- section-title -->
            <div class="category-two__slider eduact-owl__carousel owl-theme owl-carousel"
                data-owl-options='{
    "items": 4,
    "margin": 1,
    "smartSpeed": 700,
    "loop":true,
    "autoplay": true,
    "nav":false,
    "dots":false,
    "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"],
    "responsive":{
        "0":{
            "items":1
        },
        "670":{
            "items": 2
        },
        "992":{
            "items": 3
        },
        "1200":{
            "items": 4
        }
    }
    }'>

                @if (empty($data_output_upcoming_courses))
                    <div class="container">
                        <div class="row">
                            <h3 class="d-flex justify-content-center" style="color: #fff">No Data Found For Upcoming
                                Courses</h3>
                        </div>
                    </div>
                @else
                    @foreach ($data_output_upcoming_courses as $upcomingCourses)
                        <div class="item">
                            <div class="category-two__item">
                                <div class="category-two__icon">
                                    <span class="icon-portfolio"></span>
                                </div><!-- /.category-icon -->
                                <h3 class="category-two__title"><a   class="service-two__rm show-btn"
                                    data-id="{{ $upcomingCourses['id'] }}">{{ $upcomingCourses['title'] }}</a>
                                </h3><!-- /.category-title -->
                            </div><!-- /.category-card-one -->
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <form method="POST" action="{{ url('/upcoming-course-details') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
    </section>
    <!-- Category End -->
    <!-- Video Start -->
    <section class="video-one">
        <div class="container">
            <div class="video-one__bg"
                style="background-image: url({{ asset('website/assets/images/backgrounds/video-bg-1.jpg') }});">
                <div class="video-one__shape"
                    style="background-image: url({{ asset('website/assets/images/shapes/video-shape-1.png') }});"></div>
                <div class="video-one__shape2"
                    style="background-image: url({{ asset('website/assets/images/shapes/video-shape-2.png') }});"></div>
                <div class="row">
                    <div class="col-lg-6 col-md-7 wow fadeInLeft" data-wow-delay="200ms">
                        <h3 class="video-one__title">REASONS TO CHOOSE UPADHYE CLASSES</h3>
                        <!--<a href="contact.html" class="eduact-btn eduact-btn-second"><span-->
                        <!--        class="eduact-btn__curve"></span>Discover More<i class="icon-arrow"></i></a>-->
                    </div>
                    <div class="col-lg-6 col-md-5 wow fadeInRight" data-wow-delay="200ms">
                        <div class="video-one__btn">
                            <img src="{{ asset('website/assets/images/backgrounds/video-btn-bg-1.png') }}"
                                alt="eduact" />

                            <a href="https://www.youtube.com/embed/v=SR_ZaI1crIY" class="video-popup">
                                <span class="icon-play"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video End -->
    <!-- Team Start -->
    {{-- <section class="team-two" style="background-image: url({{ asset('website/assets/images/shapes/team-bg-2.png')}});">
    <div class="container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay="100ms">
            <h5 class="section-title__tagline">
                Our Team
                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                    <g clip-path="url(#clip0_324_36194)">
                        <path d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                        <path d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                        <path d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                        <path d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                    </g>
                </svg>
            </h5>
            <h2 class="section-title__title">Meet Our Professional Team<br> Members</h2>
        </div><!-- section-title -->
    </div>
</section> --}}
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="blog-two__item">
                        <div class="blog-two__image">
                            <img src="{{ asset('website/assets/images/blog/blog-2-1.jpg') }}" alt="eduact">
                            {{-- <a href="blog-details-right.html"></a> --}}
                        </div><!-- /.blog-image -->
                        <div class="blog-two__content">
                            {{-- <div class="blog-two__top-meta">
                            <div class="blog-two__cats"><a href="blog-list-right.html">Development</a></div><!-- /.blog-cats -->
                            <div class="blog-two__date">26 Mar, 2023</div><!-- /.blog-date -->
                        </div> --}}
                            <h3 class="blog-two__title">
                                <a href="blog-details-right.html">Experienced & Qualified Faculty Team</a>
                            </h3><!-- /.blog-title -->
                            <span class="service-two__text mb-3">
                                Upadhye Classes's faculty team has a vast experience of teaching Lakhs of students who
                                prepared for JEE-Advanced, JEE-Main, KVPY, NTSE etc.
                            </span>
                            {{-- <div class="blog-two__meta mt-3">
                            <div class="blog-two__meta__author">
                                <img src="{{ asset('website/assets/images/blog/author-1.png')}}" alt="eduact" />
                                <a href="blog-list-right.html">Darrell Steward</a>
                                Fronted Developer
                            </div>
                            <a class="blog-two__rm" href="blog-details-right.html"><span class="icon-arrow"></span></a><!-- /.read-more-btn -->
                        </div> --}}
                            <!-- /.blog-meta -->
                        </div><!-- /.blog-content -->
                    </div><!-- /.blog-card-one -->
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="blog-two__item">
                        <div class="blog-two__image">
                            <img src="{{ asset('website/assets/images/blog/blog-2-2.jpg') }}" alt="eduact">
                            {{-- <a href="blog-details.html"></a> --}}
                        </div><!-- /.blog-image -->
                        <div class="blog-two__content">
                            {{-- <div class="blog-two__top-meta">
                            <div class="blog-two__cats"><a href="blog-list.html">Development</a></div><!-- /.blog-cats -->
                            <div class="blog-two__date">26 Mar, 2023</div><!-- /.blog-date -->
                        </div> --}}
                            <h3 class="blog-two__title">
                                <a href="blog-details.html">Academic Performance Analysis</a>
                            </h3><!-- /.blog-title -->
                            <span class="service-two__text mb-3">
                                Students performance analysis is done through their performance in the periodic tests.
                                Students are motivated to perform well in the upcoming tests.
                            </span>
                            {{-- <div class="blog-two__meta">
                            <div class="blog-two__meta__author">
                                <img src="{{ asset('website/assets/images/blog/author-1.png')}}" alt="eduact" />
                                <a href="blog-list.html">Darrell Steward</a>
                                Fronted Developer
                            </div>
                            <a class="blog-two__rm" href="blog-details.html"><span class="icon-arrow"></span></a><!-- /.read-more-btn -->
                        </div><!-- /.blog-meta --> --}}
                        </div><!-- /.blog-content -->
                    </div><!-- /.blog-card-one -->
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="blog-two__item">
                        <div class="blog-two__image">
                            <img src="{{ asset('website/assets/images/blog/blog-2-3.jpg') }}" alt="eduact">
                            {{-- <a href="blog-details-left.html"></a> --}}
                        </div><!-- /.blog-image -->
                        <div class="blog-two__content">
                            {{-- <div class="blog-two__top-meta">
                            <div class="blog-two__cats"><a href="blog-list-left.html">Development</a></div><!-- /.blog-cats -->
                            <div class="blog-two__date">26 Mar, 2023</div><!-- /.blog-date -->
                        </div> --}}
                            <h3 class="blog-two__title">
                                <a href="blog-details-left.html">Structured Course Planning</a>
                            </h3><!-- /.blog-title -->
                            <span class="service-two__text mb-3">
                                Course planning is prepared well in advance for each & every course. The course Planner
                                prepared from this planning is provided to students after joining the courses.
                            </span>
                            {{-- <div class="blog-two__meta">
                            <div class="blog-two__meta__author">
                                <img src="{{ asset('website/assets/images/blog/author-1.png')}}" alt="eduact" />
                                <a href="blog-list-left.html">Darrell Steward</a>
                                Fronted Developer
                            </div>
                            <a class="blog-two__rm" href="blog-details-left.html"><span class="icon-arrow"></span></a><!-- /.read-more-btn -->
                        </div><!-- /.blog-meta --> --}}
                        </div><!-- /.blog-content -->
                    </div><!-- /.blog-card-one -->
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="blog-two__item">
                        <div class="blog-two__image">
                            <img src="{{ asset('website/assets/images/blog/blog-2-4.jpg') }}" alt="eduact">
                            {{-- <a href="blog-details-right.html"></a> --}}
                        </div><!-- /.blog-image -->
                        <div class="blog-two__content">
                            {{-- <div class="blog-two__top-meta">
                            <div class="blog-two__cats"><a href="blog-list-right.html">Development</a></div><!-- /.blog-cats -->
                            <div class="blog-two__date">26 Mar, 2023</div><!-- /.blog-date -->
                        </div> --}}
                            <h3 class="blog-two__title">
                                <a href="blog-details-right.html">Periodic Testing</a>
                            </h3><!-- /.blog-title -->
                            <span class="service-two__text mb-3">
                                Periodic tests are organized to check the preparation of the student & provide it much
                                needed impetus. The tests are conducted on Part Syllabus, Cumulative Syllabus & Full
                                Syllabus basis.
                            </span>
                            {{-- <div class="blog-two__meta">
                            <div class="blog-two__meta__author">
                                <img src="{{ asset('website/assets/images/blog/author-1.png')}}" alt="eduact" />
                                <a href="blog-list-right.html">Darrell Steward</a>
                                Fronted Developer
                            </div>
                            <a class="blog-two__rm" href="blog-details-right.html"><span class="icon-arrow"></span></a><!-- /.read-more-btn -->
                        </div><!-- /.blog-meta --> --}}
                        </div><!-- /.blog-content -->
                    </div><!-- /.blog-card-one -->
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                    <div class="blog-two__item">
                        <div class="blog-two__image">
                            <img src="{{ asset('website/assets/images/blog/blog-2-5.jpg') }}" alt="eduact">
                            {{-- <a href="blog-details.html"></a> --}}
                        </div><!-- /.blog-image -->
                        <div class="blog-two__content">
                            {{-- <div class="blog-two__top-meta">
                            <div class="blog-two__cats"><a href="blog-list.html">Development</a></div><!-- /.blog-cats -->
                            <div class="blog-two__date">26 Mar, 2023</div><!-- /.blog-date -->
                        </div> --}}
                            <h3 class="blog-two__title">
                                <a href="blog-details.html">Study Material (Modules & DPPs)</a>
                            </h3><!-- /.blog-title -->
                            <span class="service-two__text mb-3">
                                Study Material is provided in terms of Sheets, Daily Practice Problems (DPPs) etc. Topics
                                wise Sheets has the theory content about the topic followed by solved, unsolved examples.
                            </span>
                            {{-- <div class="blog-two__meta">
                            <div class="blog-two__meta__author">
                                <img src="{{ asset('website/assets/images/blog/author-1.png')}}" alt="eduact" />
                                <a href="blog-list.html">Darrell Steward</a>
                                Fronted Developer
                            </div>
                            <a class="blog-two__rm" href="blog-details.html"><span class="icon-arrow"></span></a><!-- /.read-more-btn -->
                        </div><!-- /.blog-meta --> --}}
                        </div><!-- /.blog-content -->
                    </div><!-- /.blog-card-one -->
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="600ms">
                    <div class="blog-two__item">
                        <div class="blog-two__image">
                            <img src="{{ asset('website/assets/images/blog/blog-2-6.jpg') }}" alt="eduact">
                            {{-- <a href="blog-details-left.html"></a> --}}
                        </div><!-- /.blog-image -->
                        <div class="blog-two__content">
                            {{-- <div class="blog-two__top-meta">
                            <div class="blog-two__cats"><a href="blog-list-left.html">Development</a></div><!-- /.blog-cats -->
                            <div class="blog-two__date">26 Mar, 2023</div><!-- /.blog-date -->
                        </div> --}}
                            <h3 class="blog-two__title">
                                <a href="blog-details-left.html">Regular Class & Doubt Class</a>
                            </h3><!-- /.blog-title -->
                            <span class="service-two__text mb-3">
                                Regular Classes are conducted as per Time Table which is provided to the students in
                                advance. Students need to take maximum benefit/learning from the regular classes.
                            </span>
                            {{-- <div class="blog-two__meta">
                            <div class="blog-two__meta__author">
                                <img src="{{ asset('website/assets/images/blog/author-1.png')}}" alt="eduact" />
                                <a href="blog-list-left.html">Darrell Steward</a>
                                Fronted Developer
                            </div>
                            <a class="blog-two__rm" href="blog-details-left.html"><span class="icon-arrow"></span></a><!-- /.read-more-btn -->
                        </div><!-- /.blog-meta --> --}}
                        </div><!-- /.blog-content -->
                    </div><!-- /.blog-card-one -->
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <ul class="blog-page__pagination clearfix">
                        <li><a href="blog-list-left.html" class="active">1</a></li>
                        <li><a href="blog-list-right.html">2</a></li>
                        <li class="next"><a href="blog-list.html"><span class="icon-caret-right"></span></a></li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Testimonial Start -->
    <section class="testimonial-two"
        style="background-image: url({{ asset('website/assets/images/shapes/testimonial-bg-2.png') }});">
        <div class="container">
            <div class="section-title text-center">
                <h5 class="section-title__tagline">
                    Testimonial
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
                <h2 class="section-title__title">What Our Student Feedback</h2>
            </div><!-- section-title -->
            <div class="testimonial-two__carousel eduact-owl__carousel owl-with-shadow owl-theme owl-carousel"
                data-owl-options='{
    "items": 3,
    "margin": 30,
    "smartSpeed": 700,
    "loop":true,
    "autoplay": true,
    "center": true,
    "nav":true,
    "dots":false,
    "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"],
    "responsive":{
        "0":{
            "items":1,
            "margin": 0
        },
        "700":{
            "items": 1
        },
        "992":{
            "items": 3
        },
        "1200":{
            "margin": 36,
            "items": 3
        }
    }
    }'>
                <!-- Testimonial Item -->
                @if (empty($data_output_testimonial))
                    <div class="container">
                        <div class="row">
                            <h3 class="d-flex justify-content-center" style="color: #fff">No Data Found For Testimonial
                            </h3>
                        </div>
                    </div>
                @else
                    @foreach ($data_output_testimonial as $testimonial)
                        <div class="testimonial-two__item">
                            <div class="testimonial-two__item-inner"
                                style="background-image: url({{ asset('website/assets/images/shapes/testimonial-shape-2.png') }});">
                                <div class="testimonial-two__ratings">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="testimonial-two__quote">
                                    {{ strip_tags($testimonial['description']) }}
                                </div><!-- testimonial-quote -->
                                <div class="testimonial-two__meta">
                                    <img
                                    src="{{ Config::get('DocumentConstant.TESTIMONIAL_VIEW') }}{{ $testimonial['image'] }}"
                                        alt="eduact">
                                        
                                    <h5 class="testimonial-two__title">{{ strip_tags($testimonial['title']) }}</h5>
                                    <span
                                        class="testimonial-two__designation">{{ strip_tags($testimonial['position']) }}</span>
                                </div><!-- testimonial-meta -->
                                <svg viewBox="0 0 416 249" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_324_36064)">
                                        <path
                                            d="M296.443 526.351C291.626 517.219 286.22 508.4 280.351 499.907C274.064 490.803 267.257 482.07 260.072 473.662C252.166 464.412 243.802 455.551 235.132 447.015C225.525 437.563 215.537 428.493 205.305 419.728C193.907 409.977 182.21 400.591 170.293 391.477C157.025 381.325 143.506 371.508 129.809 361.934C114.574 351.278 99.1373 340.919 83.5681 330.773C66.2815 319.506 48.8344 308.493 31.2774 297.659C11.8453 285.67 -7.71089 273.899 -27.3627 262.269C-49.0253 249.452 -70.8004 236.801 -92.632 224.268C-112.751 212.719 -132.553 200.599 -151.773 187.605C-167.672 176.859 -183.186 165.529 -198.079 153.411C-210.223 143.528 -221.954 133.126 -233.015 122.043C-242.024 113.01 -250.588 103.518 -258.425 93.4561C-264.651 85.4701 -270.424 77.1028 -275.483 68.3262C-279.503 61.3457 -283.079 54.0865 -285.969 46.5676C-288.192 40.7857 -290.021 34.8356 -291.27 28.7606C-292.209 24.2029 -292.822 19.5763 -292.986 14.9289C-293.101 11.7908 -293.016 8.64358 -292.628 5.53246C-292.424 3.91736 -292.165 2.29171 -291.728 0.72597C-291.679 0.529505 -291.617 0.330416 -291.559 0.139576C-291.56 1.6512 -291.422 3.17245 -291.258 4.67452C-290.799 8.90587 -289.976 13.0825 -288.939 17.2111C-287.309 23.703 -285.103 30.0422 -282.479 36.194C-278.927 44.5375 -274.604 52.5471 -269.706 60.1738C-263.507 69.8349 -256.393 78.8972 -248.649 87.3719C-238.942 97.9926 -228.245 107.691 -216.918 116.571C-203.009 127.487 -188.159 137.18 -172.79 145.896C-153.752 156.686 -133.883 165.972 -113.594 174.141C-88.9088 184.08 -63.5671 192.361 -37.9282 199.441C-11.3405 206.779 15.589 212.887 42.7613 217.66C67.4471 221.999 92.326 225.272 117.29 227.514C141.053 229.653 164.9 230.869 188.764 231.226C211.313 231.559 233.873 231.113 256.392 229.925C277.174 228.838 297.929 227.116 318.614 224.801C337.536 222.679 356.4 220.056 375.184 216.945C391.68 214.211 408.11 211.094 424.452 207.59C438.374 204.605 452.242 201.341 466.025 197.777C476.913 194.966 487.745 191.97 498.512 188.749C506.072 186.491 513.591 184.133 521.068 181.624C524.972 180.313 528.87 178.974 532.737 177.541C533.207 177.365 533.677 177.189 534.148 177.014L296.443 526.351Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
            
            @endforeach
            @endif
        </div>
        </div>
        {{-- </div> --}}
    </section>
    <!-- Testimonial End -->

    <!-- Call To Action Start -->
    {{-- <section class="cta-two">
    <div class="container">
        <div class="cta-two__bg" style="background-image: url({{ asset('website/assets/images/shapes/cta-bg-2.jpg')}});">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="200ms">
                    <h3 class="cta-two__title">Subscribe to Our Newsletter<br> for Daily Updates</h3>
                </div>
                <div class="col-lg-6">
                    <div class="cta-two__mail wow fadeInRight" data-wow-delay="200ms">
                        <form class="cta-two__email-box mc-form" data-url="MC_FORM_URL" novalidate="novalidate">
                            <div class="cta-two__email-input-box">
                                <input type="email" placeholder="Email Address" name="EMAIL">
                            </div>
                            <button type="submit" class="eduact-btn"><span class="eduact-btn__curve"></span>Subscribe</button>
                        </form>
                        <div class="mc-form__response"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <!-- Call To Action End -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Find the first tab and content, add "active" class
            var firstTab = document.querySelector('.tab-buttons .tab-btn');
            var firstContent = document.querySelector('.tabs-content .tab');

            if (firstTab && firstContent) {
                firstTab.classList.add('active');
                firstContent.classList.add('active');
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    // <script>
    //     $(document).ready(function() {
    //         // Find the first tab and content, add "active" class
    //         var firstTab = $('.tab-buttons .tab-btn').first();
    //         var firstContent = $('.tabs-content .tab').first();

    //         if (firstTab.length && firstContent.length) {
    //             firstTab.addClass('active');
    //             firstContent.addClass('active');
    //         }
    //     });
    // </script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all tabs and tab content
            const tabs = document.querySelectorAll('.course-details__tabs__lists .tab-btn');
            const tabContents = document.querySelectorAll('.tabs-content .tab');
    
            // Add click event listener to each tab
            tabs.forEach(function (tab, index) {
                tab.addEventListener('click', function () {
                    // Remove 'active' class from all tabs and tab contents
                    tabs.forEach(function (t) {
                        t.classList.remove('active');
                    });
                    tabContents.forEach(function (content) {
                        content.classList.remove('active');
                    });
    
                    // Add 'active' class to the clicked tab and its corresponding content
                    tab.classList.add('active');
                    tabContents[index].classList.add('active');
                });
            });
    
            // Show the content of the first tab by default
            tabs[0].click();
        });
    </script>

@endsection
