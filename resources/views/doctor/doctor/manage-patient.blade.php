@extends('doctor.layouts.app')

@section('title', 'Admin | View Patients')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | View Patients</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>View Patients</span></li>
                </ol>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="over-title margin-bottom-15">View <span class="text-bold">Patients</span></h5>
                    <table class="table table-hover" id="sample-table-1">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Patient Name</th>
                                <th>Patient Contact Number</th>
                                <th>Patient Gender</th>
                                <th>Creation Date</th>
                                <th>Updation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $index => $patient)
                                <tr>
                                    <td class="center">{{ $index + 1 }}</td>
                                    <td class="hidden-xs">{{ $patient->PatientName }}</td>
                                    <td>{{ $patient->PatientContno }}</td>
                                    <td>{{ $patient->PatientGender }}</td>
                                    <td>{{ $patient->CreationDate ? \Carbon\Carbon::parse($patient->CreationDate)->format('d/m/Y H:i') : '' }}</td>
                                    <td>{{ $patient->UpdationDate ? \Carbon\Carbon::parse($patient->UpdationDate)->format('d/m/Y H:i') : '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.patient.view', $patient->id) }}" class="btn btn-primary btn-xs" target="_blank">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($patients->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No patients found.</td>
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
