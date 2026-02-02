@extends('layouts.app')

@section('content')
<div class="row">
    {{-- Sidebar: Genres --}}
    <div class="col-md-3 mb-4">
        <h5 class="fw-bold mb-3">Genres</h5>
        <div class="list-group shadow-sm border-0">
            <a href="{{ route('books.index') }}" class="list-group-item list-group-item-action {{ !request('category') ? 'active' : '' }}">
                All Books
            </a>
            @foreach($categories as $category)
                <a href="{{ route('books.index', ['category' => $category->slug]) }}" 
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('category') == $category->slug ? 'active' : '' }}">
                    {{ $category->name }}
                    <span class="badge rounded-pill {{ request('category') == $category->slug ? 'bg-light text-primary' : 'bg-primary' }}">
                        {{ $category->books_count }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>

    {{-- Main Content: Book Collection --}}
    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold">Available Collection</h1>
            <span class="text-muted small">{{ $books->total() }} Books Found</span>
        </div>

        <div class="row">
            @forelse($books as $book)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div style="height: 280px; overflow: hidden; background-color: #f8f9fa;">
                        @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" 
                                 class="card-img-top w-100 h-100" 
                                 style="object-fit: cover;" 
                                 alt="{{ $book->title }}">
                        @else
                            <div class="d-flex flex-column align-items-center justify-content-center h-100 text-muted">
                                <i class="bi bi-book mb-2" style="font-size: 2.5rem;"></i>
                                <span class="small">No Cover</span>
                            </div>
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title h6 mb-1 text-truncate" title="{{ $book->title }}">{{ $book->title }}</h5>
                        <p class="small text-muted mb-3">By {{ $book->author }}</p>
                        
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-primary fs-5">${{ number_format($book->price, 2) }}</span>
                                <span class="badge {{ $book->stock_quantity > 0 ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-danger-subtle text-danger border border-danger-subtle' }} small px-2">
                                    {{ $book->stock_quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="{{ route('books.show', $book) }}" class="btn btn-outline-secondary btn-sm">Details</a>
                                
                                {{-- Authentication Check for Cart Action --}}
                                @auth
                                    <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm w-100 shadow-sm" {{ $book->stock_quantity <= 0 ? 'disabled' : '' }}>
                                            <i class="bi bi-cart-plus me-1"></i> Add to Cart
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm w-100 shadow-sm {{ $book->stock_quantity <= 0 ? 'disabled' : '' }}">
                                        <i class="bi bi-lock me-1"></i> Login to Buy
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-search display-1 text-muted opacity-25"></i>
                <p class="text-muted mt-3">No books found matching those criteria.</p>
                <a href="{{ route('books.index') }}" class="btn btn-link">Clear Filters</a>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if(method_exists($books, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $books->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection