@extends('admin.posts.layout');

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New post</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($posts as $post)
    <tr>
        {{-- <td>1</td>
            <td>test content 1</td>
            <td>this is a test content no. 1. for testing the index field to show posts. </td>
            <td>hello</td>--}}

        <td>{{ ++$i }}</td>
        <td>{{ $post->name }}</td>
        <td>{{ $post->detail }}</td>
        <td>
            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            {{-- <form action="" method="POST">
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-primary" href="">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form> --}}



        </td>
    </tr>

@endforeach 
</table>

{{-- $posts->links() --}}

@endsection