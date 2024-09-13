{{-- @extends('layouts.app')
@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Your existing content --> -->
    <div>
        <ul>
            <li>hello</li>
        </ul>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="menu-title navbar">
                            <h2 class="ml-2 menu-title">Post Category</h2>
                            <div>
                                @if (@session('success'))
                                <div class="alert alert-success bg-success h3 text-white rounded fw-bolder fs-1">
                                    {{ session('success') }}
                                </div>
                                @endif
                            </div>
                            <div class="navbar d-flex justify-content-end">
                                <button type="button" data-toggle="modal" class="btn btn-success"
                                    data-target="#AddNewCategory">Add New</button>
                            </div>
                        </div>


                        <div class="modal" id="AddNewCategory">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header  -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Post Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body  -->
                                    <div class="modal-body">
                                        <form action="{{route('category.store')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <label for="name">Name:</label>
                                            <input type="name" id="name" name="name" placeholder="Enter Name:"
                                                class="form-control mb-2">

                                            <input type="submit" name="save" class="btn btn-success" value="Save Now" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body ">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($categories as $item)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td> {{$item->name}} </td>

                                        <!-- -- Update Model   -- -->
                                        <td class="font-weight-medium">
                                            <button type="button" class="btn" title="Edit" data-toggle="modal"
                                                data-target="#updateModel{{ $i }}">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </button>
                                            <div class="modal" id="updateModel{{ $i }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update Product Category</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <label for="name">Name:</label>
                                                                <input type="name" id="name" name="name"
                                                                    value="{{$item->name}}" placeholder="Enter Name:"
                                                                    class="form-control mb-2">

                                                                <input type="hidden" name="id" value="$item->id">
                                                                <input type="submit" name="save" class="btn btn-success"
                                                                    value="Save Changes" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <form action="{{route('category.delete')}}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm w-10" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="fas fa-lg fa-trash-alt"></i>
                                                </button>
                                            </form>
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
    </section>
</div>
@endsection

@section(' customJs')
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<script>
    $(function () {
        bsCustomFileInput.init();
    });
    @endsection--}}


    <x-app-layout>
        @section("content")

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Categorys') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <table class="text-left m-4" style="border-collapse:collapse">
                            <thead>
                                <tr>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Feature</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Supported?</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Feature</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Supported?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr class="hover:bg-blue-lightest">
                                    <td class="py-4 px-6 border-b border-grey-light">Conversations</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-center">❌</td>
                                </tr>
                                <tr class="hover:bg-blue-lightest">
                                    <td class="py-4 px-6 border-b border-grey-light">Question-Buttons</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-center">❌</td>
                                </tr>
                                <tr class="hover:bg-blue-lightest">
                                    <td class="py-4 px-6 border-b border-grey-light">Image Attachment</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-center">✅ </td>
                                </tr>
                                <tr class="hover:bg-blue-lightest">
                                    <td class="py-4 px-6 border-b border-grey-light">Video Attachment</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-center">❌</td>
                                </tr>
                                <tr class="hover:bg-blue-lightest">
                                    <td class="py-4 px-6 border-b border-grey-light">Audio Attachment</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-center">❌</td>
                                </tr>
                                <tr class="hover:bg-blue-lightest">
                                    <td class="py-4 px-6 border-b border-grey-light">Location Attachment</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-center">❌</td>
                                </tr> -->
                            </tbody>
                        </table>
                        {{-- @include('admin.profile.partials.update-profile-information-form') --}}
                    </div>
                </div>

            <!-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        {{-- @include('admin.profile.partials.update-password-form') --}}
                    </div>
                </div> -->

                <!-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        {{-- @include('admin.profile.partials.delete-user-form') --}}
                    </div> -->
                </div>
            </div>
        </div>
        @endsection
    </x-app-layout>