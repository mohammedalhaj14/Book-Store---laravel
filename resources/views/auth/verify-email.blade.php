@extends('layouts.app') {{-- Pulls in your professional Header/Footer --}}

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container d-flex justify-content-center align-items-center py-5" style="min-height: 75vh;">
    <div class="col-md-6 col-lg-5">
        
        <div class="text-center mb-4">
            <div class="bg-info text-white d-inline-block rounded-circle mb-3 shadow-sm" style="width: 70px; height: 70px; line-height: 70px;">
                <i class="bi bi-envelope-check-fill fs-2"></i>
            </div>
            <h2 class="fw-bold text-dark">Verify Your Email</h2>
            <p class="text-muted px-4">
                {{ __('Almost there! We sent a verification link to your email. Please click it to activate your bookstore account.') }}
            </p>
        </div>

        {{-- Success Message --}}
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success border-0 shadow-sm mb-4 rounded-3 text-center" role="alert">
                <i class="bi bi-send-check me-2"></i>
                {{ __('A new verification link has been sent to your email address.') }}
            </div>
        @endif

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-4 p-md-5 text-center">
                
                <div class="d-flex flex-column gap-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold rounded-3 shadow-sm">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link text-muted text-decoration-none small">
                            <i class="bi bi-box-arrow-right me-1"></i> {{ __('Log Out') }}
                        </a>
                    </form>
                </div>

            </div>
        </div>
        
        <p class="text-center mt-4 text-muted small">
            Didn't receive anything? Check your spam folder or try resending.
        </p>
    </div>
</div>

<style>
    /* Professional Bookstore Theme */
    body { background-color: #f8f9fa; }
    
    .bg-info {
        background: linear-gradient(45deg, #0dcaf0, #0aa2c0) !important;
    }

    .btn-primary {
        background: linear-gradient(45deg, #0d6efd, #0052cc);
        border: none;
        transition: transform 0.2s;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25);
    }

    .btn-link:hover {
        color: #dc3545 !important; /* Redish on hover for logout */
    }

    .card {
        border: none;
    }
</style>
@endsection