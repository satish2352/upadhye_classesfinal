@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title"> Upcoming Courses
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-upcoming-courses') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Upcoming Courses </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('add-upcoming-courses') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="title" id="title"
                                                placeholder="Enter the Title" name="title" value="{{ old('title') }}">
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
                                                value="{{ old('start_date') }}">
                                            @if ($errors->has('start_date'))
                                                <span class="red-text"><?php echo $errors->first('start_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="duration">Test Mode</label>&nbsp<span class="red-text">*</span>
                                            <div class="checkout-page__input-box">
                                                <select class="form-control" aria-label="Default select example"
                                                    name="test_mode" id="test_mode">
                                                    <option value="" selected>Select Mode</option>
                                                    <option value="Online">Online</option>
                                                    <option value="Offline">Offline</option>
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
                                                <select class="form-control" aria-label="Default select example"
                                                    name="test_medium" id="test_medium">
                                                    <option value="" selected>Select Mode</option>
                                                    <option value="English">English</option>
                                                    <option value="Marathi">Marathi</option>
                                                    <option value="Hindi">Hindi</option>
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
                                                value="{{ old('duration') }}">
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
                                                value="{{ old('course_fess') }}">
                                            @if ($errors->has('course_fess'))
                                                <span class="red-text"><?php echo $errors->first('course_fess', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group" id="summernote_id">
                                            <label for="description">Description <span class="red-text">*</span></label>
                                            <textarea class="form-control" name="description" id="description" placeholder="Enter Page Content">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="red-text">{{ $errors->first('description') }}</span>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
