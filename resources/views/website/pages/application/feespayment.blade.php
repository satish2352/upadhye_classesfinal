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
            <h2 class="page-header__title">Apply Online - Course Information</h2><!-- /.page-title -->
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="index-2.html">Home</a></li>
                <li><span>Apply Online - Course Information</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <!-- Checkout Start -->
    <section class="checkout-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="checkout-page__billing-address">
                        <h2 class="checkout-page__billing-address__title">Apply Online - Course Information</h2>
                        <form class="forms-sample" action="{{ url('add-feespayment') }}" id="regForm" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row bs-gutter-x-20">
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <select class="form-control" aria-label="Default select example" name="edu_course"
                                            id="edu_course">
                                            <option value="" selected>Select Course</option>
                                            <option value="9th to 12th">9th to 12th</option>
                                            <option value="AIIMS">AIIMS</option>
                                            <option value="IIT-JEE (Adv)">IIT-JEE (Adv)</option>
                                            <option value="JEE (Mains)">JEE (Mains)</option>
                                            <option value="MHT-CET">MHT-CET</option>
                                            <option value="NEET ">NEET </option>
                                            <option value="8th to 10th ">8th to 10th </option>
                                            <option value="XI /XII (Science All Subjects )">XI /XII (Science All Subjects )
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <select class="form-control" aria-label="Default select example" name="edu_mode"
                                            id="edu_mode">
                                            <option value="" selected>Select Mode</option>
                                            <option value="New">New Admission</option>
                                            <option value="Registered">Registered Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                                            placeholder="Please Enter Your Full Name" class="form-control">
                                        @if ($errors->has('full_name'))
                                            <span class="red-text"><?php echo $errors->first('full_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                                            placeholder="Please Enter Address" class="form-control">
                                        @if ($errors->has('address'))
                                            <span class="red-text"><?php echo $errors->first('address', ':message'); ?></span>
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
                                            placeholder="Please Enter Your Mobile Number" class="form-control">
                                        @if ($errors->has('mobile_number'))
                                            <span class="red-text">{{ $errors->first('mobile_number') }}</span>
                                        @endif
                                    </div>
                                </div>
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
                                        <input type="text" name="amount" value=""
                                            placeholder="Please Enter Amount" class="form-control">
                                        @if ($errors->has('amount'))
                                            <span class="red-text">{{ $errors->first('amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 py-3">
                                    <div class="">
                                        <input type="text" name="remark" value=""
                                            placeholder="Please Enter Remark" class="form-control">
                                        @if ($errors->has('remark'))
                                            <span class="red-text">{{ $errors->first('remark') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 captcha_set py-2" id="g_recaptcha_response"
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
                            <div class="row py-3">
                                <div class="col-xl-12">
                                    <div class="checkout-page__check-box">
                                        <input type="checkbox" name="skipper4" id="skipper4" >
                                        <label for="skipper4" style="font-size: 15px">I Agree to receive SMS/Call from
                                            Upadhye Classes
                                            I have read all Privacy Policy and Refund Policy, Agree to receive SMS/Call from
                                            Upadhye Classes<span></span></label>
                                    </div>
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
                edu_course: {
                    required: true,
                },
                edu_mode: {
                    required: true,
                },
                address: {
                    required: true,
                },
                mobile_number: {
                    required: true,
                    spcenotallow: true,

                },
                amount: {
                    required: true,
                    spcenotallow: true,

                },
                remark: {
                    required: true,
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
                    required: "Select Branch",
                },
                edu_course: {
                    required: "Select Course",
                },
                edu_mode: {
                    required: "Select Mode",
                },
                address: {
                    required: "Enter Address",
                },
                remark: {
                    required: "Enter Remark",
                },
                mobile_number: {
                    required: "Enter Mobile Number",
                    pattern: "Invalid Mobile Number",
                    remote: "This mobile number already exists.",
                    spcenotallow: "Enter Some Text",
                },
                amount: {
                    required: "Enter Amount",
                    // spcenotallow: "Enter Some Text",
                },
                full_name: {
                    required: "Enter Full Name",
                    spcenotallow: "Enter Some Text",
                },
                email: {
                    required: "Enter Email Id",
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
