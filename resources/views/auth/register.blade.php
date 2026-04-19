<!DOCTYPE html>
<html>
<head>
    <title>Register - MediTrack</title>

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

            <h3 class="text-center mb-3">📝 Create Account</h3>

            <p class="text-center text-muted mb-4">
                Join MediTrack hospital system
            </p>

            <form method="POST" action="/register">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Full name" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email address" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button class="btn btn-success w-100">
                    🧾 Register
                </button>
            </form>

            <div class="text-center mt-3">
                <small>
                    Already have an account?
                    <a href="/login">Login here</a>
                </small>
            </div>

        </div>

    </div>

</div>

</body>
</html>