@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row align-items-center">
        {{-- Book Cover Column --}}
        <div class="col-md-5 mb-4">
            <div class="shadow-lg rounded overflow-hidden border">
                @if($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" 
                         class="img-fluid w-100" 
                         style="max-height: 600px; object-fit: cover;" 
                         alt="{{ $book->title }}">
                @else
                    <div class="bg-light d-flex flex-column align-items-center justify-content-center" style="height: 500px;">
                        <i class="bi bi-book text-secondary opacity-25" style="font-size: 5rem;"></i>
                        <p class="text-muted mt-3">No Cover Image Available</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Book Details Column --}}
        <div class="col-md-7 ps-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('books.index') }}" class="text-decoration-none">Shop</a></li>
                    <li class="breadcrumb-item active">{{ $book->category->name ?? 'Uncategorized' }}</li>
                </ol>
            </nav>

            <h1 class="display-4 fw-bold mb-2 text-dark">{{ $book->title }}</h1>
            <p class="h3 text-muted mb-4">By {{ $book->author }}</p>
            
            <div class="d-flex align-items-center mb-4">
                <span class="display-6 fw-bold text-primary me-4">${{ number_format($book->price, 2) }}</span>
                @if($book->stock_quantity > 0)
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                        <i class="bi bi-check2-circle me-1"></i> {{ $book->stock_quantity }} Available
                    </span>
                @else
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2">
                        <i class="bi bi-x-circle me-1"></i> Currently Out of Stock
                    </span>
                @endif
            </div>

            <hr class="my-4 opacity-10">

            <div class="row mb-4">
                <div class="col-6">
                    <small class="text-uppercase text-muted d-block">Genre</small>
                    <span class="fw-bold">{{ $book->genre ?? 'General' }}</span>
                </div>
                <div class="col-6">
                    <small class="text-uppercase text-muted d-block">ISBN</small>
                    <span class="fw-bold">{{ $book->isbn }}</span>
                </div>
            </div>

            <h5 class="fw-bold">Description</h5>
            <p class="text-secondary lead mb-5" style="line-height: 1.8;">
                {{ $book->description ?: 'No description provided for this book.' }}
            </p>

            <div class="d-flex gap-3 mt-5">
                {{-- Authentication Check for Add to Cart --}}
                @auth
                    <form action="{{ route('cart.add', $book->id) }}" method="POST" class="flex-grow-1">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg px-5 shadow w-100" {{ $book->stock_quantity <= 0 ? 'disabled' : '' }}>
                            <i class="bi bi-cart-plus me-2"></i> Add to Cart
                        </button>
                    </form>
                @else
                    <div class="flex-grow-1">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 shadow w-100 {{ $book->stock_quantity <= 0 ? 'disabled' : '' }}">
                            <i class="bi bi-lock me-2"></i> Login to Buy
                        </a>
                    </div>
                @endauth

                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-lg" title="Back to Shop">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection