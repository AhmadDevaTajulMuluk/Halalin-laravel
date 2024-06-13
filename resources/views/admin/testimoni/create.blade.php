@extends('layouts.admin')

@section('title', 'Tambah Testimoni')

@section('header', 'Tambah Testimoni')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3 rating-container">
                        <label for="rating" class="form-label">Rating</label>
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                        </div>
                    </div>                                                           
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
