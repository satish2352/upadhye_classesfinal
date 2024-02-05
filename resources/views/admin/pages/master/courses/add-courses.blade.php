@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-Name">
                    Courses
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-courses') }}">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Services</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-courses') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="service_name">Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control mb-2" name="service_name" id="service_name"
                                                value="{{ old('service_name') }}" placeholder="Enter the Name">
                                            @if ($errors->has('service_name'))
                                                <span class="red-text"><?php echo $errors->first('service_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-courses') }}"
                                                class="btn btn-sm btn-primary">Back</a></span>
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
                    const name = $('#name').val();                    
                }
                // Call the checkFormValidity function on input change
                $('input').on('input change', checkFormValidity);
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
                        name: {
                            required: true,
                            spcenotallow: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Please Enter the Name",
                            spcenotallow: "Enter Some Text",
                        },
                    },
                });
            });
        </script>
    @endsection
