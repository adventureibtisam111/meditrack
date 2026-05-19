@extends('layout')

@section('content')

<div class="card shadow-sm p-4">
    <h3 class="mb-3">➕ Add New Doctor</h3>

    <form method="POST" action="{{ route('doctors.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Doctor Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter full name">
        </div>

        <div class="mb-3">
            <label class="form-label">Specialization</label>
            <input type="text" name="specialization" class="form-control" placeholder="e.g Cardiology">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="+252...">
        </div>

        <button class="btn btn-success">
            💾 Save Doctor
        </button>

        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>

@endsection