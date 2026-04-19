@extends('layout')

@section('content')

<h2>📅 Appointments List</h2>

<!-- 🔍 SEARCH -->
<form method="GET" action="{{ route('appointments.index') }}" class="mb-3 d-flex">
    <input 
        type="text" 
        name="search" 
        value="{{ $search ?? '' }}" 
        class="form-control me-2" 
        placeholder="Search appointments..."
    >

    <button class="btn btn-primary">Search</button>
</form>

<!-- ➕ ADD BUTTON -->
<a href="/appointments/create" class="btn btn-success mb-3">+ Add Appointment</a>

<!-- 📢 SUCCESS MESSAGE -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- 📋 TABLE -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($appointments as $appointment)
        <tr>
            <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
            <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->status }}</td>

            <td>
                <a href="/appointments/{{ $appointment->id }}/edit" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="/appointments/{{ $appointment->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this appointment?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No appointments found</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection