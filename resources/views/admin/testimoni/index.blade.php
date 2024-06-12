@extends('layouts.admin')

@section('title', 'Daftar Testimoni')

@section('header', 'Daftar Testimoni')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.testimoni.create') }}" class="btn btn-primary mb-3 custom-btn">Tambah Testimoni</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Penulis</th>
                        <th>Testimoni</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonis as $testimoni)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $testimoni->author }}</td>
                            <td>{{ Str::limit($testimoni->content, 50) }}</td>
                            <td>
                                @if($testimoni->image)
                                    <img src="{{ $testimoni->image ? asset('images/testimoni/' . $testimoni->image) : asset('assets/images/user.png') }}" alt="group" width="50" height="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.testimoni.edit', $testimoni->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.testimoni.destroy', $testimoni->id) }}" method="POST" class="d-inline">
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
