@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">Testimonial
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-testimonial') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Testimonial </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('add-testimonial') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="title" id="title"
                                                placeholder="Enter the Title" name="title"
                                                value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                                <span class="red-text"><?php echo $errors->first('title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="position">position</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="position" id="position"
                                                placeholder="Enter the position" name="position"
                                                value="{{ old('position') }}">
                                            @if ($errors->has('position'))
                                                <span class="red-text"><?php echo $errors->first('position', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Image </label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="image" id="image" accept="image/*"
                                                value="{{ old('image') }}" class="form-control mb-2">
                                            @if ($errors->has('image'))
                                                <span class="red-text"><?php echo $errors->first('image', ':message'); ?></span>
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
                                        <span><a href="{{ route('list-testimonial') }}"
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
                    const description = $('#description textarea').val();
                    const image = $('#image').val();

                    // Enable the submit button if all fields are valid
                    // if (title && description && image) {
                    //     $('#submitButton').prop('disabled', false);
                    // } else {
                    //     $('#submitButton').prop('disabled', true);
                    // }
                }
                // Custom validation method to check file extension
                $.validator.addMethod("fileExtension", function(value, element, param) {
                    // Get the file extension
                    const extension = value.split('.').pop().toLowerCase();
                    return $.inArray(extension, param) !== -1;
                }, "Invalid file extension.");

                // Custom validation method to check file size
                $.validator.addMethod("fileSize", function(value, element, param) {
                    // Convert bytes to KB
                    const fileSizeKB = element.files[0].size / 1024;
                    return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                }, "File size must be between {0} KB and {1} KB.");

                // Update the accept attribute to validate based on file extension
                $('#image').attr('accept', 'image/jpeg, image/png');

                // Call the checkFormValidity function on input change
                $('input, textarea, #image').on('input change', checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        title: {
                            required: true,
                        },
                        position: {
                            required: true,
                        },
                        description: {
                            required: true,
                        },
                        image: {
                            required: true,
                            fileExtension: ["jpg", "jpeg", "png"],
                            fileSize: [10, 500], // Min 10KB and Max 2MB (2 * 1024 KB)
                            imageDimensions: [50, 50, 800, 800], // Min width x height and Max width x height
                        },
                    },
                    messages: {
                        title: {
                            required: "Please enter the Title.",
                        },
                        position: {
                            required: "Please Enter the Position",
                        },
                        description: {
                            required: "Please Enter the Description",
                        },
                        image: {
                            required: "Please upload an Image (jpg, jpeg, png).",
                            fileExtension: "Only JPG, JPEG, and PNG images are allowed.",
                            fileSize: "File size must be between 10 KB and 500 KB.",
                            imageDimensions: "Image dimensions must be between 50x50 and 800x800 pixels.",
                        },
                    },
                });
            });
        </script>
    @endsection
