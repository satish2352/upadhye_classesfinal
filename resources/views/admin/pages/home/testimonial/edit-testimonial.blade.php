@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Testimonial
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-testimonial') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Testimonial</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-testimonial') }}" method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="title" id="title"
                                                placeholder="Enter the Title"
                                                value="@if (old('title')) {{ old('title') }}@else{{ $editData->title }} @endif"
                                                >
>
                                            <label class="error py-2" for="title" id="title_error"></label>
                                            @if ($errors->has('title'))
                                                <span class="red-text"><?php echo $errors->first('title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>   
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="position">Position </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="position" id="position"
                                                placeholder="Enter the Position"
                                                value="@if (old('position')) {{ old('position') }}@else{{ $editData->position }} @endif"
                                                >
>
                                            <label class="error py-2" for="position" id="position_error"></label>
                                            @if ($errors->has('position'))
                                                <span class="red-text"><?php echo $errors->first('position', ':message'); ?></span>
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
                                            src="{{ Config::get('DocumentConstant.TESTIMONIAL_VIEW') }}{{ $editData->image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>   
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-testimonial') }}"
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
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const title = $('#title').val();
                    const position = $('#position').val();
                    const description = $('#description textarea').val();
                    const image = $('#image').val();                    
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
                        },
                        position: {
                            required: true,
                        },
                        image: {
                            required: true,
                            fileExtension: ["jpg", "jpeg", "png"],
                            fileSize: [5, 200], // Min 10KB and Max 2MB (2 * 1024 KB)
                            imageDimensions: [50, 50, 800, 800], // Min width x height and Max width x height
                        },
                    },
                    messages: {
                        title: {
                            required: "Please enter the Title.",
                            spcenotallow: "Enter Some Title",
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
                            fileSize: "File size must be between 10 KB and 150 KB.",
                            imageDimensions: "Image dimensions must be between 100x100 and 800x800 pixels.",
                        },
                    },
                });
            });
        </script>  --}}
    @endsection
