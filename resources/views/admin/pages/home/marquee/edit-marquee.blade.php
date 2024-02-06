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
                        <li class="breadcrumb-item active" aria-current="page"> Update Marquee</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-marquee') }}" method="post" id="regForm"
                                name="frm_register" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marquee_tab_id">Marquee Tab  </label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" id="marquee_tab_id" name="marquee_tab_id"
                                                onchange="myFunction(this.value)">
                                                <option>Select</option>
                                                @foreach ($common_form_data['data_output_marquee_tab'] as $locationaddress)
                                                    <option value="{{ $locationaddress['id'] }}"
                                                        @if ($locationaddress['id'] == ['marquee_tab_id']) <?php echo 'selected'; ?> @endif>
                                                        {{ $locationaddress['title'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('marquee_tab_id'))
                                                <span class="red-text"><?php echo $errors->first('marquee_tab_id', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marquee_tab_id">Role Type</label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" id="marquee_tab_id" name="marquee_tab_id"
                                               >
                                                <option>Select</option>
                                                @foreach ($common_form_data['data_output_marquee_tab'] as $role)
                                                    <option value="{{ $role['id'] }}"
                                                        @if ($role['id'] == $common_form_data['data_output_marquee_tab']['marquee_tab_id']) <?php echo 'selected'; ?> @endif>
                                                        {{ $role['title'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('marquee_tab_id'))
                                                <span class="red-text"><?php echo $errors->first('marquee_tab_id', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marquee_tab_id">Marquee Tab</label>&nbsp;<span class="red-text">*</span>
                                            <select class="form-control" id="marquee_tab_id" name="marquee_tab_id">
                                                <option>Select</option>
                                                @foreach ($common_form_data['data_output_marquee_tab'] as $locationaddress)
                                                    <option value="{{ $locationaddress['id'] }}"
                                                        @if ($locationaddress['id'] == old('marquee_tab_id', $marquees->marquee_tab_id)) selected @endif>
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
                                            <label for="marquee_tab_id">Marquee Tab</label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" id="marquee_tab_id" name="marquee_tab_id">
                                                <option value="">Select</option>
                                                @foreach ($common_form_data['data_output_marquee_tab'] as $marquee)
                                                    <option value="{{ $marquee['id'] }}"
                                                        {{ (old('marquee_tab_id', $marquees->marquee_tab_id) == $marquee['id']) ? 'selected' : '' }}>
                                                        {{ $marquee['title'] }}
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
                                            <input class="form-control mb-2" name="title" id="title" placeholder="Enter the Title" value="@if (old('title'))
                                            {{ old('title') }}@else{{ $marquees->title }}
                                            @endif">
                                            @if ($errors->has('title'))
                                                <span class="red-text"><?php echo $errors->first('title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control mb-2" name="url" id="url"
                                                placeholder="Enter the Title"
                                                value="@if (old('url')) {{ old('url') }}@else{{ $marquees->url }} @endif">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-marquee') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $marquees->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                function checkFormValidity() {
                    const title = $('#title').val();
                    const url = $('#url').val();
                    
                    url = url.replace(/\s/g, '');
                }
                // Call the checkFormValidity function on file input change
                $('input').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });
                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
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
                            required: "कृपया शीर्षक प्रविष्ट करा",
                        },
                        url: {
                            required: "Please Enter the URL",
                        },
                    },
                });
                // Submit the form when the "Update" button is clicked
                $("#submitButton").click(function() {
                    // Validate the form
                    if (form.valid()) {
                        form.submit();
                    }
                });
            });
        </script> 
    @endsection
