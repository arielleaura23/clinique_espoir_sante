@extends('doctor.layouts.app')

@section('title', 'Admin | View Patient')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | View Patient</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>View Patient</span></li>
                </ol>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Patient Details --}}
                    <table class="table table-bordered">
                        <tr align="center">
                            <td colspan="4" style="font-size:20px;color:blue">Patient Details</td>
                        </tr>
                        <tr>
                            <th>Patient Name</th>
                            <td>{{ $patient->PatientName }}</td>
                            <th>Patient Email</th>
                            <td>{{ $patient->PatientEmail }}</td>
                        </tr>
                        <tr>
                            <th>Patient Mobile Number</th>
                            <td>{{ $patient->PatientContno }}</td>
                            <th>Patient Address</th>
                            <td>{{ $patient->PatientAdd }}</td>
                        </tr>
                        <tr>
                            <th>Patient Gender</th>
                            <td>{{ $patient->PatientGender }}</td>
                            <th>Patient Age</th>
                            <td>{{ $patient->PatientAge }}</td>
                        </tr>
                        <tr>
                            <th>Patient Medical History (if any)</th>
                            <td>{{ $patient->PatientMedhis }}</td>
                            <th>Patient Reg Date</th>
                            <td>{{ $patient->CreationDate ? \Carbon\Carbon::parse($patient->CreationDate)->format('d/m/Y H:i') : '' }}</td>
                        </tr>
                    </table>

                    {{-- Add Medical History --}}
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">Add Medical History</h5>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="{{ route('admin.patient.medicalhistory.add', $patient->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label>Blood Pressure</label>
                                    <input type="text" name="bp" class="form-control" required value="{{ old('bp') }}">
                                </div>
                                <div class="form-group">
                                    <label>Blood Sugar</label>
                                    <input type="text" name="bs" class="form-control" required value="{{ old('bs') }}">
                                </div>
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input type="text" name="weight" class="form-control" required value="{{ old('weight') }}">
                                </div>
                                <div class="form-group">
                                    <label>Temperature</label>
                                    <input type="text" name="temp" class="form-control" required value="{{ old('temp') }}">
                                </div>
                                <div class="form-group">
                                    <label>Medical Prescription</label>
                                    <textarea name="pres" class="form-control" required>{{ old('pres') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-o btn-primary">Add</button>
                            </form>
                        </div>
                    </div>

                    {{-- Medical History Table --}}
                    <table class="table table-bordered">
                        <tr align="center">
                            <th colspan="8">Medical History</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Blood Pressure</th>
                            <th>Weight</th>
                            <th>Blood Sugar</th>
                            <th>Body Temperature</th>
                            <th>Medical Prescription</th>
                            <th>Visit Date</th>
                        </tr>
                        @foreach($medicalHistory as $index => $history)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $history->BloodPressure }}</td>
                                <td>{{ $history->Weight }}</td>
                                <td>{{ $history->BloodSugar }}</td>
                                <td>{{ $history->Temperature }}</td>
                                <td>{{ $history->MedicalPres }}</td>
                                <td>{{ $history->CreationDate ? \Carbon\Carbon::parse($history->CreationDate)->format('d/m/Y H:i') : '' }}</td>
                            </tr>
                        @endforeach
                        @if($medicalHistory->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">No medical history found.</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
