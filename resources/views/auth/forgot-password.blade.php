@extends('layouts.app') {{-- Integrated with your Bookstore's Pro Header and Footer --}}

@section('content')
<div class="container d-flex justify-content-center align-items-center py-5" style="min-height: 75vh;">
    <div class="col-md-5 col-lg-4">
        
        <div class="text-center mb-4">
            <div class="bg-warning text-white d-inline-block rounded-circle mb-3 shadow-sm" style="width: 64px; height: 64px; line-height: 64px;">
                <i class="bi bi-shield-lock fs-2"></i>
            </div>
            <h2 class="fw-bold text-dark">Password Recovery</h2>
            <p class="text-muted small px-3">
                {{ __('No problem. Enter your email address and we will send you a reset link.') }}
            </p>
        </div>

        {{-- Session Status Alert --}}
        @if (session('status'))
            <div class="alert alert-success border-0 shadow-sm mb-4 rounded-3 text-center" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('status') }}
            </div>
        @endif

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-4 p-md-5">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-floating mb-4">
                        <input id="email" type="email" name="email" 
                            class="form-control border-0 bg-light @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" required autofocus placeholder="Email">
                        <label for="email" class="text-muted">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold shadow-sm rounded-3">
                            {{ __('Send Reset Link') }}
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="small text-primary fw-bold text-decoration-none">
                            <i class="bi bi-arrow-left me-1"></i> Back to Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Final Bookstore Theme Polish */
    body { background-color: #f8f9fa; }
    
    .form-control {
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        background-color: #ffffff !important;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        transform: translateY(-2px);
    }

    .btn-primary {
        background: linear-gradient(45deg, #0d6efd, #0052cc);
        border: none;
        letter-spacing: 0.5px;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
    }
    
    .bg-warning {
        background: linear-gradient(45deg, #ffc107, #ff9800) !important;
    }
</style>
@endsection