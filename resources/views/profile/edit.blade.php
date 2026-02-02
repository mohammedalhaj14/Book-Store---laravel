@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="container py-5" style="font-family: 'Inter', sans-serif;">
    @if (session('status'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center mb-4 fade show" role="alert">
            <div class="bg-success text-white rounded-circle p-1 me-3 d-flex">
                <i class="bi bi-check-lg"></i>
            </div>
            <div class="fw-medium">{{ session('status') == 'profile-updated' ? 'Profile details saved.' : 'Security settings updated.' }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 20px;">
                <div class="card-body p-4 text-center">
                    <div class="position-relative d-inline-block mb-3">
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-circle shadow-sm" style="width: 80px; height: 80px;">
                            <i class="bi bi-person-fill fs-1"></i>
                        </div>
                        <span class="position-absolute bottom-0 end-0 bg-success border border-white border-3 rounded-circle" style="width: 18px; height: 18px;"></span>
                    </div>
                    <h5 class="fw-bold mb-0 text-truncate">{{ Auth::user()->name }}</h5>
                    <p class="text-muted small mb-3 text-truncate">{{ Auth::user()->email }}</p>
                    
                    <div class="nav flex-column nav-pills text-start" id="v-pills-tab" role="tablist">
                        <button class="nav-link active mb-2 py-2 px-3 border-0 text-start" data-bs-toggle="pill" data-bs-target="#profile-info">
                            <i class="bi bi-person-vcard me-2"></i> Profile Info
                        </button>
                        <button class="nav-link mb-2 py-2 px-3 border-0 text-start" data-bs-toggle="pill" data-bs-target="#user-orders">
                            <i class="bi bi-bag-check me-2"></i> My Orders
                        </button>
                        <button class="nav-link mb-2 py-2 px-3 border-0 text-start" data-bs-toggle="pill" data-bs-target="#password-update">
                            <i class="bi bi-shield-lock me-2"></i> Security
                        </button>
                        <button class="nav-link text-danger py-2 px-3 border-0 text-start" data-bs-toggle="pill" data-bs-target="#delete-account">
                            <i class="bi bi-trash3 me-2"></i> Delete Account
                        </button>
                    </div>

                    <hr class="my-4 text-muted opacity-25">
                    <a href="/" class="btn btn-light w-100 rounded-pill btn-sm fw-medium py-2">
                        <i class="bi bi-arrow-left me-1"></i> Back to Bookstore
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="tab-content" id="v-pills-tabContent">
                
                <div class="tab-pane fade show active" id="profile-info">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-transparent border-0 pt-4 px-4">
                            <h5 class="fw-bold mb-0">Profile Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf @method('patch')
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Full Name</label>
                                        <input type="text" name="name" class="form-control bg-light border-0 py-2" value="{{ old('name', $user->name) }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Email Address</label>
                                        <input type="email" name="email" class="form-control bg-light border-0 py-2" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-bold shadow-sm">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="user-orders">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-transparent border-0 pt-4 px-4">
                            <h5 class="fw-bold mb-0">Order History</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle border-0">
                                    <thead class="bg-light">
                                        <tr class="small text-uppercase text-muted">
                                            <th class="border-0 ps-3">Order ID</th>
                                            <th class="border-0">Date</th>
                                            <th class="border-0">Total</th>
                                            <th class="border-0">Status</th>
                                            <th class="border-0 text-end pe-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(Auth::user()->orders ?? [] as $order)
                                        <tr>
                                            <td class="ps-3 fw-bold text-dark">#ORD-{{ $order->id }}</td>
                                            <td class="text-muted small">{{ $order->created_at->format('M d, Y') }}</td>
                                            <td class="fw-bold text-primary">${{ number_format($order->total_amount, 2) }}</td>
                                            <td>
                                                @php
                                                    $statusColor = match($order->status) {
                                                        'completed' => 'success',
                                                        'pending' => 'warning',
                                                        'cancelled' => 'danger',
                                                        default => 'secondary'
                                                    };
                                                @endphp
                                                <span class="badge bg-{{ $statusColor }}-subtle text-{{ $statusColor }} rounded-pill px-3 py-2 text-capitalize">
                                                    {{ $order->status }}
                                                </span>
                                            </td>
                                            <td class="text-end pe-3">
                                                <button class="btn btn-white border shadow-sm btn-sm rounded-pill px-3 fw-medium" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#orderModal{{ $order->id }}">
                                                    Details
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="5" class="text-center py-5 text-muted">No orders found.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="password-update">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-transparent border-0 pt-4 px-4">
                            <h5 class="fw-bold mb-0">Security Settings</h5>
                        </div>
                        <div class="card-body p-4">
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf @method('put')
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Current Password</label>
                                    <input type="password" name="current_password" class="form-control bg-light border-0 py-2">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small fw-bold">New Password</label>
                                        <input type="password" name="password" class="form-control bg-light border-0 py-2">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small fw-bold">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" class="form-control bg-light border-0 py-2">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark px-4 py-2 rounded-3 fw-bold mt-2 shadow-sm">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="delete-account">
                    <div class="card border-0 shadow-sm border-start border-danger border-5 rounded-4 overflow-hidden">
                        <div class="card-body p-4 text-center py-5">
                            <h5 class="fw-bold text-danger">Delete Account?</h5>
                            <button class="btn btn-danger px-4 py-2 fw-bold rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">Yes, Delete Everything</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach(Auth::user()->orders ?? [] as $order)
<div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0">
                <h5 class="fw-bold">Receipt Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="bg-light rounded-3 p-3 mb-4">
                    <div class="d-flex justify-content-between mb-1 small">
                        <span class="text-muted">Order ID:</span>
                        <span class="fw-bold">#ORD-{{ $order->id }}</span>
                    </div>
                    <div class="d-flex justify-content-between small">
                        <span class="text-muted">Status:</span>
                        <span class="text-success fw-bold text-capitalize">{{ $order->status }}</span>
                    </div>
                </div>

                <h6 class="fw-bold small text-uppercase mb-3">Items Purchased</h6>
                <div class="list-group list-group-flush mb-3">
                    @foreach($order->items ?? [] as $item)
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0 border-light">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary-subtle text-primary rounded p-2 me-3"><i class="bi bi-book"></i></div>
                            <div>
                                <p class="mb-0 fw-bold small">{{ $item->book->title ?? 'Book Item' }}</p>
                                <small class="text-muted">Qty: {{ $item->quantity }}</small>
                            </div>
                        </div>
                        <span class="fw-bold small">${{ number_format($item->price, 2) }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Total Amount Paid</span>
                    <span class="h4 fw-bold text-primary mb-0">${{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>
            <div class="modal-footer border-0 d-flex gap-2">
                <button type="button" class="btn btn-light rounded-pill flex-grow-1 fw-bold" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('orders.download', $order->id) }}" class="btn btn-primary rounded-pill flex-grow-1 fw-bold">
                    <i class="bi bi-download me-2"></i>Download PDF
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
    body { background-color: #f4f7f9; }
    .nav-pills .nav-link { color: #64748b; border-radius: 12px; transition: 0.2s; font-weight: 500; }
    .nav-pills .nav-link.active { background-color: #0d6efd; box-shadow: 0 10px 15px -3px rgba(13, 110, 253, 0.2); color: white !important; }
    .badge { font-weight: 600; font-size: 0.75rem; }
</style>
@endsection