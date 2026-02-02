@extends('admin.layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-cart-check me-2"></i>Recent Orders</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Order ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th class="text-end pe-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td class="ps-4 fw-bold">#{{ $order->id }}</td>
                    <td>
                        {{-- Keep your fix for the user name --}}
                        {{ $order->user->name ?? 'Deleted User' }}
                    </td>
                    {{-- FIXED: Changed total_price to total_amount to match your database --}}
                    <td class="fw-bold text-primary">${{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'info') }} rounded-pill px-3">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="text-end pe-4">
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm d-inline-block w-auto">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $orders->links() }}
    </div>
</div>
@endsection