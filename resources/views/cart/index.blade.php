@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="bi bi-cart3"></i> Your Shopping Cart</h1>
        <a href="/" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Continue Shopping
        </a>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4 py-3">Book</th>
                            <th class="py-3">Price</th>
                            <th class="py-3">Quantity</th>
                            <th class="py-3 text-end">Subtotal</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach(session('cart') as $id => $details)
                            @php 
                                $subtotal = $details['price'] * $details['quantity'];
                                $total += $subtotal;
                            @endphp
                            <tr class="align-middle">
                                <td class="ps-4">
                                    <div class="fw-bold">{{ $details['title'] }}</div>
                                </td>
                                <td>${{ number_format($details['price'], 2) }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <form action="{{ route('update.cart') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="hidden" name="quantity" value="{{ $details['quantity'] - 1 }}">
                                            <button type="submit" class="btn btn-sm btn-outline-dark" {{ $details['quantity'] <= 1 ? 'disabled' : '' }}>
                                                <i class="bi bi-dash"></i>
                                            </button>
                                        </form>

                                        <span class="px-2 fw-bold">{{ $details['quantity'] }}</span>

                                        <form action="{{ route('update.cart') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="hidden" name="quantity" value="{{ $details['quantity'] + 1 }}">
                                            <button type="submit" class="btn btn-sm btn-outline-dark">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-end fw-bold text-primary">
                                    ${{ number_format($subtotal, 2) }}
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('remove.from.cart') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white py-4 pe-4">
                <div class="text-end">
                    <h4 class="mb-3">Grand Total: <span class="text-success">${{ number_format($total, 2) }}</span></h4>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg px-5 shadow">
                          Checkout <i class="bi bi-credit-card ms-2"></i>
                       </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 bg-white rounded shadow-sm">
            <i class="bi bi-cart-x text-muted" style="font-size: 4rem;"></i>
            <h3 class="mt-3">Your cart is empty</h3>
            <a href="/" class="btn btn-primary mt-3">Go to Shop</a>
        </div>
    @endif
</div>
@endsection