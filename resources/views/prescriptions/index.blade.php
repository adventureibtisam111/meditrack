@extends('layout')

@section('content')

<h2>💊 Prescriptions List</h2>

<a href="/prescriptions/create" class="btn btn-success mb-3">+ Add Prescription</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Medicine</th>
            <th>Dosage</th>
        </tr>
    </thead>

    <tbody>
        @foreach($prescriptions as $p)
        <tr>
            <td>{{ $p->doctor->name }}</td>
            <td>{{ $p->patient->name }}</td>
            <td>{{ $p->medicine_name }}</td>
            <td>{{ $p->dosage }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection