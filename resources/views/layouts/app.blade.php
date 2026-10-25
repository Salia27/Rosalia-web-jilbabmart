<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jilbab Mart - Premium & Elegant Hijab Store</title>
    <!-- Bootstrap 5 & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --deep-navy: #082052;
            --warm-cream: #F8F0E5;
            --cream-card: #FFFFFF;
            --text-dark: #082052;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--warm-cream);
            color: var(--text-dark);
        }

        /* Navbar Palette #082052 */
        .navbar-custom {
            background-color: var(--deep-navy);
            box-shadow: 0 4px 20px rgba(8, 32, 82, 0.15);
        }

        .brand-logo {
            font-weight: 800;
            font-size: 1.4rem;
            color: var(--warm-cream);
            text-decoration: none;
            letter-spacing: 0.5px;
        }
        .brand-logo span {
            color: #ffffff;
        }

        /* Custom Button Cream & Navy */
        .btn-cream {
            background-color: var(--warm-cream);
            color: var(--deep-navy);
            font-weight: 700;
            border: none;
            border-radius: 50rem;
            transition: all 0.25s ease;
        }
        .btn-cream:hover {
            background-color: #ffffff;
            color: var(--deep-navy);
            box-shadow: 0 4px 12px rgba(8, 32, 82, 0.2);
            transform: translateY(-2px);
        }

        .btn-navy-outline {
            border: 1.5px solid var(--warm-cream);
            color: var(--warm-cream);
            font-weight: 600;
            border-radius: 50rem;
            transition: all 0.25s ease;
        }
        .btn-navy-outline:hover {
            background-color: var(--warm-cream);
            color: var(--deep-navy);
        }

        .btn-navy-solid {
            background-color: var(--deep-navy);
            color: var(--warm-cream);
            font-weight: 700;
            border-radius: 50rem;
            border: none;
            transition: all 0.25s ease;
        }
        .btn-navy-solid:hover {
            background-color: #0d2a6b;
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(8, 32, 82, 0.25);
        }

        /* Product Card Aesthetic */
        .product-card {
            background: var(--cream-card);
            border: 1px solid rgba(8, 32, 82, 0.08);
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 28px rgba(8, 32, 82, 0.12);
        }
        .product-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 100%;
            background: #f3ece3;
            overflow: hidden;
        }
        .product-img-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .product-card:hover .product-img-wrapper img {
            transform: scale(1.05);
        }
        .badge-category {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--deep-navy);
            color: var(--warm-cream);
            font-weight: 700;
            font-size: 0.75rem;
            padding: 6px 14px;
            border-radius: 50rem;
        }

        /* Footer */
        footer {
            background-color: var(--deep-navy);
            color: var(--warm-cream);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar Deep Navy -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top py-3">
        <div class="container">
            <a class="brand-logo d-flex align-items-center gap-2" href="{{ route('home') }}">
                <div class="bg-white text-navy rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; color: #082052;">
                    <i class="fa-solid fa-sparkles fs-6"></i>
                </div>
                <span>Jilbab</span>Mart
            </a>

            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <i class="fa-solid fa-bars text-white fs-4"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="ms-auto d-flex align-items-center gap-3 mt-3 mt-lg-0">
                    @auth
                        <div class="d-flex align-items-center gap-2 px-3 py-1.5 rounded-pill" style="background: rgba(248, 240, 229, 0.15); border: 1px solid rgba(248, 240, 229, 0.2);">
                            <i class="fa-solid fa-circle-user text-white"></i>
                            <span class="small fw-semibold text-white">{{ Auth::user()->name }}</span>
                        </div>

                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.orders') }}" class="btn btn-navy-outline btn-sm px-3">
                                <i class="fa-solid fa-chart-line me-1"></i> Dashboard Admin
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-cream btn-sm px-3">
                                <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-navy-outline btn-sm px-4">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-cream btn-sm px-4">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container my-4 flex-grow-1">
        @if(session('success'))
            <div class="alert border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-2" style="background-color: #d1e7dd; color: #0f5132;">
                <i class="fa-solid fa-circle-check fs-5"></i> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-2" style="background-color: #f8d7da; color: #842029;">
                <i class="fa-solid fa-circle-exclamation fs-5"></i> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center py-3" style="background-color: #082052; color: #F8F0E5;">
    <p class="mb-0 small">&copy; 2026 Jilbab Mart. All Rights Reserved.</p>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>