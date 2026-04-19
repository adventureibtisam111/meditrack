<!DOCTYPE html>
<html>
<head>
    <title>MediTrack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .navbar {
            padding: 10px 20px;
        }

        .nav-link {
            color: white !important;
            margin-right: 10px;
        }

        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">

    <a class="navbar-brand fw-bold" href="/">🏥 MediTrack</a>

    <div class="ms-auto d-flex align-items-center gap-2">

        @guest
            <a href="/login" class="btn btn-light btn-sm px-3">
                🔐 Login
            </a>

            <a href="/register" class="btn btn-outline-light btn-sm px-3">
                📝 Register
            </a>
        @endguest

        @auth
            <span class="text-white fw-semibold me-2">
                👤 {{ auth()->user()->name }}
            </span>

            <form method="POST" action="/logout" class="m-0">
                @csrf
                <button class="btn btn-danger btn-sm px-3">
                    🚪 Logout
                </button>
            </form>
        @endauth

    </div>

</nav>

<!-- PAGE CONTENT -->
<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>