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
                        <img src="{{ asset('images/testimoni/' . $testimoni->image) }}" alt="Image" width="100" height="100">
                        <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" {{ $testimoni->rating == 5 ? 'checked' : '' }}><label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4" {{ $testimoni->rating == 4 ? 'checked' : '' }}><label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3" {{ $testimoni->rating == 3 ? 'checked' : '' }}><label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2" {{ $testimoni->rating == 2 ? 'checked' : '' }}><label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1" {{ $testimoni->rating == 1 ? 'checked' : '' }}><label for="star1"></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary custom-btn">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection