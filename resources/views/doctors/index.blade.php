@extends('layout')

@section('content')

<h2>👨‍⚕️ Doctors List</h2>

<!-- 🔍 SEARCH BOX -->
<form method="GET" action="{{ route('doctors.index') }}" class="mb-3 d-flex">
    <input 
        type="text" 
        name="search" 
        value="{{ $search ?? '' }}" 
        class="form-control me-2" 
        placeholder="Search doctors..."
    >

    <button class="btn btn-primary">Search</button>
</form>

<!-- ➕ ADD BUTTON -->
<a href="/doctors/create" class="btn btn-success mb-3">+ Add Doctor</a>

<!-- 📋 TABLE -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Specialization</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($doctors as $doctor)
        <tr>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->specialization }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>
                <a href="/doctors/{{ $doctor->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection