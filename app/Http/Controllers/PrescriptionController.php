<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with(['doctor', 'patient'])->get();
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('prescriptions.create', compact('doctors', 'patients'));
    }

    public function store(Request $request)
    {
        Prescription::create($request->all());
        return redirect()->route('prescriptions.index');
    }

    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return back();
    }
}
