@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Main Menu
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-main-menu') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Main Menu</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('update-main-menu') }}' method="post" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="menu_name_english">Menu Name </label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="menu_name_english" id="menu_name_english"
                                                class="form-control mb-2" id="exampleInputUsername1" placeholder=""
                                                value="@if (old('menu_name_english')) {{ old('menu_name_english') }}@else{{ $main_menu_data->menu_name_english }} @endif">
                                            @if ($errors->has('menu_name_english'))
                                                <span class="red-text"><?php echo $errors->first('menu_name_english', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                 

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <input type="hidden" name="edit_id" id="edit_id" class="form-control"
                                            value="{{ $edit_data_id }}">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton"
                                            >Save &amp;
                                            Update</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-main-menu') }}"
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
                function checkFormValidity() {
                    const menu_name_english = $('#menu_name_english').val();
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
                        menu_name_english: {
                            required: true,
                        },
                       
                    },
                    messages: {
                        menu_name_english: {
                            required: "Please Enter the Menu Name",
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
            });
        </script>
    @endsection
