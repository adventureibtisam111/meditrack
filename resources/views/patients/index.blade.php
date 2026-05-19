@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>🧑‍🦽 Patients Management</h2>
    <a href="/patients/create" class="btn btn-success">+ Add Patient</a>
</div>

<!-- SEARCH -->
<form method="GET" action="{{ route('patients.index') }}" class="mb-3 d-flex">
    <input 
        type="text" 
        name="search" 
        value="{{ $search ?? '' }}" 
        class="form-control me-2" 
        placeholder="Search patients by name or age..."
    >
    <button class="btn btn-primary">Search</button>
</form>

<!-- TABLE -->
<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Age</th>

                    <!-- ✅ ADDED ILLNESS COLUMN -->
                    <th>Illness</th>

                    <th>Address</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($patients as $patient)
                    <tr>
                        <td class="fw-semibold">{{ $patient->name }}</td>

                        <td>
                            <span class="badge bg-dark">
                                {{ $patient->age }} yrs
                            </span>
                        </td>

                        <!-- ✅ ADDED ILLNESS DISPLAY -->
                        <td>
                            <span class="badge bg-danger">
                                {{ $patient->illness ?? 'Not set' }}
                            </span>
                        </td>

                        <td>{{ $patient->address }}</td>

                        <td>
                            <a href="/patients/{{ $patient->id }}/edit" 
                               class="btn btn-warning btn-sm">
                                ✏️ Edit
                            </a>

                            <form action="/patients/{{ $patient->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this patient?')">
                                    🗑 Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No patients found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection