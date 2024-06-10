@extends('layouts.admin')

@section('title', 'Create Article')

@section('header', 'Create Article')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="writer" class="form-label">Writer</label>
                    <input type="text" class="form-control" id="writer" name="writer" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="publish_date" class="form-label">Publish Date</label>
                    <input type="date" class="form-control" id="publish_date" name="publish_date" required>
                </div>
                <div class="mb-3">
                    <label for="reference" class="form-label">Reference</label>
                    <input type="text" class="form-control" id="reference" name="reference" required>
                </div>
                <div class="mb-3">
                    <label for="article_image" class="form-label">Article Image</label>
                    <input type="file" class="form-control" id="article_image" name="article_image">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
