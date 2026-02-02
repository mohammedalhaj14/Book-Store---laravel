@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Category Management</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light shadow-sm">
            <i class="bi bi-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>

    {{-- 
       Note: The success/error alerts are removed from here 
       because they are already handled in admin.layouts.app 
    --}}

    <div class="row g-4">
        {{-- Add Category Form --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold text-primary">Add New Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Category Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                placeholder="e.g. Fiction, Science, Biography" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold py-2">
                                <i class="bi bi-plus-circle me-2"></i>Save Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Category Table --}}
        <div class="col-md-8">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="ps-4 py-3">Category Name</th>
                                <th>Total Books</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold text-dark">{{ $category->name }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-info bg-opacity-10 text-info px-3">
                                        {{ $category->books_count }} Books
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure? This will not work if books are assigned to this category.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-3">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    No categories found. Use the form on the left to add your first one!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body { background-color: #f4f7f6; }
    .card { border-radius: 12px; }
</style>
@endsection