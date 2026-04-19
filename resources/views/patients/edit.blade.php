@extends('layout')

@section('content')
<h2>Edit Patient</h2>

<form method="POST" action="{{ route('patients.update', $patient->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $patient->name }}" class="form-control mb-2">

    <input type="number" name="age" value="{{ $patient->age }}" class="form-control mb-2">

    <input type="text" name="illness" value="{{ $patient->illness }}" class="form-control mb-2">

    <input type="text" name="address" value="{{ $patient->address }}" class="form-control mb-2">

    <button class="btn btn-success">Update Patient</button>
</form>
@endsection