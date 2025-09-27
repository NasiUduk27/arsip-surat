<!DOCTYPE html>
<html>

<head>
    <title>Arsip Surat</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #6c757d;
            font-weight: 500;
            padding: 1rem;
        }

        .sidebar .nav-link.active {
            color: #0d6efd;
            background-color: #e9f2ff;
            border-left: 3px solid #0d6efd;
            padding-left: calc(1rem - 3px);
        }

        .sidebar .nav-link:hover {
            background-color: #f1f1f1;
        }

        .sidebar .sidebar-heading {
            padding: 1rem;
            font-weight: 700;
            color: #343a40;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .modern-table {
            border-collapse: collapse;
            width: 100%;
        }

        .modern-table thead th {
            border-bottom: 2px solid #dee2e6;
            color: #495057;
        }

        .modern-table td,
        .modern-table th {
            padding: 1rem;
            vertical-align: middle;
        }

        .modern-table tbody tr {
            border-bottom: 1px solid #dee2e6;
        }

        .modern-table tbody tr:last-of-type {
            border-bottom: none;
        }

        .card {
            border: none;
            border-radius: 0.75rem;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class="sidebar p-3" style="width: 280px;">
            <h4 class="sidebar-heading">Menu</h4>
            <nav class="nav flex-column">
                <a class="nav-link {{ request()->is('/') || request()->is('surat*') ? 'active' : '' }}" href="{{ route('surat.index') }}">
                    <i class="fas fa-archive me-2"></i> Arsip
                </a>
                <a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                    <i class="fas fa-tags me-2"></i> Kategori Surat
                </a>
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">
                    <i class="fas fa-info-circle me-2"></i> About
                </a>
            </nav>
        </div>

        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
