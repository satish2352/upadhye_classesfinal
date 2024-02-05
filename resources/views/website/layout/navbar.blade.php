<body class="custom-cursor">
<?php
    // Assuming you have an instance of the IndexController class
    $controllerInstance = new App\Http\Controllers\Website\IndexController();
    
    // Call the getCommonFormData method to retrieve common form data
    $common_form_data = $controllerInstance->getCommonFormData();
    
    // Access the categories from the common form data
    // $categories = $common_form_data['categories'];
    ?>
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url({{ asset('website/assets/images/favicons/loader.png')}});"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <header class="main-header-two">
            <nav class="main-menu">
                <div class="container">
                    <div class="main-menu__logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('website/assets/images/logo-two.png')}}" width="183" height="48" alt="Eduact">
                        </a>
                    </div><!-- /.main-menu__logo -->
                    <div class="main-menu__nav">
                        <ul class="main-menu__list">
                            <li class="megamenu megamenu-clickable megamenu-clickable--toggler">
                                <a href="{{ route('index') }}">Home</a>
                                {{-- <ul class="">
                                    <li>
                                        <div class="megamenu-popup">
                                            <a href="#" class="megamenu-clickable--close"><span class="icon-close"></span></a><!-- /.megamenu-clickable--close -->
                                            <div class="megamenu-popup__content">
                                                <div class="demos-one">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <div class="demos-one__single">
                                                                    <div class="demos-one__image">
                                                                        <img src="assets/images/home-showcase/popup-menu-1-1.jpg" alt="eduact" width="416" height="431">
                                                                        <div class="demos-one__buttons">
                                                                            <a href="index-2.html" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                Multi Page
                                                                            </a>
                                                                            <a href="index-one-page.html" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                One Page
                                                                            </a>
                                                                        </div>
                                                                        <!-- /.demos-one__buttons -->
                                                                    </div><!-- /.demos-one__image -->
                                                                    <div class="demos-one__text">
                                                                        <h3 class="demos-one__text__title">Home Page 01</h3>
                                                                    </div><!-- /.demos-one__text -->
                                                                </div><!-- /.demos-one__single -->
                                                            </div><!-- /.col-md-6 -->
                                                            <div class="col-md-6 col-lg-4">
                                                                <div class="demos-one__single">
                                                                    <div class="demos-one__image">
                                                                        <img src="assets/images/home-showcase/popup-menu-1-2.jpg" alt="eduact" width="416" height="431">
                                                                        <div class="demos-one__buttons">
                                                                            <a href="index-3.html" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                Multi Page
                                                                            </a>
                                                                            <a href="index-2-one-page.html" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                One Page
                                                                            </a>
                                                                        </div>
                                                                        <!-- /.demos-one__buttons -->
                                                                    </div><!-- /.demos-one__image -->
                                                                    <div class="demos-one__text">
                                                                        <h3 class="demos-one__text__title">Home Page 02</h3>
                                                                    </div><!-- /.demos-one__text -->
                                                                </div><!-- /.demos-one__single -->
                                                            </div><!-- /.col-md-6 -->
                                                            <div class="col-md-6 col-lg-4">
                                                                <div class="demos-one__single">
                                                                    <div class="demos-one__image">
                                                                        <img src="assets/images/home-showcase/popup-menu-1-3.jpg" alt="eduact" width="416" height="431">
                                                                        <div class="demos-one__buttons">
                                                                            <a href="index-4.html" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                Multi Page
                                                                            </a>
                                                                            <a href="index-3-one-page.html" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                One Page
                                                                            </a>
                                                                        </div>
                                                                        <!-- /.demos-one__buttons -->
                                                                    </div><!-- /.demos-one__image -->
                                                                    <div class="demos-one__text">
                                                                        <h3 class="demos-one__text__title">Home Page 03</h3>
                                                                    </div><!-- /.demos-one__text -->
                                                                </div><!-- /.demos-one__single -->
                                                            </div><!-- /.col-md-6 -->
                                                            <div class="col-md-6 col-lg-4">
                                                                <div class="demos-one__single">
                                                                    <div class="demos-one__image">
                                                                        <img src="assets/images/home-showcase/popup-menu-1-4.jpg" alt="eduact" width="416" height="431">
                                                                        <div class="demos-one__buttons">
                                                                            <a href="index-dark.html" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                View Page
                                                                            </a>
                                                                        </div>
                                                                        <!-- /.demos-one__buttons -->
                                                                    </div><!-- /.demos-one__image -->
                                                                    <div class="demos-one__text">
                                                                        <h3 class="demos-one__text__title">Home Page Dark</h3>
                                                                    </div><!-- /.demos-one__text -->
                                                                </div><!-- /.demos-one__single -->
                                                            </div><!-- /.col-md-6 -->
                                                            <div class="col-md-6 col-lg-4">
                                                                <div class="demos-one__single">
                                                                    <div class="demos-one__image">
                                                                        <img src="assets/images/home-showcase/popup-menu-1-5.jpg" alt="eduact" width="416" height="431">
                                                                        <div class="demos-one__buttons">
                                                                            <a href="index-boxed.html" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                View Page
                                                                            </a>
                                                                        </div>
                                                                        <!-- /.demos-one__buttons -->
                                                                    </div><!-- /.demos-one__image -->
                                                                    <div class="demos-one__text">
                                                                        <h3 class="demos-one__text__title">Home Page Boxed</h3>
                                                                    </div><!-- /.demos-one__text -->
                                                                </div><!-- /.demos-one__single -->
                                                            </div><!-- /.col-md-6 -->
                                                            <div class="col-md-6 col-lg-4">
                                                                <div class="demos-one__single">
                                                                    <div class="demos-one__image">
                                                                        <img src="assets/images/home-showcase/popup-menu-1-6.jpg" alt="eduact" width="416" height="431">
                                                                        <div class="demos-one__buttons">
                                                                            <a href="index-rtl.html#googtrans(en%7car)" class="eduact-btn">
                                                                                <span class="eduact-btn__curve"></span>
                                                                                View Page
                                                                            </a>
                                                                        </div>
                                                                        <!-- /.demos-one__buttons -->
                                                                    </div><!-- /.demos-one__image -->
                                                                    <div class="demos-one__text">
                                                                        <h3 class="demos-one__text__title">Home Page RTL</h3>
                                                                    </div><!-- /.demos-one__text -->
                                                                </div><!-- /.demos-one__single -->
                                                            </div><!-- /.col-md-6 -->
                                                        </div><!-- /.row -->
                                                    </div><!-- /.container -->
                                                </div><!-- /.demos-one -->
                                            </div><!-- /.megamenu-popup__content -->
                                        </div><!-- /.megamenu-popup -->
                                    </li>
                                </ul> --}}
                            </li>
                            <li class="dropdown">
                                <a href="#">About Us</a>
                                <ul>
                                    <li><a
                                        href="{{ route('updadhyeclasses') }}"
                                         >WHY UPADHYE CLASSES</a></li>
                                    <li><a href="{{ route('directordesk') }}">DIRECTOR DESK</a></li>
                                    <li><a href="{{route('teachingmethodology')}}">OUR TEACHING Methodology</a></li>
                                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Courses</a>
                                <ul>
                                    <!--<li><a href="{{ route('crashcoursebatch') }}">Crash course Batch</a></li>-->
                                    <!--<li><a href="{{ route('repeatersbatch') }}">Repeaters Batch</a></li>-->
                                    <!--<li><a href="{{ route('revisionbatch') }}">Revision Batch</a></li>-->
                                   
                                    @foreach ($common_form_data['data_output_courses'] as $locationaddress)
                                    <li value="{{ $locationaddress['id'] }}"
                                        {{ old('course_id') == $locationaddress['id'] ? 'selected' : '' }}>
                                        <a href="{{ route('courses-details', ['id' => $locationaddress['id']]) }}">
                                            {{ $locationaddress['service_name'] }}
                                        </a>
                                    </li>
                                @endforeach
                               
                                    <!--<li class="dropdown">-->
                                    <!--    <a href="#">XI Science</a>-->
                                    <!--    <ul class="sub-menu">-->
                                    <!--        <li><a href="{{ route('progressivebatch') }}">Progressive Batch</a></li>-->
                                    <!--        <li><a href="{{ route('intensivebatch') }}">Intensive Batch</a></li>-->
                                    <!--        <li><a href="{{ route('iitjeebatch') }}">IIT / JEE Batch</a></li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    <!--<li class="dropdown">-->
                                    <!--    <a href="#">XII Science</a>-->
                                    <!--    <ul class="sub-menu">-->
                                    <!--        <li><a href="{{ route('progressivebatch-xii') }}">Progressive Batch</a></li>-->
                                    <!--        <li><a href="{{ route('intensivebatch-xii') }}">Intensive Batch</a></li>-->
                                    <!--        <li><a href="{{ route('iitjeebatch-xii') }}">IIT / JEE Batch</a></li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    <!--<li><a href="{{ route('prefoundationbatch') }}">Pre Foundation Batch</a></li>-->
                                </ul>
                            </li>
                            {{-- <li><a href="course.html">Our Result</a></li>
                            <li><a href="{{ route('gallery') }}">Gallery</a></li> --}}
                            <li><a href="{{ route('ourresult') }}">Our Result</a></li>
                            <li class="dropdown">
                                <a href="#">Admission</a>
                                <ul >
                                    
                                    {{-- <li><a href="{{ route('report-incident-crowdsourcing-web') }}">volunteer-citizen-support-web</a></li> --}}
                                    <li><a href="{{ route('applicatioform') }}">Admission Form</a></li>
                                    <li><a href="{{ route('scolarship') }}">Scolarship</a></li>
                                    <li><a href="{{ route('feespayment') }}">Fees Payment</a></li>
                                    <li><a href="{{ route('noticeboard') }}">NoticeBoard  &nbsp;&nbsp;<img src="{{ asset('website/assets/images/img1.png')}}"></a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contactus') }}">Contact</a></li>
                        </ul>
                    </div><!-- /.main-menu__nav -->
                    <div class="main-menu__right">
                        <a href="#" class="main-menu__toggler mobile-nav__toggler">
                            <i class="fa fa-bars"></i>
                        </a><!-- /.mobile menu btn -->
                        <!--<a href="#" class="main-menu__search search-toggler">-->
                        <!--    <i class="icon-Search"></i>-->
                        <!--</a>-->
                        <!-- /.search btn -->
                        {{-- <a href="login.html" class="main-menu__login">
                            <i class="icon-account-1"></i>
                        </a><!-- /.login btn --> --}}
                        <div class="main-menu__info">
                            <span class="icon-Call"></span>
                            <a href="tel:9850511000">98 5051 1 000</a>
                            Call to Questions
                        </div>
                        <!-- /.info -->
                    </div><!-- /.main-menu__right -->
                </div><!-- /.container -->
            </nav>
            <!-- /.main-menu -->
        </header><!-- /.main-header-two -->
