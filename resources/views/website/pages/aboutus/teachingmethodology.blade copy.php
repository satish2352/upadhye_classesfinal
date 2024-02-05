@extends('website.layout.master')

@section('content')
<div class="stricky-header stricked-menu main-menu main-header-two">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
    <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
    <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
    <div class="container text-center">
        <h2 class="page-header__title">Teaching Methodology</h2><!-- /.page-title -->
        <ul class="page-header__breadcrumb list-unstyled">
            <li><a href="index-2.html">Home</a></li>
            <li><span>Teaching Methodology</span></li>
        </ul><!-- /.page-breadcrumb list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->
<!-- Pricing Start -->
<section class="pricing-one" 
{{-- style="background-image: url({{ asset('website/assets/images/shapes/pricing-bg.jpg')}});" --}}
>
    <div class="container">
        <div class="section-title  text-center">
            <h5 class="section-title__tagline">
                Our Pricing Plan
                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                    <g clip-path="url(#clip0_324_36194)">
                        <path d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                        <path d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                        <path d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                        <path d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                    </g>
                </svg>
            </h5>
            <h2 class="section-title__title">Teaching Methodology</h2>
        </div><!-- section-title -->
        <div class="pricing-one__main-tab-box tabs-box">
            {{-- <ul class="tab-buttons list-unstyled">
                <li data-tab="#monthly" class="tab-btn active-btn"><span>Monthly</span></li>
                <li data-tab="#yearly" class="tab-btn"><span>Yearly</span></li>
            </ul><!-- pricing-tab --> --}}
            {{-- <div class="tabs-content">
                <!--month-tab-start-->
                <div class="tab active-tab" id="monthly"> --}}
                    <div class="row">
                        <!--pricing-column-start-->
                        <div class="col-lg-4 col-md-6 fadeInUp animated " data-wow-delay="200ms">
                            <!--pricing-item-start-->
                            <div class="pricing-one__item card_height">
                                <svg viewBox="0 0 416 173" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="207.5" cy="-81.5" r="254.5" />
                                </svg><!--pricing-svg-->
                                <div class="pricing-one__item__name">Concept Building
                                </div><!--pricing-name-->
                                
                                <h3 class="pricing-one__item__price"> <img src="{{ asset('website/assets/images/about/doubt.png') }}" class="img-fluid" width="70px" alt="eduact"></h3><!--pricing-item-price-->
                                {{-- <h5 class="pricing-one__item__list-title">Batch-wise classrooms have limited students. This helps the teachers to deliver the concepts of ongoing topics to students. The interaction-like asking questions/doubts-between students and teachers becomes feasible. The teachers can have a close monitor over the students.</h5> --}}
                                <!--pricing-item-list-title-->
                                <ul class="pricing-one__item__list">
                                    <li>Batch-wise classrooms have limited students. This helps the teachers to deliver the concepts of ongoing topics to students. The interaction-like asking questions/doubts-between students and teachers becomes feasible. The teachers can have a close monitor over the students.</li>
                                    {{-- <li><span class="fa fa-check-circle"></span>Interview Training</li>
                                    <li><span class="fa fa-check-circle"></span>Guarantee Approval</li>
                                    <li><span class="fa fa-check-circle"></span>Documents Submission</li> --}}
                                </ul>
                                <!--pricing-item-list-->
                                {{-- <div class="pricing-one__item__border"></div><!--pricing-divider-->
                                <a href="contact.html" class="eduact-btn"><span class="eduact-btn__curve"></span>Apply Now</a><!-- /.btn --> --}}
                            </div>
                            <!--pricing-item-end-->
                        </div>
                        <!--pricing-column-end-->
                        <!--pricing-column-start-->
                        <div class="col-lg-4 col-md-6 fadeInUp animated " data-wow-delay="300ms">
                            <!--pricing-item-start-->
                            <div class="pricing-one__item active card_height">
                                <svg viewBox="0 0 416 173" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="207.5" cy="-81.5" r="254.5" />
                                </svg><!--pricing-svg-->
                                <div class="pricing-one__item__name">Upadhye Classes Booklets</div><!--pricing-name-->
                                <h3 class="pricing-one__item__price"> <img src="{{ asset('website/assets/images/about/booklet.png') }}" class="img-fluid" width="70px" alt="eduact"></h3><!--pricing-item-price-->
                                {{-- <h5 class="pricing-one__item__list-title">All Services include:</h5> --}}
                                <!--pricing-item-list-title-->
                                <ul class="pricing-one__item__list">
                                    <li>Subject-wise and topic-wise booklets are provided. This includes the precise & syllabus material specially designed for the productive learning of a student.
                                    </li>
                                  
                                </ul>
                                <!--pricing-item-list-->
                                {{-- <div class="pricing-one__item__border"></div><!--pricing-divider-->
                                <a href="contact.html" class="eduact-btn"><span class="eduact-btn__curve"></span>Apply Now</a><!-- /.btn --> --}}
                            </div>
                            <!--pricing-item-end-->
                        </div>
                        <!--pricing-column-end-->
                        <!--pricing-column-start-->
                        <div class="col-lg-4 col-md-6 fadeInUp animated " data-wow-delay="400ms">
                            <!--pricing-item-start-->
                            <div class="pricing-one__item card_height">
                                <svg viewBox="0 0 416 173" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="207.5" cy="-81.5" r="254.5" />
                                </svg><!--pricing-svg-->
                                <div class="pricing-one__item__name">Lecture Duration</div><!--pricing-name-->
                                <h3 class="pricing-one__item__price"> <img src="{{ asset('website/assets/images/about/wall-clock.png') }}" class="img-fluid" width="70px" alt="eduact"></h3><!--pricing-item-price-->
                                {{-- <h5 class="pricing-one__item__list-title">All Services include:</h5> --}}
                                <!--pricing-item-list-title-->
                                <ul class="pricing-one__item__list">
                                    <li>Lectures durations are designed as 90 minutes per subject per day. This is performed keeping in mind the JEE & NEET syllabus. Lectures are effective with syllabus referred to State & National board along with preparation of competitive exams.
                                    </li>
                                </ul>
                                <!--pricing-item-list-->
                                {{-- <div class="pricing-one__item__border"></div><!--pricing-divider-->
                                <a href="contact.html" class="eduact-btn"><span class="eduact-btn__curve"></span>Apply Now</a><!-- /.btn --> --}}
                            </div>
                            <!--pricing-item-end-->
                        </div>
                        <!--pricing-column-end-->
                    </div>
                {{-- </div> --}}
                <!--month-tab-end-->
                <!--month-tab-start-->
                {{-- <div class="tab" id="yearly"> --}}
                    <div class="row">
                        <!--pricing-column-start-->
                        <div class="col-lg-4 col-md-6 fadeInUp animated " data-wow-delay="200ms">
                            <!--pricing-item-start-->
                            <div class="pricing-one__item card_height">
                                <svg viewBox="0 0 416 173" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="207.5" cy="-81.5" r="254.5" />
                                </svg><!--pricing-svg-->
                                <div class="pricing-one__item__name pricing-one_ellipse">Worksheets and Question banks
                                </div><!--pricing-name-->
                                <h3 class="pricing-one__item__price"> <img src="{{ asset('website/assets/images/about/doubt.png') }}" class="img-fluid" width="70px" alt="eduact"></h3><!--pricing-item-price-->
                                {{-- <h5 class="pricing-one__item__list-title">All Services include:</h5> --}}
                                <!--pricing-item-list-title-->
                                <ul class="pricing-one__item__list">
                                    <li>In addition to our study material, worksheets that include researched DPPs (Daily Pratice Papers), in-lecture work sheets personally managed by our esteemed faculty & additional lecture-wise homework are provided.
                                    </li>

                                </ul>
                                <!--pricing-item-list-->
                                {{-- <div class="pricing-one__item__border"></div><!--pricing-divider-->
                                <a href="contact.html" class="eduact-btn"><span class="eduact-btn__curve"></span>Apply Now</a><!-- /.btn --> --}}
                            </div>
                            <!--pricing-item-end-->
                        </div>
                        <!--pricing-column-end-->
                        <!--pricing-column-start-->
                        <div class="col-lg-4 col-md-6 fadeInUp animated " data-wow-delay="300ms">
                            <!--pricing-item-start-->
                            <div class="pricing-one__item card_height">
                                <svg viewBox="0 0 416 173" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="207.5" cy="-81.5" r="254.5" />
                                </svg><!--pricing-svg-->
                                <div class="pricing-one__item__name">U-Test series</div><!--pricing-name-->
                                <h3 class="pricing-one__item__price"> <img src="{{ asset('website/assets/images/about/doubt.png') }}" class="img-fluid" width="70px" alt="eduact"></h3><!--pricing-item-price-->
                                {{-- <h5 class="pricing-one__item__list-title">All Services include:</h5> --}}
                                <!--pricing-item-list-title-->
                                <ul class="pricing-one__item__list">
                                    <li>TA broadened the system of tests which includes chapter-wise, cumulative & full-length series of tests conducted. These are conducted both offline and online in a systematic approach for students. Tests and model solutions are provided after the score announcement. Following the score, the questions are tracked and discussed with students in lectures by respective.
                                    </li>
                                </ul>
                                <!--pricing-item-list-->
                                {{-- <div class="pricing-one__item__border"></div><!--pricing-divider-->
                                <a href="contact.html" class="eduact-btn"><span class="eduact-btn__curve"></span>Apply Now</a><!-- /.btn --> --}}
                            </div>
                            <!--pricing-item-end-->
                        </div>
                        <!--pricing-column-end-->
                        <!--pricing-column-start-->
                        <div class="col-lg-4 col-md-6 fadeInUp animated " data-wow-delay="400ms">
                            <!--pricing-item-start-->
                            <div class="pricing-one__item card_height">
                                <svg viewBox="0 0 416 173" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="207.5" cy="-81.5" r="254.5" />
                                </svg><!--pricing-svg-->
                                <div class="pricing-one__item__name">Difficulty solving sessions
                                </div><!--pricing-name-->
                                <h3 class="pricing-one__item__price"> <img src="{{ asset('website/assets/images/about/doubt.png') }}" class="img-fluid" width="70px" alt="eduact"></h3><!--pricing-item-price-->
                                {{-- <h5 class="pricing-one__item__list-title">All Services include:</h5> --}}
                                <!--pricing-item-list-title-->
                                <ul class="pricing-one__item__list">
                                    <li>Every subject holds difficulty-solving sessions simultaneously with ongoing lectures. The faculty of respective subjects monitor the student’s doubts and difficulties and arrange difficulty-solving sessions regularly to enhance and strengthen concepts for students.</li>
                                   
                                </ul>
                                <!--pricing-item-list-->
                                {{-- <div class="pricing-one__item__border"></div><!--pricing-divider-->
                                <a href="contact.html" class="eduact-btn"><span class="eduact-btn__curve"></span>Apply Now</a><!-- /.btn --> --}}
                            </div>
                            <!--pricing-item-end-->
                        </div>
                        <!--pricing-column-end-->
                    </div>

                    <div class="row">
                        <!--pricing-column-start-->
                        <div class="col-lg-4 col-md-6 fadeInUp animated " data-wow-delay="200ms">
                            <!--pricing-item-start-->
                            <div class="pricing-one__item card_height">
                                <svg viewBox="0 0 416 173" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="207.5" cy="-81.5" r="254.5" />
                                </svg><!--pricing-svg-->
                                <div class="pricing-one__item__name pricing-one_ellipse">Teaching methodology subject to COVID-19 guidelines
                                </div><!--pricing-name-->
                                <h3 class="pricing-one__item__price"> <img src="{{ asset('website/assets/images/about/doubt.png') }}" class="img-fluid" width="70px" alt="eduact"></h3><!--pricing-item-price-->
                                {{-- <h5 class="pricing-one__item__list-title">All Services include:</h5> --}}
                                <!--pricing-item-list-title-->
                                <ul class="pricing-one__item__list">
                                    <li>At Upadhye classes strictly abide by the Government rules and regulations concerning COVID-19 situations. This said, if and when the GR requires the institute to conduct online classes, Upadhye Classes is fully equipped with full proof system to conduct online classes and test series with a dedicated faculty.

                                    </li>

                                </ul>
                                <!--pricing-item-list-->
                                {{-- <div class="pricing-one__item__border"></div><!--pricing-divider-->
                                <a href="contact.html" class="eduact-btn"><span class="eduact-btn__curve"></span>Apply Now</a><!-- /.btn --> --}}
                            </div>
                            <!--pricing-item-end-->
                        </div>
                    </div>
                {{-- </div> --}}
                <!--month-tab-end-->
            </div>
        </div>
    </div>
</section>
<!-- Pricing Start -->
@endsection