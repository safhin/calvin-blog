@extends('backend.auth.index')

@section('content')
<h1 class="auth-title">Sign Up</h1>
<p class="auth-subtitle mb-5">Input your data to register to our website.</p>

<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group position-relative mb-4">
        <input type="file" class="form-control" id="user_image" name="user_image" placeholder="Image">
        @error('user_image')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" class="form-control form-control-xl" name="email" placeholder="Email">
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" class="form-control form-control-xl" name="name" placeholder="name">
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" class="form-control form-control-xl" class="confirm_password" placeholder="Confirm Password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
    <p class='text-gray-600'>Already have an account? 
        <a href="{{ route('login') }}" class="font-bold">Log in</a>.
    </p>
</div>
@endsection