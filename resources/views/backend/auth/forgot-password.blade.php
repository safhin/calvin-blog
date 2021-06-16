@extends('backend.auth.index')

@section('content')
<h1 class="auth-title">Forgot Password.</h1>
<p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" class="form-control form-control-xl" name="email" placeholder="Email">
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button>
</form>
@endsection