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
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $testimoni->id }}">Delete</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmDeleteModal{{ $testimoni->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $testimoni->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $testimoni->id }}">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this testimonial?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
