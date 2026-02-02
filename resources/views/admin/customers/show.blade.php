@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Customer Profile</h2>
            <p class="text-muted">Managing account: <strong>{{ $customer->name }}</strong></p>
        </div>
        <a href="{{ route('admin.customers') }}" class="btn btn-light shadow-sm border">
            <i class="bi bi-arrow-left me-2"></i>Back to Directory
        </a>
    </div>

    <div class="row g-4">
        {{-- Account Details Card --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center py-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-person-fill fs-1"></i>
                    </div>
                    <h4 class="fw-bold mb-1">{{ $customer->name }}</h4>
                    <p class="text-muted small mb-3">Customer since {{ $customer->created_at->format('M Y') }}</p>
                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Active Account</span>
                </div>
                <hr class="dropdown-divider m-0">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="small text-muted text-uppercase fw-bold">Email Address</label>
                        <p class="mb-0 text-dark fw-semibold">{{ $customer->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted text-uppercase fw-bold">Total Orders</label>
                        <p class="mb-0 text-dark fw-semibold">{{ $customer->orders->count() }} Orders</p>
                    </div>
                    <div class="mb-0">
                        <label class="small text-muted text-uppercase fw-bold">Joined On</label>
                        <p class="mb-0 text-dark fw-semibold">{{ $customer->created_at->format('F d, Y') }}</p>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 py-3">
                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Danger: This will permanently delete this customer account.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100 fw-bold">
                            <i class="bi bi-trash me-2"></i>Delete Account
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Order History Card --}}
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold text-dark"><i class="bi bi-bag-check me-2 text-primary"></i>Order History</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Order ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customer->orders as $order)
                            <tr>
                                <td class="ps-4 fw-bold">#{{ $order->id }}</td>
                                <td class="text-muted small">{{ $order->created_at->format('M d, Y') }}</td>
                                <td>
                                    @php
                                        $statusClass = match($order->status) {
                                            'completed' => 'success',
                                            'pending' => 'warning',
                                            'shipped' => 'info',
                                            'cancelled' => 'danger',
                                            default => 'secondary'
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $statusClass }} bg-opacity-10 text-{{ $statusClass }} text-capitalize px-3">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="text-end pe-4 fw-bold text-dark">${{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-cart-x display-6 mb-2"></i>
                                    <p class="mb-0">This customer hasn't placed any orders yet.</p>
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