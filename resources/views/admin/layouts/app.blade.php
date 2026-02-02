<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; min-height: 100vh; display: flex; flex-direction: column; }
        .admin-nav { background: #1e1e2d; }
        .nav-link { color: rgba(255,255,255,0.7) !important; font-weight: 500; transition: 0.3s; padding: 0.5rem 1rem; }
        .nav-link:hover, .nav-link.active { color: #fff !important; background: rgba(255,255,255,0.1); border-radius: 5px; }
        .main-content { flex: 1; padding: 2rem 0; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark admin-nav shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-shield-lock-fill me-2"></i>ADMIN CENTER
            </a>
            
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-box-seam me-1"></i> Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.orders') ? 'active' : '' }}" href="{{ route('admin.orders') }}">
                            <i class="bi bi-cart-check me-1"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.customers') ? 'active' : '' }}" href="{{ route('admin.customers') }}">
                            <i class="bi bi-people me-1"></i> Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.messages') ? 'active' : '' }}" href="{{ route('admin.messages') }}">
                            <i class="bi bi-chat-left-dots me-1"></i> Messages
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3">
                        <a href="{{ route('books.index') }}" class="btn btn-outline-info btn-sm px-3 rounded-pill">View Shop</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>