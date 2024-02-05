@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Upcoming Courses
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-upcoming-courses') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update  Upcoming Courses</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-upcoming-courses') }}" method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="title" id="title"
                                                placeholder="Enter the Title" name="title"  value="@if (old('title')) {{ old('title') }}@else{{ $editData->title }} @endif"">
                                            @if ($errors->has('title'))
                                                <span class="red-text"><?php echo $errors->first('title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>&nbsp<span class="red-text">*</span>
                                            <input type='date' class="form-control mb-2" name="start_date"
                                                id="start_date" placeholder="Enter the start_date" name="start_date"
                                                value="@if (old('start_date')) {{ old('start_date') }}@else{{ $editData->start_date }} @endif">
                                            @if ($errors->has('start_date'))
                                                <span class="red-text"><?php echo $errors->first('start_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="duration">Test Mode</label>&nbsp<span class="red-text">*</span>
                                            <div class="checkout-page__input-box">
                                                <select class="form-control" aria-label="Default select example" name="test_mode" id="test_mode">
                                                    <option value="" selected>Select Mode</option>
                                                    <option value="Online" @if(old('test_mode') == 'Online') selected @elseif($editData->test_mode == 'Online') selected @endif>Online</option>
                                                    <option value="Offline" @if(old('test_mode') == 'Offline') selected @elseif($editData->test_mode == 'Offline') selected @endif>Offline</option>
                                                </select>
                                                
                                                @if ($errors->has('test_mode'))
                                                    <span class="red-text"><?php echo $errors->first('test_mode', ':message'); ?></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="duration">Test medium</label>&nbsp<span class="red-text">*</span>
                                            <div class="checkout-page__input-box">
                                                <select class="form-control" aria-label="Default select example" name="test_medium" id="test_medium">
                                                    <option value="" selected>Select Mode</option>
                                                    <option value="English" @if(old('test_medium') == 'English') selected @elseif($editData->test_medium == 'English') selected @endif>English</option>
                                                    <option value="Marathi" @if(old('test_medium') == 'Marathi') selected @elseif($editData->test_medium == 'Marathi') selected @endif>Marathi</option>
                                                    <option value="Hindi" @if(old('test_medium') == 'Hindi') selected @elseif($editData->test_medium == 'Hindi') selected @endif>Hindi</option>
                                                </select>
                                                
                                                @if ($errors->has('test_medium'))
                                                    <span class="red-text"><?php echo $errors->first('test_medium', ':message'); ?></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="duration">Duration</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="duration" id="duration"
                                                placeholder="Enter the duration" name="duration"
                                                value="@if (old('duration')) {{ old('duration') }}@else{{ $editData->duration }} @endif">
                                            @if ($errors->has('duration'))
                                                <span class="red-text"><?php echo $errors->first('duration', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="course_fess">Course Fess</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="course_fess" id="course_fess"
                                                placeholder="Enter the course_fess" name="course_fess"
                                                value="@if (old('course_fess')) {{ old('course_fess') }}@else{{ $editData->course_fess }} @endif">
                                            @if ($errors->has('course_fess'))
                                                <span class="red-text"><?php echo $errors->first('course_fess', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group" id="summernote_id">
                                            <label for="english_description">Description</label>&nbsp<span
                                                class="red-text">*</span>
                                                <span class="summernote1">
                                            <textarea class="form-control" name="description" id="description" placeholder="Enter the Description">
                                             @if (old('description')){{ old('description') }}@else{{ $editData->description }}@endif 
                                        </textarea>
                                                </span>
                                            @if ($errors->has('description'))
                                                <span class="red-text"><?php echo $errors->first('description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton"
                                            {{-- disabled --}}>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-upcoming-courses') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $editData->id }}" placeholder="">

                                {{-- <input type="text" name="currentMarathiImage" id="currentMarathiImage"
                                    class="form-control" value="" placeholder=""> --}}



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Make sure you have jQuery and jquery.validate.js included before this script -->
        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const title = $('#title').val();
                }
                // Call the checkFormValidity function on input change
                $('input, textarea').on('input change', checkFormValidity);
                $.validator.addMethod("spcenotallow", function(value, element) {
                    if ("select" === element.nodeName.toLowerCase()) {
                        var e = $(element).val();
                        return e && e.length > 0;
                    }
                    return this.checkable(element) ? this.getLength(value, element) > 0 : value.trim().length >
                        0;
                }, "Enter Some Text");
                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        title: {
                            required: true,
                            spcenotallow: true,
                        },
                        description: {
                            required: true,
                            spcenotallow: true,
                        },
                        start_date: {
                            required: true,
                        },
                        duration: {
                            required: true,
                            spcenotallow: true,
                        },
                        test_mode: {
                            required: true,
                        },
                        test_medium: {
                            required: true,
                        },
                        course_fess: {
                            required: true,
                            spcenotallow: true,
                        },
                    },
                    messages: {
                        title: {
                            required: "Please enter the Title.",
                            spcenotallow: "Enter Some Text",
                        },
                        description: {
                            required: "Please enter the Description.",
                            spcenotallow: "Enter Some Text",
                        },
                        start_date: {
                            required: "Please enter the Start Date.",
                        },
                        duration: {
                            required: "Please enter the Duration.",
                            spcenotallow: "Enter Some Time",
                        },
                        test_mode: {
                            required: "Please enter the Duration.",
                        },
                        test_medium: {
                            required: "Please enter the Duration.",
                        },
                        course_fess: {
                            required: "Please enter the Duration.",
                            spcenotallow: "Enter Some Amount",
                        },
                    },
                });
            });
        </script>       
    @endsection
