@extends('admin.layout.master')

@section('content')
<<<<<<< HEAD:resources/views/admin/pages/menu/roles/list-role.blade.php
 
=======
>>>>>>> 03c1251d2028d34f7da13a52a0bd25b3c3cf1aa5:resources/views/admin/pages/home/slider/list-slide.blade.php
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
<<<<<<< HEAD:resources/views/admin/pages/menu/roles/list-role.blade.php
                    Role List
                        <a href="{{ route('add-role') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
=======
                    Slide List
                    <a href="{{ route('add-slide') }}" class="btn btn-sm btn-primary ml-3">+
                        Add</a>
>>>>>>> 03c1251d2028d34f7da13a52a0bd25b3c3cf1aa5:resources/views/admin/pages/home/slider/list-slide.blade.php

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-role') }}">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Role List</li>
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
                                                    <th>Rank Number </th>
                                                    <th>Image </th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getOutput as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ strip_tags($item->rank_no) }}</td>
                                                        <td> <img class="img-size"
                                                                src="{{ Config::get('DocumentConstant.SLIDER_VIEW') }}{{ $item->image }}"
                                                                alt=" {{ strip_tags($item['rank_no']) }} Image" />
                                                        </td>
                                                        <td>
                                                            <label class="switch">
                                                                <input data-id="{{ $item->id }}" type="checkbox"
                                                                    {{ $item->is_active ? 'checked' : '' }}
                                                                    class="active-btn btn btn-sm btn-outline-primary m-1"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="{{ $item->is_active ? 'Active' : 'Inactive' }}">
                                                                <span class="slider round "></span>
                                                            </label>

                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('edit-slide', base64_encode($item->id)) }}"
                                                                    class="btn btn-sm btn-outline-primary m-1"
                                                                    title="Edit Slide"><i
                                                                        class="fas fa-pencil-alt"></i></a>

                                                            <a data-id="{{ $item->id }}"
                                                                class="show-btn btn btn-sm btn-outline-primary m-1"
                                                                title="Show"><i class="fas fa-eye"></i></a>
                                                                <a data-id="{{ $item->id }}"
                                                                    class="show-btn btn btn-sm btn-outline-primary m-1"
                                                                    title="Show Slide "><i class="fas fa-eye"></i></a>

                                                                <a data-id="{{ $item->id }}"
                                                                    class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                    title="Delete Slide"><i class="fas fa-archive"></i></a>
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
        <form method="POST" action="{{ url('/delete-role') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-role') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ url('/update-one-role') }}" id="activeform">
            @csrf
            <input type="hidden" name="active_id" id="active_id" value="">
        </form>
    @endsection
