@extends('layout')

@section('content')

<div class="card shadow-sm p-4">
    <h3 class="mb-3">➕ Add New Patient</h3>

    <form method="POST" action="{{ route('patients.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Patient Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter full name">
        </div>

        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" placeholder="e.g 25">
        </div>

        <!-- ✅ THIS IS WHAT WAS MISSING -->
        <div class="mb-3">
            <label class="form-label">Illness / Condition</label>
            <input type="text" name="illness" class="form-control" placeholder="e.g Malaria, Flu, Diabetes">
        </div>

        <!-- (OPTIONAL) Phone - remove if not used -->
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="+252...">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" placeholder="City / Area">
        </div>

        <button class="btn btn-success">💾 Save Patient</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection