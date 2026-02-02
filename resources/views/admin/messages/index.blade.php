@extends('admin.layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Customer Inquiries</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr>
                    <td><strong>{{ $msg->name }}</strong><br><small>{{ $msg->email }}</small></td>
                    <td>{{ $msg->subject }}</td>
                    <td>{{ $msg->created_at->diffForHumans() }}</td>
                    <td class="text-end">
                        {{-- 1. READ/REPLY ACTION --}}
                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-outline-primary">Read</a>

                        {{-- 2. DELETE ACTION --}}
                        <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted">No messages found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection