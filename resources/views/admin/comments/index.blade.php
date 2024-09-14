{{--@extends('layouts.app')
@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Your existing content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="menu-title navbar">
                            <h2 class="ml-2 menu-title">Comment</h2>
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

                                    {{-- Modal Header --}}
                                    {{--<div class="modal-header">
                                        <h4 class="modal-title">Add New Product Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>--}}

                                    <!-- Modal body  -->
                                    {{--<div class="modal-body">
                                        <form action="{{route('comments.store')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <label for="name">Name:</label>
                                            <input type="name" id="name" name="name" placeholder="Enter Name:"
                                                class="form-control mb-2">

                                            <input type="submit" name="save" class="btn btn-success" value="Save Now" />
                                        </form>
                                    </div>-->
                                </div>
                            </div>
                        </div>

                        <div class="card-body ">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>USER NAME</th>
                                        <th>POST TITLE</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($comment as $item)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$item->body}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->post->title}}</td>

                                        {{-- Update Model -->
                                        {<td class="font-weight-medium">
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

                                            <form action="{{route('comments.destroy',$item->id)}}" method="POST"
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
            {{ __('Comment') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <div class="p-4 sm:p-8 bg-white relative overflow-x-auto shadow sm:rounded-lg">
                    <a href="{{ route('comments.create') }}">
                        <button
                            class="bg-transparent float-end hover:bg-green-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Add Comment
                        </button>
                    </a>
                    {{-- < table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-900 uppercase ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Comment
                            </th>
                            <th scope="col" class="px-6 py-3">
                                user name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                post title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comment as $item)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item-> name}}
                            </th>
                            <td class="px-6 py-4">
                                <a href="{{ route('comment.edit', $item->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('category.delete', $item->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-6 font-medium text-red-600 dark:text-red-500 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}
                <!-- Comment List Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Comments</h4>
                    </div>
                    <div class="py-5">

                        <div class="mb-12" >
                                {{$comment}}
                        </div>
                        <div class="mt-1">
                            <table>
                                <thead >
                                    <th>id</th>
                                    <th>comment</th>
                                    <th>post id</th>
                                    <th>user id</th>
                                    <th>parent id</th>
                                    <th>created at</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($comment as $item)
                                        <tr>
                                            <td>
                                                    {{$item->id}}
                                            </td>
                                            <td>
                                                    {{$item->body}}
                                            </td>
                                            <td>
                                                    {{$item->post->id}}
                                            </td>

                                            <td>
                                                    {{$item->user->id}}
                                            </td>

                                            <td>
                                                    {{$item->parent_id === null}}
                                            </td>

                                            <td>{{$item->created_at}}</td>

                                            <td>
                                                <a href="#">Edit</a>
                                                <a href="{{route('comments.destroy',$item->id)}}">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- @if ($posts->comment && $posts->comment->count() > 0)
                    <div class="bg-white border border-top-0 p-4">
                                @foreach ($posts->comments as $comment)
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>
                                        <a class="text-secondary font-weight-bold" href="#">{{ $comment-> user -> name}}</a>
                                        <small><i>{{ Carbon::parse($comment->created_at)->format('d M, Y') }}</i></small>
                                    </h6>
                                    <p>{{ $comment-> body}}</p>

                                    <!-- Only show reply button to logged-in users -->
                                            @if (auth()->check())
                                    <button class="btn btn-sm btn-outline-secondary"
                                        onclick="showReplyForm({{ $comment->id }})">Reply</button>
                                    @else
                                    <p>Please <a href="{{ route('login') }}">login</a> to reply.</p>
                                    @endif

                                    <!-- Reply Form (hidden by default) -->
                                    <div id="reply-form-{{ $comment->id }}" class="reply-form" style="display: none;">
                                        <form action="{{ route('comments.reply', $comment->id) }}" method="POST">
                                            @csrf
                                            <textarea name="body" cols="30" rows="2"
                                                class="form-control mb-2"></textarea>
                                            <button type="submit" class="btn btn-sm btn-primary">Submit Reply</button>
                                        </form>
                                    </div>

                                    <!-- Show replies -->
                                            @if ($comment->replies && $comment->replies->count() > 0)
                                                @foreach ($comment->replies as $reply)
                                    <div class="media mt-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                            style="width: 45px;">
                                            <div class="media-body">
                                                <h6><a class="text-secondary font-weight-bold"
                                                    href="#">{{ $reply-> user -> name}}</a>
                                                    <small><i>{{ Carbon::parse($reply->created_at)->format('d M, Y') }}</i></small>
                                                </h6>
                                                <p>{{ $reply-> body}}</p>
                                            </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p>No Comments</p>
                        @endif--}}
                </div>
                <!-- Comment List End -->
            </div>
        </div>
    </div>
    @endsection
</x-app-layout >