@extends('layouts.admin')

@section('header', 'Edit Ustadz')

@section('content')
<div class="container mt-5">
    <form action="{{ route('admin.ustadz.update', $ustadz->ustadz_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $ustadz->name }}" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $ustadz->username }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password (Kosongkan jika tidak ingin mengubah):</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <div class="form-group">
            <label for="phone">Telepon:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $ustadz->phone }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3 custom-btn">Simpan</button>
    </form>
</div>
@endsection
