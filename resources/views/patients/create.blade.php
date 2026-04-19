@extends('layout')

@section('content')

<h2>Add Patient</h2>

<form method="POST" action="{{ route('patients.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>

    <input type="number" name="age" placeholder="Age" class="form-control mb-2" required>

    <input type="text" name="illness" placeholder="Illness" class="form-control mb-2">

    <input type="text" name="address" placeholder="Address" class="form-control mb-2">

    <button class="btn btn-success">Save Patient</button>
</form>

@endsection