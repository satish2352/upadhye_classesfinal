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
                        <a href="{{ route('/') }}">
                            <img src="{{ asset('website/assets/images/logo-two.png')}}" width="183" height="48" alt="Eduact">
                        </a>
                    </div><!-- /.main-menu__logo -->
                    <div class="main-menu__nav">
                        <ul class="main-menu__list">
                            <li>
                                <a href="{{url('/')}}" style="cursor: pointer">Home</a>
                                
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
