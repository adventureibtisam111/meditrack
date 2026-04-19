@extends('layout')

@section('content')
<h2>Create Prescription</h2>

<form method="POST" action="{{ route('prescriptions.store') }}">
    @csrf

    {{-- Doctor --}}
    <select name="doctor_id" class="form-control mb-2">
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @endforeach
    </select>

    {{-- Patient --}}
    <select name="patient_id" class="form-control mb-2">
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
        @endforeach
    </select>

    <input type="text" name="medicine_name" placeholder="Medicine Name" class="form-control mb-2">

    <input type="text" name="dosage" placeholder="Dosage (e.g. 1 tablet 2x daily)" class="form-control mb-2">

    <textarea name="instructions" placeholder="Instructions" class="form-control mb-2"></textarea>

    <button class="btn btn-success">Save Prescription</button>
</form>
@endsection