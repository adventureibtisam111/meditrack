<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request -> input ('search');

        $doctors = Doctor::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%$search%")
                     ->orWhere('specialization', 'like', "%$search%");
    })->get();

    return view('doctors.index', compact('doctors', 'search'));   

    }

    public function create()
    {
        return view('doctors.create');
    }


    public function store(Request $request)
    {
        Doctor::create($request -> all());
        return redirect() -> route('doctors.index');
    }


    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }


    public function update(Request $request, Doctor $doctor)
    {
        $doctor -> update($request -> all());
        return redirect() -> route('doctors.index');
    }


    public function destroy(Doctor $doctor)
    {
        $doctor -> delete();
        return back();
    }


}
