@extends('layout')

@section('content')

<h2>✏️ Edit Appointment</h2>

<form action="/appointments/{{ $appointment->id }}" method="POST">
    @csrf
    @method('PUT')

    <!-- PATIENT -->
    <div class="mb-3">
        <label>Patient</label>
        <select name="patient_id" class="form-control" required>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}"
                    {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                    {{ $patient->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- DOCTOR -->
    <div class="mb-3">
        <label>Doctor</label>
        <select name="doctor_id" class="form-control" required>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}"
                    {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                    {{ $doctor->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- DATE -->
    <div class="mb-3">
        <label>Appointment Date</label>
        <input type="date" name="appointment_date"
               value="{{ $appointment->appointment_date }}"
               class="form-control" required>
    </div>

    <!-- STATUS -->
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>

    <button class="btn btn-primary">Update Appointment</button>
    <a href="/appointments" class="btn btn-secondary">Back</a>
</form>

@endsection