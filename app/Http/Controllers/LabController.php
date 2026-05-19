<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Patient;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $labs = Lab::with('patient')->get();
        return view('labs.index', compact('labs'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('labs.create', compact('patients'));
    }

    public function store(Request $request)
    {
        Lab::create($request->all());
        return redirect()->route('labs.index');
    }

public function edit(Lab $lab)
{
    $patients = Patient::all();
    return view('labs.edit', compact('lab', 'patients'));
}

public function update(Request $request, Lab $lab)
{
    $lab->update($request->all());
    return redirect()->route('labs.index');
}

public function destroy(Lab $lab)
{
    $lab->delete();
    return redirect()->route('labs.index');
}
}