@extends('layout')

@section('content')

<h2>📅 Appointments List</h2>

<!-- 🔍 SEARCH + FILTER -->
<form method="GET" action="{{ route('appointments.index') }}" class="mb-3 d-flex gap-2">

    <input 
        type="text" 
        name="search" 
        value="{{ request('search') }}" 
        class="form-control" 
        placeholder="Search by patient or doctor..."
    >

    <select name="status" class="form-control">
        <option value="">All Status</option>
        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>

    <button class="btn btn-primary">Filter</button>
</form>

<a href="/appointments/create" class="btn btn-success mb-3">+ Add Appointment</a>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered table-hover">
    <thead class="table-primary">
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

            <td>
                <span class="badge bg-warning text-dark">
                    {{ $appointment->status }}
                </span>
            </td>

            <td>
                <a href="/appointments/{{ $appointment->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/appointments/{{ $appointment->id }}" method="POST" class="d-inline">
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
            <td colspan="5" class="text-center text-muted">
                No appointments found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection