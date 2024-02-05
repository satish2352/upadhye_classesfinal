@extends('website.layout.master')

@section('content')
    <div class="stricky-header stricked-menu main-menu main-header-two">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
        <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
        <div class="container text-center">
            <h2 class="page-header__title">Gallery</h2><!-- /.page-title -->
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="index-2.html">Home</a></li>
                <li><span>Gallery</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <!-- gallery-start -->
    <section class="gallery-page">
        <div class="container">
            <div class="row">
                <!-- gallery-item-start -->
                @if (empty($data_output))
                <div class="container">
                    <div class="row">
                        <h3 class="d-flex justify-content-center" style="color: #fff">No Data Found For Gallery</h3>
                    </div>
                </div>
            @else
                @foreach ($data_output as $gallery)
                <div class="col-lg-3 col-md-6">
                    <div class="gallery-page__single">
                        <img src="{{ Config::get('DocumentConstant.GALLERY_VIEW') }}{{ $gallery['image'] }}" alt="eduact">
                        <div class="gallery-page__icon">
                            <a class="img-popup" href="{{ Config::get('DocumentConstant.GALLERY_VIEW') }}{{ $gallery['image'] }}"></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- gallery-item-end -->
            </div>
        </div>
    </section>
    <!-- gallery-end-->
@endsection
