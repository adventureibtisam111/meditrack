@extends('layout')

@section('content')

<!-- HERO -->
<div class="p-5 bg-white rounded shadow-sm mb-4">
    <h1>🏥 MediTrack Hospital Management System </h1>
    <p class="text-muted">
        This is a centralized platform designed to manage patients, doctors, appointment, and prescriptions efficiently, securely and in real time.
    </p>
</div>

<!-- DASHBOARD CARDS -->
<div class="row g-3 mb-4 text-center">

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h5>👨‍⚕️ Doctors</h5>
            <p>Total: {{ $doctors }}</p>
            <a href="/doctors" class="btn btn-primary btn-sm">Open</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h5>🧑‍🦽 Patients</h5>
            <p>Total: {{ $patients }}</p>
            <a href="/patients" class="btn btn-primary btn-sm">Open</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h5>📅 Appointments</h5>
            <p>Total: {{ $appointments }}</p>
            <a href="/appointments" class="btn btn-primary btn-sm">Open</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h5>💊 Prescriptions</h5>
            <p>Total: {{ $prescriptions }}</p>
            <a href="/prescriptions" class="btn btn-primary btn-sm">Open</a>
        </div>
    </div>

</div>

<!-- INFO SECTION -->
<div class="row g-3">

    <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm">
            <h5>👨‍⚕️ Clinical Care</h5>
            <p class="text-muted">
                Manage doctors and patient records with structured workflows.
            </p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm">
            <h5>📅 Appointments</h5>
            <p class="text-muted">
                Schedule and track appointments efficiently.
            </p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm">
            <h5>💊 Prescriptions</h5>
            <p class="text-muted">
                Manage prescriptions for better patient care.
            </p>
        </div>
    </div>

</div>

@endsection