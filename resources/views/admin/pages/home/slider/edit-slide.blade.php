@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Slide
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-slide') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Slide</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-slide') }}" method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="rank_no">Rank Number </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="rank_no" id="rank_no"
                                                placeholder="Enter the Rank Number"
                                                value=" @if (old('rank_no')) {{ old('rank_no') }}@else{{ $editData->rank_no }} @endif">
                                            <label class="error py-2" for="rank_no" id="rank_no_error"></label>
                                            @if ($errors->has('rank_no'))
                                                <span class="red-text"><?php echo $errors->first('rank_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="image"> Image</label>
                                            <input type="file" name="image" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('image'))
                                                <div class="red-text"><?php echo $errors->first('image', ':message'); ?>
                                                </div>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.SLIDER_VIEW') }}{{ $editData->image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
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
        <!-- Make sure you have jQuery and jquery.validate.js included before this script -->
        <script>
            $(document).ready(function() {
                var currentEnglishImage = $("#currentEnglishImage").val();
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const rank_no = $('#rank_no').val();
                    const image = $('#image').val();
                    // Update the old PDF values if there are any selected files
                    if (image !== currentEnglishImage) {
                        $("#currentEnglishImage").val(image);
                    }
                }
                $('input').on('input change', checkFormValidity);
                $.validator.addMethod("spcenotallow", function(value, element) {
                    if ("select" === element.nodeName.toLowerCase()) {
                        var e = $(element).val();
                        return e && e.length > 0;
                    }
                    return this.checkable(element) ? this.getLength(value, element) > 0 : value.trim().length >
                        0;
                }, "Enter Some Text");
                // Call the checkFormValidity function on file input change
                $('input, #image').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });
                $.validator.addMethod("validImage", function(value, element) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        var extension = element.files[0].name.split('.').pop().toLowerCase();
                        // Check the file extension
                        return (extension == "jpg" || extension == "jpeg" || extension == "png");
                    }
                    return true; // No file selected, so consider it valid
                }, "Only JPG, JPEG, PNG images are allowed.");
        
                $.validator.addMethod("fileSize", function(value, element, param) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        // Convert bytes to KB
                        const fileSizeKB = element.files[0].size / 1024;
                        return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                    }
                    return true; // No file selected, so consider it valid
                }, "File size must be between {0} KB and {1} KB.");
        
                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        rank_no: {
                            required: true,
                            spcenotallow: true,
                        },
                        image: {
                            validImage: true,
                            fileSize: [180, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                        },
                    },
                    messages: {
                        rank_no: {
                            required: "Please Enter the Rank Number",
                            spcenotallow: "Enter Some Number",
                        },
                        image: {
                    validImage: "Only JPG, JPEG, PNG images are allowed.",
                    fileSize: "The file size must be between 180 KB and 2048 KB.",
                },
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
        
                // Submit the form when the "Update" button is clicked
                $("#submitButton").click(function() {
                    // Validate the form
                    if (form.valid()) {
                        form.submit();
                    }
                });
        
                // You can remove the following two blocks if you don't need to display selected images on the page
                $("#image").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected image for English
                        // You can remove this if you don't need to display the image on the page
                        $("#currentEnglishImageDisplay").attr('src', e.target.result);
                        validator.element("#image"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>        
    @endsection
