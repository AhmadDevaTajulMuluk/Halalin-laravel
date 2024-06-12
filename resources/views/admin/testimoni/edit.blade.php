@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('header', 'Edit Testimoni')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('admin.testimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{ $testimoni->author }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required>{{ $testimoni->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($testimoni->image)
                        <img src="{{ asset('storage/' . $testimoni->image) }}" alt="Image" width="100" height="100">
                        <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary custom-btn">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection