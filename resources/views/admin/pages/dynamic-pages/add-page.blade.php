@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Dynamic Page
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Dynamic Page</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('add-dynamic-page') }}' method="post"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">

                                                <label for="menu_name_english">Main Menu</label>&nbsp<span
                                                    class="red-text">*</span>
                                                <select class="form-select form-control" name="menu_data" id="menu_data"
                                                    aria-label="Default select example">
                                                    <option value="">Select Name</option>
                                                    @foreach ($main_menu_data as $key => $data)
                                                        <option value="{{ $data['menu_id'] }}_{{ $data['main_sub'] }}"
                                                            {{ old('menu_data') == $data['menu_id'] . '_' . $data['main_sub'] ? 'selected' : '' }}>
                                                            {{ $data['menu_name_english'] }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('menu_data'))
                                                    <span class="red-text"><?php echo $errors->first('menu_data', ':message'); ?></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="course_type"> Course Type</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control mb-2" name="course_type"
                                                        id="course_type" placeholder="Enter the Tilte"
                                                        value="{{ old('course_type') }}" />
                                                    @if ($errors->has('course_type'))
                                                        <span class="red-text"><?php echo $errors->first('course_type', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="course_duration">Course Duration</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control mb-2" name="course_duration"
                                                        id="course_duration" placeholder="Enter the Tilte"
                                                        value="{{ old('course_duration') }}" />
                                                    @if ($errors->has('course_duration'))
                                                        <span class="red-text"><?php echo $errors->first('course_duration', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="admission_procedure">Admission Procedure</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control mb-2" name="admission_procedure"
                                                        id="admission_procedure" placeholder="Enter the Tilte"
                                                        value="{{ old('admission_procedure') }}" />
                                                    @if ($errors->has('admission_procedure'))
                                                        <span class="red-text"><?php echo $errors->first('admission_procedure', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="eligibility">Eligibility</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control mb-2" name="eligibility"
                                                        id="eligibility" placeholder="Enter the Tilte"
                                                        value="{{ old('eligibility') }}" />
                                                    @if ($errors->has('eligibility'))
                                                        <span class="red-text"><?php echo $errors->first('eligibility', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                  

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="preparation">Preparation</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control mb-2" name="preparation"
                                                        id="preparation" placeholder="Enter the Tilte"
                                                        value="{{ old('preparation') }}" />
                                                    @if ($errors->has('preparation'))
                                                        <span class="red-text"><?php echo $errors->first('preparation', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="publish_date">Publish Date</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD"
                                                name="publish_date" id="publish_date" value="{{ old('publish_date') }}">
                                            @if ($errors->has('publish_date'))
                                                <span class="red-text"><?php echo $errors->first('publish_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-dynamic-page') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function submitRegister() {
                document.getElementById("frm_register").submit();
            }
        </script>
        <script>
            $(document).ready(function() {
            
            });
        </script>
    @endsection
