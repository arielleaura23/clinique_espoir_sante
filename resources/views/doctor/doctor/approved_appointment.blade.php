@extends('doctor.layouts.app')

@section('title', 'Patients | Appointment History')

@section('content')
    <div class="main-content">
        <div class="wrap-content container" id="container">
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Patients | Appointment History</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><span>Patients</span></li>
                        <li class="active"><span>Appointment History</span></li>
                    </ol>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="hidden-xs">Doctor Name</th>
                                    <th>Patient Name</th>
                                    <th>Specialization</th>
                                    <th>Consultancy Fee</th>
                                    <th>Appointment Date / Time</th>
                                    <th>Appointment Creation Date</th>
                                    <th>Current Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $index => $appointment)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $appointment->doctor->FullName ?? '-' }}</td>
                                        <td>{{ $appointment->name ?? '-' }}</td>
                                        <td>{{ $appointment->specialization }}</td>
                                        <td>{{ $appointment->consultancy_fees }}</td>
                                        <td>{{ $appointment->appointment_date }} / {{ $appointment->appointment_time }}</td>
                                        <td>{{ $appointment->posting_date ? \Carbon\Carbon::parse($appointment->posting_date)->format('d/m/Y H:i') : '-' }}
                                        </td>
                                        <td>
                                            @if ($appointment->user_status && $appointment->doctor_status)
                                                Active
                                            @elseif(!$appointment->user_status && $appointment->doctor_status)
                                                Annulé par patient
                                            @elseif($appointment->user_status && !$appointment->doctor_status)
                                                Annulé par médecin
                                            @else
                                                Annulé
                                            @endif
                                        </td>
                                        <td>
                                            @if ($appointment->user_status && $appointment->doctor_status)
                                                Aucun traitement
                                            @else
                                                Annulé
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
