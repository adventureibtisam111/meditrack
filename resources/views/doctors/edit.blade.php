@extends('layout')

@section('content')

<div class="card shadow-sm p-4">
    <h3 class="mb-3">✏️ Edit Doctor</h3>

    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Doctor Name</label>
            <input type="text" name="name" class="form-control" value="{{ $doctor->name }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Specialization</label>
            <input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
        </div>

        <button class="btn btn-success">
            ✅ Update Doctor
        </button>

        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>

@endsection