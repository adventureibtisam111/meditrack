<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Prescription;
use App\Models\Lab;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('home', [
            'user' => $user,

            'doctors' => Doctor::count(),
            'patients' => Patient::count(),
            'appointments' => Appointment::count(),
            'prescriptions' => Prescription::count(),
            'labs' => Lab::count(),

            'pendingAppointments' => Appointment::where('status', 'pending')->count(),

            'todayAppointments' => Appointment::with(['patient', 'doctor'])
                ->whereDate('appointment_date', Carbon::today())
                ->get(),

            'recentPatients' => Patient::latest()->take(5)->get(),

            'latestPrescriptions' => Prescription::latest()->take(5)->get(),
        ]);
    }

    public function liveStats()
    {
        return response()->json([
            'doctors' => Doctor::count(),
            'patients' => Patient::count(),
            'appointments' => Appointment::count(),
            'pending' => Appointment::where('status', 'pending')->count(),
        ]);
    }
}