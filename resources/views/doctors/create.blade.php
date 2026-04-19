@extends('layout')

@section('content')
    <h2>Add Doctor</h2>

    <form method="POST" action="{{ route('doctors.store') }}">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Specialization</label>
            <input type="text" name="specialization" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <button class="btn btn-success">Save Doctor</button>
    </form>
@endsection