@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Courses Offered
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-courses-offered') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Courses Offered</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-courses-offered') }}" method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="title" id="title"
                                                placeholder="Enter the Title"
                                                value="@if (old('title')) {{ old('title') }}@else{{ $editData->title }} @endif">
                                            <label class="error py-2" for="title" id="title_error"></label>
                                            @if ($errors->has('title'))
                                                <span class="red-text"><?php echo $errors->first('title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control mb-2"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('image'))
                                                <span class="red-text"><?php echo $errors->first('image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.COURSES_OFFERED_VIEW') }}{{ $editData->image }}"
                                            class="img-fluid img-thumbnail" width="150" style="background-color: aliceblue;">
                                        <img id="english_imgPreview" src="#"
                                            alt=" {{ strip_tags($editData['title']) }} Image"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
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
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-courses-offered') }}"
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

        {{-- <script>
            $(document).ready(function () {
                var currentEnglishImage = $("#currentEnglishImage").val();
        
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const title = $('#title').val();
                    const description = $('#description').val();
                    const image = $('#image').val();
        
                    // Update the old image values if there are any selected files
                    if (image !== currentEnglishImage) {
                        $("#currentEnglishImage").val(image);
                    }
                }
        
                $('input, textarea').on('input change', checkFormValidity);
        
                $.validator.addMethod("spcenotallow", function (value, element) {
                    if ("select" === element.nodeName.toLowerCase()) {
                        var e = $(element).val();
                        return e && e.length > 0;
                    }
                    return this.checkable(element) ? this.getLength(value, element) > 0 : value.trim().length > 0;
                }, "Enter Some Text");
        
                $.validator.addMethod("validImage", function (value, element) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        var extension = element.files[0].name.split('.').pop().toLowerCase();
                        // Check the file extension
                        return (extension == "jpg" || extension == "jpeg" || extension == "png");
                    }
                    return true; // No file selected, so consider it valid
                }, "Only JPG, JPEG, PNG images are allowed.");
        
                $.validator.addMethod("fileSize", function (value, element, param) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        // Convert bytes to KB
                        const fileSizeKB = element.files[0].size / 1024;
                        return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                    }
                    return true; // No file selected, so consider it valid
                }, "File size must be between {0} KB and {1} KB.");
        
                // You need to define the imageDimensions method here
                $.validator.addMethod("imageDimensions", function (value, element, param) {
                    // Your implementation for image dimension validation
                    // Replace this with your actual validation logic
                    return true;
                }, "Image dimensions must be between {0}x{1} and {2}x{3} pixels.");
        
                // Update the accept attribute to validate based on file extension
                $('#image').attr('accept', 'image/jpeg, image/png');
        
                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        title: {
                            required: true,
                            spcenotallow: true,
                        },
                        description: {
                            required: true,
                        },
                        image: {
                            validImage: true,
                            fileSize: [180, 2048], // Min 180KB and Max 2MB (2048 * 1024 KB)
                            // You need to replace the placeholder with actual dimensions
                            imageDimensions: [50, 50, 800, 800], // Min width x height and Max width x height
                        },
                    },
                    messages: {
                        title: {
                            required: "Please Enter the Rank Number",
                            spcenotallow: "Enter Some Number",
                        },
                        description: {
                            required: "Please Enter the Rank description",
                        },
                        image: {
                            validImage: "Only JPG, JPEG, PNG images are allowed.",
                            fileSize: "The file size must be between 180 KB and 2048 KB.",
                            imageDimensions: "Image dimensions must be between 50x50 and 800x800 pixels.",
                        },
                    },
                    submitHandler: function (form) {
                        form.submit();
                    }
                });
        
                // Submit the form when the "Update" button is clicked
                $("#submitButton").click(function () {
                    // Validate the form
                    if (form.valid()) {
                        form.submit();
                    }
                });
        
                // Display selected images on the page (optional)
                $("#image").change(function () {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        // Display the selected image
                        $("#currentEnglishImageDisplay").attr('src', e.target.result);
                        validator.element("#image"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script> --}}
        
    @endsection
