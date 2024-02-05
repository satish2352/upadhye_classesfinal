@extends('admin.layout.master')

@section('content')
<?php
$common_form_data = App\Http\Controllers\Website\IndexController::getCommonFormData();
?>
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Marquee
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-marquee') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Marquee</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" id="regForm" name="frm_register" method="post" role="form"
                                action="{{ route('add-marquee') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marquee_tab_id">Marquee Tab </label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" aria-label="Default select example"
                                                name="marquee_tab_id" id="marquee_tab_id" required>
                                                <option value="" selected disabled>Select Tab</option>
                                                @foreach ($common_form_data['data_output_marquee_tab'] as $locationaddress)
                                                <option value="{{ $locationaddress['id'] }}"
                                                    {{ old('marquee_tab_id') == $locationaddress['id'] ? 'selected' : '' }}>
                                                    {{ $locationaddress['title'] }}
                                                </option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('marquee_tab_id'))
                                                <span class="red-text">{{ $errors->first('marquee_tab_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="title" id="title" placeholder="Enter the Title"
                                                name="title" value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                                <span class="red-text"><?php echo $errors->first('title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2 url" name="url" id="url"
                                                placeholder="Enter the URL" name="url" value="{{ old('url') }}">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-marquee') }}"
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
                    const marquee_tab_id = $('#marquee_tab_id').val();
                    const url = $('#url').val();


                    // Enable the submit button if all fields are valid
                    if (title && marquee_tab_id && url) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input').on('input change',
                    checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        title: {
                            required: true,
                        },
                        marquee_tab_id: {
                            required: true,
                        },
                        url: {
                            required: true,
                        },
                    },
                    messages: {
                        title: {
                            required: "Please Enter the Title",
                        },
                        marquee_tab_id: {
                            required: "Please Select the Marquee Tab",
                        },
                        url: {
                            required: "Please Enter the URL",
                        },
                    },
                });
            });
        </script>
    @endsection
