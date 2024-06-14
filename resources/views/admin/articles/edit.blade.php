@extends('layouts.admin')

@section('title', 'Edit Article')

@section('header', 'Edit Article')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('admin.articles.update', $article->article_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="writer" class="form-label">Writer</label>
                    <input type="text" class="form-control" id="writer" name="writer" value="{{ $article->writer }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="publish_date" class="form-label">Publish Date</label>
                    <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ $article->publish_date ? $article->publish_date->format('Y-m-d') : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="reference" class="form-label">Reference</label>
                    <input type="text" class="form-control" id="reference" name="reference" value="{{ $article->reference }}" required>
                </div>
                <div class="mb-3">
                    <label for="article_image" class="form-label">Article Image</label>
                    <input type="file" class="form-control" id="article_image" name="article_image">
                    <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                </div>
                <button type="submit" class="btn btn-primary custom-btn">Update</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('admin.articles.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
