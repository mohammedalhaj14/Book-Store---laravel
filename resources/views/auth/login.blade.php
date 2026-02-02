@extends('layouts.app') {{-- Uses your site's professional Header and Footer --}}

@section('content')
<div class="container d-flex justify-content-center align-items-center py-5" style="min-height: 80vh;">
    <div class="col-md-5 col-lg-4">
        
        <div class="text-center mb-4">
            <div class="bg-primary text-white d-inline-block rounded-circle mb-3 shadow-sm" style="width: 64px; height: 64px; line-height: 64px;">
                <i class="bi bi-person-check fs-2"></i>
            </div>
            <h2 class="fw-bold text-dark">Welcome Back</h2>
            <p class="text-muted small text-uppercase tracking-wider">Sign in to your reader account</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="alert alert-success border-0 shadow-sm mb-4 rounded-3" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-4 p-md-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input id="email" type="email" name="email" 
                            class="form-control border-0 bg-light @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" required autofocus placeholder="Email">
                        <label for="email" class="text-muted">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" name="password" 
                            class="form-control border-0 bg-light @error('password') is-invalid @enderror" 
                            required placeholder="Password">
                        <label for="password" class="text-muted">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label small text-muted" for="remember_me">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="small text-primary fw-bold text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold shadow-sm rounded-3">
                            {{ __('Log in') }}
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="small text-muted mb-0">
                            New here? 
                            <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">Create an account</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Pro UI Refinements */
    body { background-color: #f8f9fa; }
    
    .form-control {
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        background-color: #ffffff !important;
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.05);
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

    .card {
        border: none;
    }
</style>
@endsection