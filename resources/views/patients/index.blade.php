@extends('layout')

@section('content')

<h2>🧑‍⚕️ Patients List</h2>

<!-- 🔍 SEARCH -->
<form method="GET" action="{{ route('patients.index') }}" class="mb-3 d-flex">
    <input 
        type="text" 
        name="search" 
        value="{{ $search ?? '' }}" 
        class="form-control me-2" 
        placeholder="Search patients..."
    >

    <button class="btn btn-primary">Search</button>
</form>

<!-- ➕ ADD BUTTON -->
<a href="/patients/create" class="btn btn-success mb-3">+ Add Patient</a>

<!-- 📢 SUCCESS -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- 📋 TABLE -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($patients as $patient)
        <tr>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->age }}</td>

            <td>
                <a href="/patients/{{ $patient->id }}/edit" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="/patients/{{ $patient->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this patient?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No patients found</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection