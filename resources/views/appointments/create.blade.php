@extends('layout')

@section('content')
<div class="card shadow-sm p-4">

    <h3 class="mb-3">Create Appointment</h3>

    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf

        {{-- Doctor --}}
        <div class="mb-3">
            <label class="form-label">Doctor</label>
            <select name="doctor_id" class="form-select">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">
                        {{ $doctor->name }} ({{ $doctor->specialization }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Patient --}}
        <div class="mb-3">
            <label class="form-label">Patient</label>
            <select name="patient_id" class="form-select">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Date --}}
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="appointment_date" class="form-control">
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <button class="btn btn-primary w-100">
            Save Appointment
        </button>

    </form>
</div>
@endsection