@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-7">

            <div class="row justify-content-center">
                <div class="col-7 grid-margin ">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                            <h3 class="page-title">
                                Show Course Details
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('list-course-details') }}" class="btn btn-sm btn-primary ml-3">Back</a>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Course Name :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($showData->service_name) }}</label>
                                        </div>
                                    </div>      
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Courses Type :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{$showData->courses_type }}</label>
                                        </div>
                                        
                                    </div>      

                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Admission Procedure :</label>
                                        </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{$showData->admission_procedure }}</label>
                                        </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <label>Eligibility :</label>
                                            </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                                <label>{{$showData->eligibility }}</label>
                                            </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- content-wrapper ends -->
    @endsection
