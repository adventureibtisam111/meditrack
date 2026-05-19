@extends('layout')

@section('content')

<h2>💊 Prescriptions List</h2>

<a href="/prescriptions/create" class="btn btn-success mb-3">+ Add Prescription</a>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Medicine</th>
            <th>Dosage</th>
        </tr>
    </thead>

    <tbody>
        @forelse($prescriptions as $p)
        <tr>
            <td>{{ $p->doctor->name ?? 'N/A' }}</td>
            <td>{{ $p->patient->name ?? 'N/A' }}</td>
            <td>{{ $p->medicine_name }}</td>
            <td>{{ $p->dosage }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">No prescriptions found</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection