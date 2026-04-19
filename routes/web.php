<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Prescription;

/*
|--------------------------------------------------------------------------
| HOME PAGE (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home', [
        'doctors' => Doctor::count(),
        'patients' => Patient::count(),
        'appointments' => Appointment::count(),
        'prescriptions' => Prescription::count(),
    ]);
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (PUBLIC / GUEST ONLY)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

});

/*
|--------------------------------------------------------------------------
| LOGOUT (ONLY FOR LOGGED IN USERS)
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| HOSPITAL SYSTEM (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('home', [
            'doctors' => Doctor::count(),
            'patients' => Patient::count(),
            'appointments' => Appointment::count(),
            'prescriptions' => Prescription::count(),
        ]);
    });

    Route::resource('doctors', DoctorController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('prescriptions', PrescriptionController::class);

});