@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Store Management</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.categories') }}" class="btn btn-outline-primary shadow-sm px-4">
                <i class="bi bi-tags me-2"></i>Manage Categories
            </a>
            <a href="{{ route('admin.books.create') }}" class="btn btn-primary shadow-sm px-4">
                <i class="bi bi-plus-lg me-2"></i>Add New Book
            </a>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded p-3 me-3">
                        <i class="bi bi-book fs-3"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">{{ $booksCount }}</h4>
                        <span class="text-muted small">Total Books</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 text-success rounded p-3 me-3">
                        <i class="bi bi-grid fs-3"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">{{ $categoriesCount }}</h4>
                        <span class="text-muted small">Active Categories</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="ps-4 py-3">Book Preview</th>
                        <th>Category</th>
                        <th>Genre/ISBN</th>
                        <th>Pricing</th>
                        <th>Inventory</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center">
                                {{-- UPDATED: Use asset('storage/...') to show uploaded images --}}
                                <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://via.placeholder.com/50x75?text=No+Cover' }}" 
                                     class="rounded shadow-sm me-3 border" 
                                     style="width: 50px; height: 75px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark text-truncate" style="max-width: 200px;">{{ $book->title }}</h6>
                                    <small class="text-muted">by {{ $book->author }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-secondary border px-3 py-2">
                                {{ $book->category->name ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td>
                            <div class="small fw-bold text-uppercase">{{ $book->genre }}</div>
                            <div class="small text-muted">{{ $book->isbn }}</div>
                        </td>
                        <td>
                            <span class="fw-bold text-dark fs-5">${{ number_format($book->price, 2) }}</span>
                        </td>
                        <td>
                            @php $qty = $book->stock_quantity @endphp
                            
                            @if($qty <= 0)
                                <div class="text-danger fw-bold small">
                                    <i class="bi bi-x-circle-fill me-1"></i>Out of Stock
                                </div>
                            @elseif($qty < 5)
                                <div class="text-warning fw-bold small">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>Low: {{ $qty }}
                                </div>
                            @else
                                <div class="text-success small">
                                    <i class="bi bi-check-circle-fill me-1"></i>{{ $qty }} Units
                                </div>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group shadow-sm">
                                <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-white border btn-sm px-3" title="Edit Book">
                                    <i class="bi bi-pencil text-primary"></i>
                                </a>

                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this book permanently?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-white border btn-sm px-3" title="Delete Book">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox display-4 d-block mb-3"></i>
                            No books found in inventory. <a href="{{ route('admin.books.create') }}">Add your first book!</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        @if($books->hasPages())
        <div class="card-footer bg-white border-0 py-4 d-flex justify-content-center">
            {{ $books->links() }}
        </div>
        @endif
    </div>
</div>

<style>
    body { background-color: #f4f7f6; }
    .table tbody tr { transition: all 0.2s ease; }
    .table tbody tr:hover { background-color: #fafafa; }
    .btn-white { background: #fff; }
    .btn-white:hover { background: #f8f9fa; }
    .pagination { margin-bottom: 0; }
</style>
@endsection