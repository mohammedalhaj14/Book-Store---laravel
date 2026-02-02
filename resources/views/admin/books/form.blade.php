@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">{{ isset($book) ? 'Edit Book' : 'Add New Book' }}</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Back</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            {{-- CRITICAL: enctype="multipart/form-data" for file uploads --}}
            <form action="{{ isset($book) ? route('admin.books.update', $book->id) : route('admin.books.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($book)) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Book Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Author</label>
                        <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">ISBN</label>
                        <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn ?? '') }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category_id" class="form-select">
                            <option value="" selected disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (isset($book) && $book->category_id == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Genre</label>
                        <input type="text" name="genre" class="form-control" value="{{ old('genre', $book->genre ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $book->price ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Stock Quantity</label>
                        <input type="number" name="stock_quantity" class="form-control" value="{{ old('stock_quantity', $book->stock_quantity ?? '') }}" required>
                    </div>

                    {{-- Image Upload Field - Using cover_image column --}}
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Book Cover Image</label>
                        @if(isset($book) && $book->cover_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" style="height: 120px;" class="rounded shadow-sm">
                            </div>
                        @endif
                        <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                        @error('cover_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $book->description ?? '') }}</textarea>
                    </div>

                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary px-5">Save Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection