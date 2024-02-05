@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Scolarship Form
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-scolarship-form') }}">Scolarship</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Scolarship Form</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @include('admin.layout.alert')
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Course</th>
                                                    <th>Mode</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile Number</th>
                                                    <th>Branch</th>
                                                    <th>Roll Number</th>
                                                    <th>Address</th>
                                                    <!-- <th>Status</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($get_scolarship_form as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ strip_tags($item->edu_course) }}</td>
                                                        <td>{{ strip_tags($item->edu_mode) }}</td>
                                                        <td>{{ strip_tags($item->full_name) }}</td>
                                                        <td>{{ strip_tags($item->email) }}</td>
                                                        <td>{{ strip_tags($item->mobile_number) }}</td>
                                                        <td>{{ strip_tags($item->name) }}</td>
                                                        <td>{{ strip_tags($item->roll_number) }}</td>
                                                        <td>{{ strip_tags($item->address) }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a data-id="{{ $item->id }}"
                                                                    class="show-btn btn btn-sm btn-outline-primary m-1"
                                                                    title="Show"><i class="fas fa-eye"></i></a>
                                                                <a data-id="{{ $item->id }}"
                                                                    class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                    title="Delete"><i class="fas fa-archive"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ url('/show-scolarship-form') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ url('/delete-scolarship-form') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <!-- content-wrapper ends -->
    @endsection
