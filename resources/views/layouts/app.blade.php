<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { display: flex; flex-direction: column; min-height: 100vh; background-color: #f0f2f5; font-family: 'Inter', sans-serif; }
        main { flex: 1; }
        .navbar { border-bottom: 1px solid #e3e6f0; }
        .navbar-brand { font-weight: 800; letter-spacing: 1px; color: #0d6efd !important; }
        .nav-link { font-weight: 500; color: #4e73df; }
        .nav-link:hover { color: #224abe; }
        footer { background-color: #ffffff; border-top: 1px solid #dee2e6; }
        .alert { border: none; border-radius: 12px; }
        
        /* Dropdown Animation */
        .animate { animation-duration: 0.2s; animation-fill-mode: both; }
        @keyframes slideIn {
            0% { transform: translateY(1rem); opacity: 0; }
            100% { transform: translateY(0rem); opacity: 1; }
        }
        .slideIn { animation-name: slideIn; }

        /* Chatbot Styling */
        #chatbot-container { position: fixed; bottom: 20px; right: 20px; z-index: 1050; }
        #chat-window { width: 350px; border-radius: 15px; position: absolute; bottom: 80px; right: 0; overflow: hidden; }
        #chat-body { height: 350px; overflow-y: auto; background: #f8f9fa; font-size: 0.9rem; scroll-behavior: smooth; }
        .chat-bubble { max-width: 85%; padding: 8px 12px; border-radius: 15px; margin-bottom: 10px; display: inline-block; }
        .bubble-bot { background: white; color: #333; border: 1px solid #dee2e6; border-bottom-left-radius: 2px; }
        .bubble-user { background: #0d6efd; color: white; border-bottom-right-radius: 2px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('books.index') }}">
                <i class="bi bi-book-half"></i> BOOKSTORE
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="{{ route('books.index') }}" method="GET" class="d-flex mx-auto mt-2 mt-lg-0 w-50">
                    <div class="input-group">
                        <input class="form-control rounded-start-pill border-end-0" type="search" name="search" placeholder="Find your next favorite book..." value="{{ request('search') }}">
                        <button class="btn btn-outline-primary rounded-end-pill border-start-0" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pages.about') }}">About</a></li>
                    
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="btn btn-primary btn-sm ms-lg-2 rounded-pill px-3" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 animate slideIn">
                                @if(Auth::user()->role == 1)
                                    <li><a class="dropdown-item fw-bold text-primary" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Admin Panel</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2"></i>Profile Settings</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ms-lg-3">
                            <a href="{{ route('cart.index') }}" class="btn btn-light position-relative rounded-circle shadow-sm">
                                <i class="bi bi-cart3"></i>
                                @if(session('cart') && count(session('cart')) > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-light">
                                        {{ count(session('cart')) }}
                                    </span>
                                @endif
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    {{-- SMART AI CHATBOT WIDGET --}}
    @auth
    <div id="chatbot-container">
        <button id="chat-open-btn" class="btn btn-primary rounded-circle shadow-lg" style="width: 60px; height: 60px;">
            <i class="bi bi-chat-dots-fill fs-3"></i>
        </button>

        <div id="chat-window" class="card shadow-lg d-none">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span class="fw-bold"><i class="bi bi-robot me-2"></i>BookBot AI</span>
                <button type="button" class="btn-close btn-close-white" id="chat-close-btn"></button>
            </div>
            <div id="chat-body" class="card-body">
                <div class="text-start">
                    <div class="chat-bubble bubble-bot shadow-sm">
                        Hi {{ Auth::user()->name }}! I'm BookBot. How can I help you today?
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="input-group">
                    <input type="text" id="chat-input" class="form-control border-end-0" placeholder="Ask about books...">
                    <button class="btn btn-primary border-start-0" id="chat-send-btn">
                        <i class="bi bi-send"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <footer class="py-4 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-muted mb-0 small">&copy; {{ date('Y') }} Bookstore App. Built with Laravel.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <a href="{{ route('pages.contact') }}" class="text-decoration-none text-muted small me-3">Contact Us</a>
                    <a href="{{ route('pages.about') }}" class="text-decoration-none text-muted small">About Us</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Chatbot Logic --}}
    @auth
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openBtn = document.getElementById('chat-open-btn');
            const closeBtn = document.getElementById('chat-close-btn');
            const windowEl = document.getElementById('chat-window');
            const sendBtn = document.getElementById('chat-send-btn');
            const input = document.getElementById('chat-input');
            const body = document.getElementById('chat-body');

            openBtn.onclick = () => windowEl.classList.toggle('d-none');
            closeBtn.onclick = () => windowEl.classList.add('d-none');

            async function sendMessage() {
                const text = input.value.trim();
                if (!text) return;

                // User Message
                body.innerHTML += `<div class="text-end"><div class="chat-bubble bubble-user shadow-sm">${text}</div></div>`;
                input.value = '';
                body.scrollTop = body.scrollHeight;

                // Loading Indicator
                const loadingId = 'loading-' + Date.now();
                body.innerHTML += `<div class="text-start" id="${loadingId}"><div class="chat-bubble bubble-bot shadow-sm"><div class="spinner-grow spinner-grow-sm text-primary" role="status"></div></div></div>`;
                body.scrollTop = body.scrollHeight;

                try {
                    const response = await fetch("{{ route('chat.ask') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ message: text })
                    });
                    const data = await response.json();
                    
                    document.getElementById(loadingId).remove();
                    
                    // Bot Response
                    body.innerHTML += `<div class="text-start"><div class="chat-bubble bubble-bot shadow-sm">${data.reply}</div></div>`;
                    body.scrollTop = body.scrollHeight;
                } catch (error) {
                    document.getElementById(loadingId).innerHTML = `<div class="chat-bubble bubble-bot text-danger">Sorry, I'm offline.</div>`;
                }
            }

            sendBtn.onclick = sendMessage;
            input.onkeypress = (e) => { if(e.key === 'Enter') sendMessage(); };
        });
    </script>
    @endauth
</body>
</html>