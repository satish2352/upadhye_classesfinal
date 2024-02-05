@extends('website.layout.master')

@section('content')
    <?php
    $common_form_data = App\Http\Controllers\Website\IndexController::getCommonFormData();
    ?>

    <div class="stricky-header stricked-menu main-menu main-header-two">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
        <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
        <div class="container text-center">
            <h2 class="page-header__title">Enquiry Form</h2><!-- /.page-title -->
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="index-2.html">Home</a></li>
                <li><span>Enquiry Form</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <!-- Checkout Start -->
    <section class="checkout-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="checkout-page__billing-address">
                        <h2 class="checkout-page__billing-address__title">Enquiry Form</h2>
                        <form class="forms-sample" action="{{ url('add-applicatioform') }}" id="regForm" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row bs-gutter-x-20">
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <select class="form-control" aria-label="Default select example"
                                            name="edu_location_id" id="edu_location_id" required>
                                            <option value="" selected disabled>Select Branch</option>
                                            @foreach ($common_form_data['data_output_location_address'] as $locationaddress)
                                                <option value="{{ $locationaddress['id'] }}"
                                                    {{ old('edu_location_id') == $locationaddress['id'] ? 'selected' : '' }}>
                                                    {{ $locationaddress['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('edu_location_id'))
                                            <span class="red-text">{{ $errors->first('edu_location_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <select class="form-control" aria-label="Default select example" name="edu_board_id"
                                            id="edu_board_id" required>
                                            <option value="" selected disabled>Select Board</option>
                                            @foreach ($common_form_data['data_output_all_board'] as $allboard)
                                                <option value="{{ $allboard['id'] }}"
                                                    {{ old('edu_board_id') == $allboard['id'] ? 'selected' : '' }}>
                                                    {{ $allboard['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('edu_board_id'))
                                            <span class="red-text">{{ $errors->first('edu_board_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <select class="form-control" aria-label="Default select example" name="edu_class_id"
                                            id="edu_class_id" required>
                                            <option value="" selected disabled>Select Class</option>

                                            @foreach ($common_form_data['data_output_all_class'] as $allclass)
                                                <option value="{{ $allclass['id'] }}"
                                                    {{ old('edu_class_id') == $allclass['id'] ? 'selected' : '' }}>
                                                    {{ $allclass['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('edu_class_id'))
                                            <span class="red-text">{{ $errors->first('edu_class_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <select class="form-control"  aria-label="Default select example"
                                            name="edu_course_id" id="edu_course_id" required>
                                            <option value="" selected disabled>Select Course</option>
                                            <option value="Maths">Maths</option>
                                            <option value="English">English</option>
                                        </select>
                                        @if ($errors->has('edu_course_id'))
                                            <span class="red-text">{{ $errors->first('edu_course_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <input type="text" name="full_name" id="full_name"
                                            value="{{ old('full_name') }}" placeholder="Please Enter Your Full Name" class="form-control">
                                        @if ($errors->has('full_name'))
                                            <span class="red-text"><?php echo $errors->first('full_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            placeholder="Please Enter Your Email" class="form-control">
                                        @if ($errors->has('email'))
                                            <span class="red-text">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <input type="text" name="mobile_number" value="{{ old('mobile_number') }}"
                                            placeholder="Please Enter Your Phone" class="form-control">
                                        @if ($errors->has('mobile_number'))
                                            <span class="red-text">{{ $errors->first('mobile_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <input type="text" name="alternative_mobile_number"
                                            id="alternative_mobile_number" value="{{ old('alternative_mobile_number') }}"
                                            placeholder="Please Enter alternative Phone Number" class="form-control">
                                        @if ($errors->has('alternative_mobile_number'))
                                            <span class="red-text">{{ $errors->first('alternative_mobile_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <input type="text" name="address" id="address"
                                            value="{{ old('address') }}" placeholder="Please Enter Your Address" class="form-control">
                                        @if ($errors->has('address'))
                                            <span class="red-text"><?php echo $errors->first('address', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                               <div class="col-md-4 py-3 captcha_set" id="g_recaptcha_response"
                                    style="text-align: -webkit-right;">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <span class="red-text">{{ $errors->first('g-recaptcha-response') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex">
                                <button type="submit" id="submitButton" class="eduact-btn eduact-btn-second"><span
                                        class="eduact-btn__curve"></span>Submit<i class="icon-arrow"></i></button>
                            </div>
                        </form>
                          @if(Session::has('success_message'))
                        <script>
                            alert("{{ Session::get('success_message') }}");
                        </script>
                    @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Checkout End -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {

        $("#regForm").validate({
            errorClass: "error",
            rules: {
                edu_location_id: {
                    required: true,
                },
                edu_board_id: {
                    required: true,
                },
                edu_class_id: {
                    required: true,
                },
                edu_course_id: {
                    required: true,
                },
                address: {
                    required: true,
                },
                mobile_number: {
                    required: true,
                    spcenotallow: true,

                },
                alternative_mobile_number: {
                    required: true,
                    spcenotallow: true,

                },
                full_name: {
                    required: true,
                    spcenotallow: true,
                },
                email: {
                    required: true,
                    email: true,
                },

            },
            messages: {
                edu_location_id: {
                    required: "Please Select Branch",
                },
                edu_board_id: {
                    required: "Please Select Board",
                },
                edu_class_id: {
                    required: "Please Select Class",
                },
                edu_course_id: {
                    required: "Please Select Course",
                },
                address: {
                    required: "Please Enter Address",
                },
                mobile_number: {
                    required: "Please Enter Mobile Number",
                    pattern: "Invalid Mobile Number",
                    remote: "This mobile number already exists.",
                    spcenotallow: "Enter Some Text",
                },
                alternative_mobile_number: {
                    required: "Please Enter Alternative Mobile Number",
                    pattern: "Invalid Mobile Number",
                    remote: "This mobile number already exists.",
                    spcenotallow: "Enter Some Text",
                },
                full_name: {
                    required: "Please Enter Full Name",
                    spcenotallow: "Enter Some Text",
                },
                email: {
                    required: "Please Enter Email Id",
                    spcenotallow: "Enter Some Text",
                },

            },
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            submitHandler: function(form) {
                // Check if reCAPTCHA challenge is completed
                if (grecaptcha.getResponse() === "") {
                    alert("Please complete the reCAPTCHA challenge.");
                } else {
                    // Proceed with form submission
                    form.submit();
                }
            }
        });

        $("input#document_file").hide();

    });

    $.extend($.validator.methods, {
        spcenotallow: function(b, c, d) {
            if (!this.depend(d, c)) return "dependency-mismatch";
            if ("select" === c.nodeName.toLowerCase()) {
                var e = a(c).val();
                return e && e.length > 0
            }
            return this.checkable(c) ? this.getLength(b, c) > 0 : b.trim().length > 0
        }
    });
</script>
@endsection
