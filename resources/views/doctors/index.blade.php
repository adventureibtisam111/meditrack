@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>👨‍⚕️ Doctors Management</h2>
    <a href="/doctors/create" class="btn btn-success">+ Add Doctor</a>
</div>

<!-- SEARCH -->
<form method="GET" action="{{ route('doctors.index') }}" class="mb-3 d-flex">
    <input 
        type="text" 
        name="search" 
        value="{{ $search ?? '' }}" 
        class="form-control me-2" 
        placeholder="Search doctors by name or specialization..."
    >
    <button class="btn btn-primary">Search</button>
</form>

<!-- TABLE CARD -->
<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Phone</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($doctors as $doctor)
                    <tr>
                        <td class="fw-semibold">{{ $doctor->name }}</td>

                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $doctor->specialization }}
                            </span>
                        </td>

                        <td>{{ $doctor->phone }}</td>

                        <td>
                            <a href="/doctors/{{ $doctor->id }}/edit" 
                               class="btn btn-warning btn-sm">
                                ✏️ Edit
                            </a>

                            <form action="/doctors/{{ $doctor->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this doctor?')">
                                    🗑 Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No doctors found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection