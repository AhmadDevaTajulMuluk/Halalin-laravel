@extends('layouts.admin')

@section('title', 'Edit Admin')
    
@section('header', 'Edit Admin')
    
@section('content')
<div class="container">
    <form action="{{ route('admin.update', $admin->admin_id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $admin->username }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
        </div>
        <button type="submit" class="btn btn-primary custom-btn">Update</button>
    </form>
</div>
    
@endsection