<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MediTrack SaaS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fb;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #0f172a;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .nav-item {
            padding: 10px 12px;
            border-radius: 8px;
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            margin-bottom: 8px;
        }

        .nav-item:hover {
            background: #1e293b;
            color: white;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            padding: 25px;
        }

        /* CARDS */
        .stat-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>🏥 MediTrack</h2>

    <a href="/dashboard" class="nav-item">📊 Dashboard</a>
    <a href="/doctors" class="nav-item">👨‍⚕️ Doctors</a>
    <a href="/patients" class="nav-item">🧑‍🦽 Patients</a>
    <a href="/appointments" class="nav-item">📅 Appointments</a>
    <a href="/labs" class="nav-item">🧪 Labs</a>
    <a href="/prescriptions" class="nav-item">💊 Prescriptions</a>
</div>

<!-- MAIN CONTENT -->
<div class="main">

    @yield('content')

</div>

</body>
</html>