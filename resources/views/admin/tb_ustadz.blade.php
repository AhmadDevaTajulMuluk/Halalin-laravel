@extends('layouts.admin')

@section('title','Daftar Ustadz')

@section('header', 'Daftar Ustadz')

@section('content')
<div class="container mt-5">
    {{-- <h2 class="text-center mb-4">Daftar Ustadz</h2> --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.ustadz.create') }}" class="btn btn-primary mb-3 custom-btn">Tambah Ustadz</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ustadz_id</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ustadz as $ustadz)
                <tr>
                    <td>{{ $ustadz->ustadz_id }}</td>
                    <td>{{ $ustadz->name }}</td>
                    <td>{{ $ustadz->username }}</td>
                    <td>{{ $ustadz->phone }}</td>
                    <td>
                        <a href="{{ route('admin.ustadz.edit', $ustadz->ustadz_id) }}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $ustadz->ustadz_id }}">Delete</button>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $ustadz->ustadz_id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $ustadz->ustadz_id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $ustadz->ustadz_id }}">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this ustadz?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.ustadz.destroy', $ustadz->ustadz_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
