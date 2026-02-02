@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container d-flex justify-content-center align-items-center py-5" style="min-height: 80vh;">
    <div class="col-md-5 col-lg-4">
        
        <div class="text-center mb-4">
            <div class="bg-primary text-white d-inline-block rounded-circle mb-3 shadow-sm" style="width: 64px; height: 64px; line-height: 64px;">
                <i class="bi bi-shield-lock-fill fs-2"></i>
            </div>
            <h2 class="fw-bold text-dark">Secure Reset</h2>
            <p class="text-muted small">Update your bookstore account password</p>
        </div>

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-4 p-md-5">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-floating mb-3">
                        <input id="email" type="email" name="email" 
                            class="form-control border-0 bg-light @error('email') is-invalid @enderror" 
                            value="{{ old('email', $request->email) }}" required autofocus placeholder="Email">
                        <label for="email" class="text-muted">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" name="password" 
                            class="form-control border-0 bg-light @error('password') is-invalid @enderror" 
                            required placeholder="New Password">
                        <label for="password" class="text-muted">New Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-4">
                        <input id="password_confirmation" type="password" name="password_confirmation" 
                            class="form-control border-0 bg-light" 
                            required placeholder="Confirm Password">
                        <label for="password_confirmation" class="text-muted">Confirm Password</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold shadow-sm rounded-3">
                            <i class="bi bi-check-circle me-2"></i>Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    body { background-color: #f8f9fa; }
    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.1);
        transform: translateY(-2px);
    }
    .btn-primary {
        background: linear-gradient(45deg, #0d6efd, #0052cc);
        border: none;
    }
</style>
@endsection