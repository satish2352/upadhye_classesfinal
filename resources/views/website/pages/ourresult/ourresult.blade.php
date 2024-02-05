@extends('website.layout.master')

@section('content')
<div class="stricky-header stricked-menu main-menu main-header-two">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
    <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
    <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
    <div class="container text-center">
        <h2 class="page-header__title">Student Result</h2><!-- /.page-title -->
        <ul class="page-header__breadcrumb list-unstyled">
            <li><a href="index-2.html">Home</a></li>
            <li><span>Student Result</span></li>
        </ul><!-- /.page-breadcrumb list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

    <!-- course-details-start -->
    <section class="course-details">
        <div class="container-fluid">
            <div class="section-title wow fadeInUp text-center pt-5" data-wow-delay="100ms">
                <h5 class="section-title__tagline">
                    Result
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
                <h2 class="section-title__title">Student Result</h2>
            </div><!-- section-title -->           
            <div class="row">
                <div class="col-xl-12">
                    <div class="course-details__tabs tabs-box">
                        <ul class="course-details__tabs__lists tab-buttons list-unstyled">
                            <!-- Dynamic tabs based on $categories -->
                            @forelse($categories as $index => $category)
                            <!-- Add the 'active' class to the first tab -->
                            <li data-tab="#category_{{ $category['id'] }}" class="tab-btn {{ $index === 0 ? 'active' : '' }}"><span>{{ $category['title'] }}</span></li>
                        @empty
                            No Categories found
                        @endforelse
                        </ul><!-- tab-title -->
                        <div class="tabs-content">
                            <!-- Dynamic tab content based on $categories -->
                            @foreach($categories as $index => $category)
                            <div class="tab {{ $index === 0 ? 'active' : '' }} fadeInUp animated" id="category_{{ $category['id'] }}">
                                    <section class="team-one" style="background-image: url({{ asset('website/assets/images/shapes/team-bg-1.png') }});">
                                        <div class="container">
                                            <div class="section-title text-center wow fadeInUp" data-wow-delay="100ms">
                                                <h2 class="section-title__title">{{ $category['title'] }} Results</h2>
                                            </div><!-- section-title -->
                                            <div class="row">
                                                <?php $k = 1; ?>
                                                @forelse($gallery_data as $key => $item)
                                                    <!-- Adjust the condition based on your logic -->
                                                    @if ($item['category_id'] == $category['id'])
                                                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                                            <div class="team-one__item">
                                                                <div class="team-one__image">
                                                                    <img class="card__image toZoom d-block w-100 img-fluid"
                                                                         id="img{{ $key }}" attr="else" loading="lazy"
                                                                         src="{{ $item['image'] }}">
                                                                </div><!-- /.team-image -->
                                                                <div class="team-one__content">
                                                                    <h3 class="team-one__title">
                                                                        {{-- <a href="team-details.html">{{ $item['name'] }}</a> --}}
                                                                    </h3><!-- /.team-name -->
                                                                    {{-- <span class="team-one__designation">{{ $item['designation'] }}</span><!-- /.team-designation --> --}}
                                                                </div><!-- /.team-content -->
                                                            </div><!-- /.team-one -->
                                                        </div>
                                                    @endif
                                                @empty
                                                    No Items found for this category
                                                @endforelse
                                                <?php $k++; ?>
                                            </div>
                                        </div>
                                    </section>
                                </div><!-- tab-content-category_id -->
                            @endforeach
                        </div><!-- tab-content -->
                    </div><!-- tabs -->
                </div>
            </div>
        </div>
    </section>
    <!-- course-details-end -->
    
<script>
    document.addEventListener("DOMContentLoaded", function () {
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
//     $(document).ready(function () {
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
