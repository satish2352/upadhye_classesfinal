@extends('website.layout.master')

@section('content')
    <div class="stricky-header stricked-menu main-menu main-header-two">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
        <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
        <div class="container text-center">
            <h2 class="page-header__title">NEET</h2><!-- /.page-title -->
            <ul class="page-header__breadcrumb list-unstyled">
                {{-- <li><a href="index-2.html">Home</a></li> --}}
                {{-- <li><span>Course</span></li> --}}
            </ul><!-- /.page-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <!-- Course Start -->
    <section class="course-three"
        style="background-image: url({{ asset('website/assets/images/shapes/course-bg-3.png') }});" id="course"
        >

        @if (empty($data_output))
        <div class="container">
            <div class="row">
                <h3 class="d-flex justify-content-center" style="color: #fff">No Data Found For Gallery</h3>
            </div>
        </div>
    @else
        @foreach ($data_output as $coursedetails)
        <div class="container course-details__sidebar__item">
            <div class="section-title wow fadeInUp text-center" data-wow-delay="100ms">
                <h2 class="course-details__comment-box__meta pt-2">{{$coursedetails['title']}}</h2>
            </div><!-- section-title -->
        <div class="tab fadeInUp animated" id="overview">
            <div class="course-details__overview">
               <p class="course-details__overview__text">
    <?php echo strip_tags($coursedetails['description']); ?>
</p>

                <img src="{{ Config::get('DocumentConstant.COURSES_OFFERED_VIEW') }}{{ $coursedetails['image'] }}"
                alt="{{ strip_tags($coursedetails['title']) }} Image" width="70px"
                class="img-fluid" />
                {{-- <h3 class="neet_title">Upadhye Test Series:</h3>
                <ul class="list-unstyled course-details__overview__lists">
                    <li><span class="icon-check"></span>Test Series Starting Date: 30th September, 2023</li>
                    <li><span class="icon-check"></span>Test Duration: 3:20 Hrs.</li>
                    <li><span class="icon-check"></span>Mode Of Test: Online</li>
                    <li><span class="icon-check"></span>Medium of Test: English</li>
                    <li><span class="icon-check"></span>Course Fee: Rs. 1499/- Only</li>
                </ul> --}}
            </div>
        </div><!-- tab-content-overview -->
        </div>
        @endforeach
        @endif


    </section>
    <!-- Course End -->
@endsection
