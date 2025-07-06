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
                    @if(session('success'))
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
                            @foreach($appointments as $index => $appointment)
                                <tr>
                                    <td class="center">{{ $index + 1 }}</td>
                                    <td class="hidden-xs">{{ $appointment->doctor->FullName ?? '' }}</td>
                                    <td class="hidden-xs">{{ $appointment->patient->PatientName ?? '' }}</td>
                                    <td>{{ $appointment->doctorSpecialization }}</td>
                                    <td>{{ $appointment->consultancyFees }}</td>
                                    <td>{{ $appointment->appointmentDate }} / {{ $appointment->appointmentTime }}</td>
                                    <td>{{ $appointment->created_at ? \Carbon\Carbon::parse($appointment->postingDate)->format('d/m/Y H:i') : '' }}</td>
                                    <td>
                                        @if($appointment->userStatus == 1 && $appointment->doctorStatus == 1)
                                            Active
                                        @elseif($appointment->userStatus == 0 && $appointment->doctorStatus == 1)
                                            Cancel by Patient
                                        @elseif($appointment->userStatus == 1 && $appointment->doctorStatus == 0)
                                            Cancel by Doctor
                                        @else
                                            Canceled
                                        @endif
                                    </td>
                                    <td>
                                        @if($appointment->userStatus == 1 && $appointment->doctorStatus == 1)
                                            No Action yet
                                        @else
                                            Canceled
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if($appointments->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center">No appointment history found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
