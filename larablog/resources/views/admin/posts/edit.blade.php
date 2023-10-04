@extends('layouts.page')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select required class="form-control" id="category_id" name="category_id">
                <option>Please select category</option>
                @foreach($categories as $id => $title)
                    <option {{ $id === $post->category_id ? 'selected' : '' }} value="{{ $id }}">{{ $title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" required class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $post->description }}</textarea>
        </div>
        <div class="mb-3">
            <div class="img-preview">
                @if(!empty($post->image))
                    <img src="{{ asset('/storage/posts/' . $post->image) }}" class="w-100"/>
                @endif
            </div>
            <label for="selectedImage" class="form-label">New Image</label>
            <input type="file" class="form-control" id="selectedImage" name="selectedImage">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection