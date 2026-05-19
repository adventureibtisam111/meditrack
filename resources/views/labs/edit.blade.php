@extends('layout')

@section('content')

<h2>Edit Lab Test</h2>

<form method="POST" action="/labs/{{ $lab->id }}">
    @csrf
    @method('PUT')

    <div class="mb-2">
        <label>Patient</label>
        <select name="patient_id" class="form-control">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}" 
                    {{ $lab->patient_id == $patient->id ? 'selected' : '' }}>
                    {{ $patient->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-2">
        <label>Test Name</label>
        <input type="text" name="test_name" class="form-control" value="{{ $lab->test_name }}">
    </div>

    <div class="mb-2">
        <label>Result</label>
        <textarea name="result" class="form-control">{{ $lab->result }}</textarea>
    </div>

    <div class="mb-2">
        <label>Date</label>
        <input type="date" name="test_date" class="form-control" value="{{ $lab->test_date }}">
    </div>

    <button class="btn btn-primary">Update</button>

</form>

@endsection