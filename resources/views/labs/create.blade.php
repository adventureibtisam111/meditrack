@extends('layout')

@section('content')

<h2>Add Lab Test</h2>

<form method="POST" action="{{ route('labs.store') }}">
    @csrf

    <div class="mb-2">
        <label>Patient</label>
        <select name="patient_id" class="form-control">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-2">
        <label>Test Name</label>
        <input type="text" name="test_name" class="form-control">
    </div>

    <div class="mb-2">
        <label>Result</label>
        <textarea name="result" class="form-control"></textarea>
    </div>

    <div class="mb-2">
        <label>Date</label>
        <input type="date" name="test_date" class="form-control">
    </div>

    <button class="btn btn-primary">Save</button>

</form>

@endsection