@extends('layouts.page')

@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">
                    <a href="{{ route('admin.posts.create') }}">+ New</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($posts->isEmpty())
                <tr>
                    <td colspan="5">There is no record.</td>
                </tr>
            @else
                @foreach($posts as $post)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $post->author?->name }}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if(!empty($post->image))
                                <img src="{{ asset('/storage/posts/' . $post->image) }}" class="w-100"/>
                            @endif
                        </td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @can('updatePost', $post)
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                @endcan

                                @can('deletePost', $post)
                                    <form onsubmit="return confirm('Are you sure?');" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" data-id="{{ $post->id }}" class="btn btn-danger btn-category-remove">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="pagination">
        {{ $posts->links() }}
    </div>
@endsection