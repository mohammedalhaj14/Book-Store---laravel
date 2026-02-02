@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Customer Management</h2>
        <div class="text-muted">Total Active Customers: {{ $customers->total() }}</div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="card-header bg-white py-3 border-bottom-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="bi bi-people me-2 text-primary"></i>Customer Directory
                </h5>
                {{-- Optional: Search Placeholder --}}
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" class="form-control" placeholder="Search customers...">
                    <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="ps-4 py-3">Name</th>
                        <th>Email Address</th>
                        <th>Join Date</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3 d-none d-md-block">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="fw-bold text-dark">{{ $customer->name }}</div>
                            </div>
                        </td>
                        <td>
                            <a href="mailto:{{ $customer->email }}" class="text-decoration-none text-muted">
                                {{ $customer->email }}
                            </a>
                        </td>
                        <td>
                            <span class="text-muted small">
                                <i class="bi bi-calendar3 me-1"></i>{{ $customer->created_at->format('M d, Y') }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group shadow-sm">
                                {{-- View Details Button --}}
                                <a href="{{ route('admin.customers.show', $customer->id) }}" 
                                   class="btn btn-white border btn-sm px-3" 
                                   title="View Customer Profile">
                                    <i class="bi bi-eye text-primary"></i>
                                </a>

                                {{-- Delete Button with Form --}}
                                <form action="{{ route('admin.customers.destroy', $customer->id) }}" 
                                      method="POST" 
                                      class="d-inline" 
                                      onsubmit="return confirm('Delete this customer account permanently? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-white border btn-sm px-3" title="Delete Customer">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="bi bi-person-x display-4 mb-3"></i>
                            <p>No customers found in the directory.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white border-0 py-4 d-flex justify-content-center">
            {{ $customers->links() }}
        </div>
    </div>
</div>

<style>
    body { background-color: #f4f7f6; }
    .btn-white { background-color: #fff; color: #333; }
    .btn-white:hover { background-color: #f8f9fa; }
    .table tbody tr { transition: all 0.2s ease; }
    .table tbody tr:hover { background-color: #fdfdfd; }
</style>
@endsection