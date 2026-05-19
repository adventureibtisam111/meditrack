@extends('layout')

@section('content')

<div class="card shadow-sm p-4">
    <h3 class="mb-3">✏️ Edit Patient</h3>

    <form method="POST" action="{{ route('patients.update', $patient->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Patient Name</label>
            <input type="text" name="name" class="form-control" value="{{ $patient->name }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" value="{{ $patient->age }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $patient->address }}">
        </div>

        <button class="btn btn-success">✅ Update Patient</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection