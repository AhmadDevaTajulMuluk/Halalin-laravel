@extends('layouts.admin')

@section('title', 'Articles')

@section('header', 'Halaman Kelola Artikel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3 custom-btn   ">Tambah Article</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Writer</th>
                        <th>Publish Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->article_id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->writer }}</td>
                            <td>{{ $article->publish_date->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.articles.edit', $article->article_id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.articles.destroy', $article->article_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
