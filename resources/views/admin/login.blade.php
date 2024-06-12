@extends('app')

@section('header', 'Login')
    
@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
<div class="col-md-6 col-lg-4">
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif
    <div class="card shadow-sm" style="border-radius: 10px;">
        <div class="card-body">
            <form action="{{ route('login.action') }}" method="POST">
                @csrf
                <h1 class="text-center" style="color: #052958">Login Admin</h1>
                <div class="mb-3 mt-5">
                    <label>Username <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="username" value="{{ old('username') }}" required />
                </div>
                <div class="mb-3">
                    <label>Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password" required />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary custom-btn w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
