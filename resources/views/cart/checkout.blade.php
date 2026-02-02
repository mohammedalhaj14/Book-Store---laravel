@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Shipping Information</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Address</label>
                            <textarea name="address" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg w-100 mt-3 shadow">
                            Confirm Order & Pay
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h5>Order Summary</h5>
                    <hr>
                    @foreach(session('cart') as $id => $details)
                        <div class="d-flex justify-content-between mb-2 small">
                            <span>{{ $details['title'] }} (x{{ $details['quantity'] }})</span>
                            <span>${{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection