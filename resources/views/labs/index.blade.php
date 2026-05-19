@extends('layout')

@section('content')

<h2>🧪 Lab Tests</h2>

<a href="/labs/create" class="btn btn-success mb-3">+ Add Lab Test</a>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>Patient</th>
            <th>Test</th>
            <th>Result</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($labs as $lab)
        <tr>
            <td class="fw-semibold">{{ $lab->patient->name ?? 'N/A' }}</td>
            <td>{{ $lab->test_name }}</td>

            <td>
                <span class="badge bg-info text-dark">
                    {{ $lab->result ?? 'Pending' }}
                </span>
            </td>

            <td>{{ $lab->test_date }}</td>

            <td>
                <a href="/labs/{{ $lab->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/labs/{{ $lab->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this lab test?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">No lab tests found</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection