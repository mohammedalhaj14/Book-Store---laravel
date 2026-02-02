@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            {{-- Message Header --}}
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('admin.messages') }}" class="btn btn-outline-secondary btn-sm me-3">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <h4 class="mb-0">Message Details</h4>
            </div>

            {{-- Customer Message Card --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">{{ $message->name }}</h5>
                            <p class="text-muted mb-0 small"><i class="bi bi-envelope me-1"></i>{{ $message->email }}</p>
                        </div>
                        <span class="text-muted small">{{ $message->created_at->format('M d, Y - h:i A') }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold text-uppercase small text-muted mb-3">Subject:</h6>
                    <p class="fs-5 fw-bold mb-4">{{ $message->subject ?? 'No Subject Provided' }}</p>
                    
                    <h6 class="fw-bold text-uppercase small text-muted mb-2">Inquiry:</h6>
                    <div class="p-4 bg-light rounded text-dark">
                        {{ $message->message }}
                    </div>
                </div>
            </div>

            {{-- Reply Form Card --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0"><i class="bi bi-reply-fill me-2"></i>Send Reply</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reply_body" class="form-label fw-bold">Email Content</label>
                            <textarea name="reply_body" id="reply_body" class="form-control" rows="6" 
                                      placeholder="Write your response to {{ $message->name }} here..." required></textarea>
                            <div class="form-text mt-2 text-muted">
                                <i class="bi bi-info-circle me-1"></i> 
                                Clicking send will deliver this message as a plain-text email to <strong>{{ $message->email }}</strong>.
                            </div>
                        </div>
                        
                        <div class="d-grid d-md-flex justify-content-md-end gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-send-fill me-2"></i>Send Email
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection