<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of patients
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $patients = Patient::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('illness', 'like', "%{$search}%")
                         ->orWhere('address', 'like', "%{$search}%");
        })->get();

        return view('patients.index', compact('patients', 'search'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store new patient
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'illness' => 'required|string|max:255',
            'address' => 'nullable|string',
        ]);

        Patient::create([
            'name' => $request->name,
            'age' => $request->age,
            'illness' => $request->illness,
            'address' => $request->address,
        ]);

        return redirect()->route('patients.index')
                         ->with('success', 'Patient added successfully!');
    }

    /**
     * Show edit form
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update patient
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'illness' => 'required|string|max:255',
            'address' => 'nullable|string',
        ]);

        $patient->update([
            'name' => $request->name,
            'age' => $request->age,
            'illness' => $request->illness,
            'address' => $request->address,
        ]);

        return redirect()->route('patients.index')
                         ->with('success', 'Patient updated successfully!');
    }

    /**
     * Delete patient
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return back()->with('success', 'Patient deleted successfully!');
    }
}