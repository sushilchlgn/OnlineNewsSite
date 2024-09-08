@php
use Illuminate\Support\Str;
@endphp
@extends('admin.layout')

@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <h2 class="ml-2 menu-title">Posts</h2>
                            <div>
                                @if (session('success'))
                                <div class="alert alert-success bg-success h3 text-white rounded fw-bolder fs-1">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (session('error'))
                                <div class="alert alert-danger bg-danger h3 text-white rounded fw-bolder fs-1">
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
                            <div class="navbar d-flex justify-content-end">
                                <button type="button" data-toggle="modal" class="btn btn-success"
                                    data-target="#addNewProduct">Add New</button>
                            </div>
                        </div>

                        <div class="modal" id="addNewProduct">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Posts</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('posts.store')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method("POST")

                                            <label for="title">Title</label>
                                            <input type="text" id="title" name="title" placeholder="Enter Your title" class="form-control mb-2">

                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" style="height:150px" name="description" placeholder="Enter your description about news"></textarea>



                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <input type="text" id="category" name="category" placeholder="Enter category" class="form-control mb-2">
                                                {{--
                                                <div class="input-group">
                                                   <select class="form-select form-control selectpicker" id="category" name="category">
                                                        <option value="">Select Categories: </option>
                                                        @foreach ($posts as $post)
                                                        <option value="{{ $post->id }}">
                                                {{ $post->name }}
                                                </option>
                                                @endforeach
                                                </select>
                                                <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#addCategoryModal">
                                                    Add Category
                                                </button>
                                            </div>
                                            --}}
                                    </div>

                                    <input type="submit" name="save" class="btn btn-success" value="Save Now" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>TITLE</th>
                                    <th>DESCRIPTION</th>
                                    <th>CATEGORY</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description,30)}}</td>
                                    <td>{{$item->category}}</td>
                                    {{--
                                    <!-- <td>{{ $item->category->name }}</td> -->
                                    --}}


                                    <td class="font-weight-medium">
                                        <button type="button" class="btn" title="Edit" data-toggle="modal"
                                            data-target="#updateModel{{ $item->id }}">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </button>

                                        <div class="modal" id="updateModel{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Posts</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('posts.update',$item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <input type="hidden" name="id"
                                                                value="{{ $item->id }}">

                                                            <label for="title">Title</label>
                                                            <input type="text" id="title"
                                                                name="title" value="{{ $item->title }}"
                                                                placeholder="Enter title"
                                                                class="form-control mb-2">
                                                            <div class="mb-3">
                                                                <label for="description">Description</label>
                                                                <textarea class="form-control" id="description" style="height:150px" name="description" 
                                                                 placeholder="Enter your description" value="{{$item->title}}">
                                                                {{$item->description}}</textarea>

                                                            </div>



                                                            <label for="category">Category:</label>

                                                            <input type="text" id="title"
                                                                name="title" value="{{ $item->category }}"
                                                                placeholder="Enter title"
                                                                class="form-control mb-2">

                                                            {{--<select id="category" name="category"
                                                                    class="form-control mb-2">
                                                                    @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                            </option>
                                                            @endforeach
                                                            </select>--}}

                                                            </select>

                                                            <input type="submit" name="save"
                                                                class="btn btn-success" value="Save Now" />
                                                        </form>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="text-danger" onclick="event.preventDefault();  
                                                document.getElementById('delete-form-{{ $item->id }}').submit();">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </a>

                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('posts.destroy', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
</div>
</section>
</div>

<!-- Add Category Modal -->
<div class="modal" id="addCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <!-- <div class="modal-header">
                <h4 class="modal-title">Add New Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->

            <!-- Modal Body -->
            <!-- <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category" name="name"
                            placeholder="Enter Category Name">
                    </div>
                    <input type="submit" name="save" class="btn btn-success" value="Add Category" />
                </form>
            </div> -->
        </div>
    </div>
</div>
@endsection


@section('customJs')
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
    let variantCount = 1;

    function addVariant() {
        variantCount++;
        const container = document.createElement('div');
        container.className = 'mb-3';
        container.innerHTML = `
<div class="mb-3">
<label for="attributes-${variantCount}" class="form-label">Attribute ${variantCount}</label>
<input type="text" class="form-control" id="attributes-${variantCount}" name="attributes[]" placeholder="Enter attribute name">
</div>
<div class="mb-3">
<label for="options-${variantCount}" class="form-label">Options for Attribute ${variantCount}</label>
<select class="form-select" id="options-${variantCount}" name="options[]">
<option value="">Select an option</option>
<option value="option1">Option 1</option>
<option value="option2">Option 2</option>
<option value="option3">Option 3</option>
</select>
</div>
`;
        document.getElementById('dynamic-variants').appendChild(container);
    }

    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection