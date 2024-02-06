@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Edit Course Details
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-course-details') }}">Courses</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Course Details </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-course-details') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="Solution">Courses:</label> &nbsp<span class="red-text">*</span>
                                            <select  class="form-control mb-2" name="course_id" id="course_id"> --}}
                                            {{-- <option value="" default>Select Courses</option>
                                                @foreach($data as $courses)
                                                <option value="{{ $courses->id }}">{{ $courses->service_name }}</option>
                                                @endforeach --}}
                                            {{-- </select>
                                            @if ($errors->has('course_id'))
                                            <span class="red-text">
                                                <?php //echo $errors->first('course_id', ':message'); ?>
                                            </span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="courses_type">Course Type</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="courses_type" id="courses_type"
                                                placeholder="Enter the Course Type"
                                                value="@if (old('courses_type')) {{ old('courses_type') }}@else{{ $editData->courses_type }} @endif">
                                            @if ($errors->has('courses_type'))
                                                <span class="red-text"><?php echo $errors->first('courses_type', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group" >
                                            <label for="courses_duration">Courses Duration</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="courses_duration" id="courses_duration"
                                                placeholder="Enter the Courses Duration"
                                                value="@if (old('courses_duration')) {{ old('courses_duration') }}@else{{ $editData->courses_duration }} @endif">
                                            @if ($errors->has('courses_duration'))
                                                <span class="red-text"><?php echo $errors->first('courses_duration', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                  
                                        <div class="form-group" id="summernote_id">
                                        <label for="admission_procedure">Admission Procedure</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control admission_procedure" name="admission_procedure" id="description"
                                            placeholder="Enter the Description">
              
                                        @if (old('admission_procedure'))
{{ old('admission_procedure') }}@else{{ $editData->admission_procedure }}
@endif
                                        </textarea>
                                    </div>
                                        @if ($errors->has('admission_procedure'))
                                            <span class="red-text"><?php echo $errors->first('admission_procedure', ':message'); ?></span>
                                        @endif
                                  
                                    </div>
                             


                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                  
                                        <div class="form-group" id="summernote_id1">
                                        <label for="eligibility">eligibility</label>
                                        <textarea class="form-control eligibility" name="eligibility" id="description1"
                                            placeholder="Enter the Description">
              
                                        @if (old('eligibility'))
{{ old('eligibility') }}@else{{ $editData->eligibility }}
@endif
                                        </textarea>
                                    </div>
                                        @if ($errors->has('eligibility'))
                                            <span class="red-text"><?php echo $errors->first('eligibility', ':message'); ?></span>
                                        @endif
                                  
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-slide') }}"
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

        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const courses_type = $('#courses_type').val();
                    const courses_duration = $('#courses_duration').val();
                    // const description = $('#description textarea').val();
                                       
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
                        courses_type: {
                            required: true,
                            spcenotallow: true,
                        },
                        admission_procedure: {
                            required: true,
                        },
                        // eligibility: {
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
                        // eligibility: {
                        //     required: "Please Enter the Eligibility",
                        // },
                    },
                });
            });
        </script>
    @endsection
