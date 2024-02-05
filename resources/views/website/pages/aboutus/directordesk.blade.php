@extends('website.layout.master')

@section('content')
    <div class="stricky-header stricked-menu main-menu main-header-two">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

    
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
        <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
        <div class="container text-center">
            <h2 class="page-header__title">Director DESK</h2><!-- /.page-title -->
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="index-2.html">Home</a></li>
                <li><span>Director DESK</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <!-- team-details-start -->
    <section class="team-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 wow fadeInUp animated" data-wow-delay="300ms">
                    <div class="team-details__image">
                        <img src="{{ asset('website/assets/images/team/team-details.jpg') }}" alt="eduact">
                        <div class="team-details__image__bg-shape"><img src="{{ asset('website/assets/images/shapes/team-details-shape-bg.png')}}"
                                alt="eduact"></div>
                        <div class="team-details__image__shape-bottom"><img
                                src="{{ asset('website/assets/images/shapes/team-details-shape-1.png')}}" alt="eduact"></div>
                        <div class="team-details__image__svg-shape">
                            <svg class="team-details__image__svg-shape__one" viewBox="0 0 69 80"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M68.9456 39.7448L0.113281 0V79.4895L68.9456 39.7448Z" />
                            </svg>
                            <svg class="team-details__image__svg-shape__two" viewBox="0 0 135 157"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 78.2921L135 156.287V0.286804L0 78.2921Z" />
                            </svg>
                        </div>
                    </div><!-- /.team-image -->
                </div>
                <div class="col-lg-7 wow fadeInUp animated" data-wow-delay="400ms">
                    <div class="team-details__content">
                        <h3 class="team-details__title">Dear students/ Parents,</h3><!-- /.team-name -->
                        {{-- <span class="team-details__designation">UI/UX Designer</span><!-- /.team-designation --> --}}
                        <p class="team-details__text">
                            A good student can become a good examine! How to make him a good examine? Being in education
                            since 1985, we have understood this very concept. Students keep on studying seriously throughout
                            the year and get ready for the examinations i.e. for the theory and entrance examinations like
                            JEE- Mains, IIT-JEE, Biotechnology, etc. Thus it becomes very necessary to make them study,
                            conduct a large number of tests, evaluate them, discuss the paper immediately, let students
                            understand their shortcomings/faults, clear the concepts, repeat the tests, build their
                            confidence, and so on.
                        </p><!-- /.team-text -->
                        <p class="team-details__text">

                            The complete concept of our education institute is to practice discipline, determination, and
                            devotion in the process of achieving student’s goals. With over 35 years of experience leading
                            to factors like - improved facilities for learning, the revised methodologies for pupil
                            services, research and change respective of state and national educational spectrum, and most
                            importantly our work ethic sets us apart in the education sector. We strive and keep up to do so
                            keeping in mind that our gems-our students- are molded for the betterment of their future. We
                            work with the principle of working towards excellence and success.

                            We believe in teaching from the book as well as from our heart.


                        </p><!-- /.team-text -->
                        {{-- <div class="team-details__progress">
                            <h4 class="team-details__progress__title">UI / UX Design</h4>
                            <div class="team-details__progress__bar">
                                <div class="team-details__progress__inner count-bar" data-percent="80%">
                                    <div class="team-details__progress__number count-text">80%</div>
                                </div>
                            </div>
                        </div><!-- /.skills-item -->
                        <div class="team-details__social">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        </div><!-- /.team-social --> --}}
                        {{-- <a href="contact.html" class="eduact-btn eduact-btn-second"><span
                                class="eduact-btn__curve"></span>Get In Touch<i class="icon-arrow"></i></a> --}}
                    </div><!-- /.team-details-content -->
                </div>
            </div>
        </div>
    </section>
    <!-- team-details-end-->
@endsection
