@extends('layouts.page')

@section('content')
    <h1>Categories</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">
                    <a href="{{ route('categories.create') }}">+ New</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($categories->isEmpty())
                <tr>
                    <td colspan="5">There is no record.</td>
                </tr>
            @else
                @foreach($categories as $category)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <form onsubmit="return confirm('Are you sure?');" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" data-id="{{ $category->id }}" class="btn btn-danger btn-category-remove">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="pagination">
        {{ $categories->links() }}
    </div>
@endsection