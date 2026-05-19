@extends('layout')

@section('content')

<!-- TOP HERO STATUS BAR -->
<div class="rounded-4 p-4 text-white mb-4"
     style="background: linear-gradient(135deg, #0f172a, #1e293b);">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-1">🏥 MediTrack SaaS Dashboard</h3>
            <small class="text-white-50">
                Live hospital system overview • Real-time operational status
            </small>
        </div>

        <div class="text-end">
            <div class="badge bg-success px-3 py-2">
                ● System Online
            </div>
        </div>

    </div>

</div>

<!-- KPI GRID (SAAS STYLE CARDS) -->
<div class="row g-4">

    <div class="col-md-3">
        <div class="p-4 rounded-4 bg-white shadow-sm position-relative">

            <div class="text-muted">Doctors</div>
            <div class="display-6 fw-bold">{{ $doctors }}</div>

            <div class="small text-success mt-2">
                ▲ Active medical staff
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="p-4 rounded-4 bg-white shadow-sm">

            <div class="text-muted">Patients</div>
            <div class="display-6 fw-bold">{{ $patients }}</div>

            <div class="small text-primary mt-2">
                ▲ Registered records
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="p-4 rounded-4 bg-white shadow-sm">

            <div class="text-muted">Appointments</div>
            <div class="display-6 fw-bold">{{ $appointments }}</div>

            <div class="small text-warning mt-2">
                ● Scheduled visits
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="p-4 rounded-4 bg-white shadow-sm border-start border-danger border-4">

            <div class="text-muted">Pending Cases</div>
            <div class="display-6 fw-bold text-danger">
                {{ $pendingAppointments }}
            </div>

            <div class="small text-danger mt-2">
                ⚠ Requires attention
            </div>

        </div>
    </div>

</div>

<!-- MIDDLE ANALYTICS LAYOUT -->
<div class="row mt-4 g-4">

    <!-- TODAY APPOINTMENTS -->
    <div class="col-md-6">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">📅 Today’s Activity</h5>
                <span class="badge bg-primary">Live</span>
            </div>

            @forelse($todayAppointments as $a)

                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">

                    <div>
                        <div class="fw-semibold">
                            {{ $a->patient->name ?? 'Unknown Patient' }}
                        </div>
                        <small class="text-muted">
                            Dr. {{ $a->doctor->name ?? 'N/A' }}
                        </small>
                    </div>

                    <span class="badge
                        @if($a->status == 'pending') bg-warning
                        @elseif($a->status == 'completed') bg-success
                        @else bg-primary
                        @endif px-3 py-2">

                        {{ ucfirst($a->status) }}

                    </span>

                </div>

            @empty
                <p class="text-muted">No appointments scheduled for today</p>
            @endforelse

        </div>
    </div>

    <!-- SYSTEM INSIGHTS PANEL -->
    <div class="col-md-6">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100">

            <h5 class="mb-3">📊 System Insights</h5>

            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <small>Hospital Load</small>
                    <small>Good</small>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar bg-success" style="width: 65%"></div>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <small>Pending Work</small>
                    <small>Moderate</small>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar bg-warning" style="width: 40%"></div>
                </div>
            </div>

            <div>
                <div class="d-flex justify-content-between">
                    <small>System Health</small>
                    <small>Excellent</small>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar bg-primary" style="width: 90%"></div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- BOTTOM FULL WIDTH SECTION -->
<div class="mt-4">

    <div class="bg-white p-4 rounded-4 shadow-sm">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">🧑‍🦽 Recent Activity</h5>
            <small class="text-muted">Latest patient records & prescriptions</small>
        </div>

        <div class="row">

            <div class="col-md-6">

                <h6 class="text-muted">Patients</h6>

                @forelse($recentPatients as $p)
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="fw-semibold">{{ $p->name }}</span>
                        <small class="text-muted">{{ $p->illness }}</small>
                    </div>
                @empty
                    <p class="text-muted">No patients</p>
                @endforelse

            </div>

            <div class="col-md-6">

                <h6 class="text-muted">Prescriptions</h6>

                @forelse($latestPrescriptions as $p)
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span>{{ $p->medicine_name }}</span>
                        <small class="text-muted">{{ $p->dosage }}</small>
                    </div>
                @empty
                    <p class="text-muted">No prescriptions</p>
                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection