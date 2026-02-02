@extends('layouts.app') {{-- This pulls in your Pro Header and Footer --}}

@section('content')
<div class="container d-flex justify-content-center align-items-center py-5" style="min-height: 80vh;">
    <div class="col-md-5">
        <div class="text-center mb-4">
            <div class="bg-primary text-white d-inline-block rounded-circle mb-3 shadow-sm" style="width: 64px; height: 64px; line-height: 64px;">
                <i class="bi bi-book-half fs-2"></i>
            </div>
            <h2 class="fw-bold text-dark">Create Your Account</h2>
            <p class="text-muted small text-uppercase tracking-wider">Join our community of readers</p>
        </div>

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-4 p-md-5">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input id="name" type="text" name="name" 
                            class="form-control border-0 bg-light @error('name') is-invalid @enderror" 
                            value="{{ old('name') }}" required autofocus placeholder="Name">
                        <label for="name" class="text-muted">Full Name</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="email" type="email" name="email" 
                            class="form-control border-0 bg-light @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" required placeholder="Email">
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

                    <div class="form-floating mb-4">
                        <input id="password_confirmation" type="password" name="password_confirmation" 
                            class="form-control border-0 bg-light" 
                            required placeholder="Confirm Password">
                        <label for="password_confirmation" class="text-muted">Confirm Password</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold shadow-sm rounded-3">
                            Start Reading Now
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">
                            Already a member? 
                            <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Sign In</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Pro Bookstore Polish */
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
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
    }
</style>
@endsection