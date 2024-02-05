@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">Course Details
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-course-details') }}">Courses</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Course Details </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('add-course-details') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                 <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="Solution">Courses:</label> &nbsp<span class="red-text">*</span>
                                            <select  class="form-control mb-2" name="course_id" id="course_id">
                                            <option value="" default>Select Courses</option>
                                                @foreach($data as $courses)
                                                <option value="{{ $courses->id }}">{{ $courses->service_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('course_id'))
                                            <span class="red-text">
                                                <?php echo $errors->first('course_id', ':message'); ?>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="courses_type">Course Type</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="courses_type" id="courses_type"
                                                placeholder="Enter the Course Type"
                                                value="{{ old('courses_type') }}">
                                            @if ($errors->has('courses_type'))
                                                <span class="red-text"><?php echo $errors->first('courses_type', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group" id="summernote_id">
                                            <label for="admission_procedure">Admission Procedure <span class="red-text">*</span></label>
                                            <textarea class="form-control" name="admission_procedure" id="description" placeholder="Enter Short Content">{{ old('admission_procedure') }}</textarea>
                                            @if ($errors->has('admission_procedure'))
                                                <span class="red-text">{{ $errors->first('admission_procedure') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group" id="summernote_id1">
                                            <label for="eligibility">Eligibility <span class="red-text">*</span></label>
                                            <textarea class="form-control" name="eligibility" id="description1" placeholder="Enter Long Content">{{ old('eligibility') }}</textarea>
                                            @if ($errors->has('eligibility'))
                                                <span class="red-text">{{ $errors->first('eligibility') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="courses_duration">Courses Duration</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="courses_duration" id="courses_duration"
                                                placeholder="Enter the Courses Duration"
                                                value="{{ old('courses_duration') }}">
                                            @if ($errors->has('courses_duration'))
                                                <span class="red-text"><?php echo $errors->first('courses_duration', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton"  >
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-course-details') }}"
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
                    const courses_type = $('#courses_type').val();
                    const courses_duration = $('#courses_duration').val();
                    // const description = $('#description textarea').val();
                                       
                }
                
                // Custom validation method to check file extension
                $.validator.addMethod("fileExtension", function(value, element, param) {
                    // Get the file extension
                    const extension = value.split('.').pop().toLowerCase();
                    return $.inArray(extension, param) !== -1;
                }, "Invalid file extension.");

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
                        courses_type: {
                            required: true,
                            spcenotallow: true,
                        },
                        admission_procedure: {
                            required: true,
                        },
                        // description1: {
                        //     required: true,
                        // },
                    },
                    messages: {
                        courses_type: {
                            required: "Please enter the Course Type.",
                            spcenotallow: "Enter Some Course Type",
                        },
                        admission_procedure: {
                            required: "Please Enter the Admission Procedure",
                        },
                        // description1: {
                        //     required: "Please Enter the Eligibility",
                        // },
                    },
                });
            });
        </script>
    @endsection
