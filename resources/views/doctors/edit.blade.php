@extends('layout')

@section('content')
    <h2>Edit Doctor</h2>

    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $doctor->name }}">
        </div>

        <div class="mb-3">
            <label>Specialization</label>
            <input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
        </div>

        <button class="btn btn-success">Update Doctor</button>
    </form>
@endsection