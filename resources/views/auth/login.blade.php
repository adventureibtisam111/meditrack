<!DOCTYPE html>
<html>
<head>
    <title>Login - MediTrack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .auth-card {
            max-width: 420px;
            margin: 80px auto;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <h3 class="text-center mb-3">🏥 MediTrack Login</h3>

            <p class="text-center text-muted mb-4">
                Welcome back! Please login to continue.
            </p>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>

                <button class="btn btn-primary w-100">
                    🔐 Login
                </button>
            </form>

            <div class="text-center mt-3">
                <small>
                    Don't have an account?
                    <a href="/register">Register here</a>
                </small>
            </div>

        </div>

    </div>

</div>

</body>
</html>