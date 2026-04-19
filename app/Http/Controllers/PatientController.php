<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $patients = Patient::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('phone', 'like', "%$search%");
        })->get();

        return view('patients.index', compact('patients', 'search'));
    }


    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        Patient::create($request -> all());
        return redirect() -> route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $patient -> update($request -> all());
        return redirect() -> route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient -> delete();
        return back();
    }
}
