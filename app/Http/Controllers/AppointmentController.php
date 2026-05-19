<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
  public function index(Request $request)
{
    $search = $request->input('search');
    $status = $request->input('status');

    $appointments = Appointment::with(['doctor', 'patient'])
        ->when($search, function ($query, $search) {
            $query->whereHas('patient', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })
            ->orWhereHas('doctor', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        })
        ->when($status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->latest()
        ->get();

    return view('appointments.index', compact('appointments', 'search'));
}

    public function create()
    {
        return view('appointments.create', [
            'doctors' => Doctor::all(),
            'patients' => Patient::all(),
        ]);
    }

    public function store(Request $request)
    {
        // ✅ VALIDATION (VERY IMPORTANT FOR PORTFOLIO QUALITY)
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:pending,approved,completed,cancelled',
        ]);

        Appointment::create($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment created successfully');
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', [
            'appointment' => $appointment,
            'doctors' => Doctor::all(),
            'patients' => Patient::all(),
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:pending,approved,completed,cancelled',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated successfully');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return back()->with('success', 'Appointment deleted successfully');
    }
}