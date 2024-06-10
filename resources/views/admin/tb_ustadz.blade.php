@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Ustadz</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.ustadz.create') }}" class="btn btn-primary mb-3">Tambah Ustadz</a>
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
                        <a href="{{ route('admin.ustadz.edit', ['ustadz_id' => $ustadz->ustadz_id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.ustadz.destroy', ['ustadz_id' => $ustadz->ustadz_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
