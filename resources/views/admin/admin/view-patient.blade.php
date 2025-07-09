@extends('admin.layouts.app')

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

                    {{-- Infos Patient --}}
                    <table class="table table-bordered">
                        <tr align="center">
                            <td colspan="4" style="font-size:20px;color:blue">Patient Details</td>
                        </tr>
                        <tr>
                            <th>Patient Name</th>
                            <td>{{ $patient->name }}</td>
                            <th>Patient Email</th>
                            <td>{{ $patient->email }}</td>
                        </tr>
                        <tr>
                            <th>Patient Contact</th>
                            <td>{{ $patient->phone }}</td>
                            <th>Patient Address</th>
                            <td>{{ $patient->address }}</td>
                        </tr>
                        <tr>
                            <th>Patient Gender</th>
                            <td>{{ ucfirst($patient->gender) }}</td>
                            <th>Patient Age</th>
                            <td>{{ $patient->age ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Date d’inscription</th>
                            <td>{{ $patient->created_at->format('d/m/Y H:i') }}</td>
                            <th>Dernière mise à jour</th>
                            <td>{{ $patient->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>

                    {{-- Ajouter une visite médicale --}}
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">Ajouter un historique médical</h5>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="{{ route('admin.patient.medicalhistory.add', $patient->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label>Tension artérielle</label>
                                    <input type="text" name="bp" class="form-control" required value="{{ old('bp') }}">
                                </div>
                                <div class="form-group">
                                    <label>Glycémie</label>
                                    <input type="text" name="bs" class="form-control" required value="{{ old('bs') }}">
                                </div>
                                <div class="form-group">
                                    <label>Poids</label>
                                    <input type="text" name="weight" class="form-control" required value="{{ old('weight') }}">
                                </div>
                                <div class="form-group">
                                    <label>Température</label>
                                    <input type="text" name="temp" class="form-control" required value="{{ old('temp') }}">
                                </div>
                                <div class="form-group">
                                    <label>Prescription médicale</label>
                                    <textarea name="pres" class="form-control" required>{{ old('pres') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-o btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>

                    {{-- Historique médical --}}
                    <table class="table table-bordered">
                        <tr align="center">
                            <th colspan="8">Historique Médical</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Tension</th>
                            <th>Poids</th>
                            <th>Glycémie</th>
                            <th>Température</th>
                            <th>Prescription</th>
                            <th>Date</th>
                        </tr>
                        @forelse($medicalHistory as $index => $history)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $history->BloodPressure }}</td>
                                <td>{{ $history->Weight }}</td>
                                <td>{{ $history->BloodSugar }}</td>
                                <td>{{ $history->Temperature }}</td>
                                <td>{{ $history->MedicalPres }}</td>
                                <td>{{ $history->CreationDate ? \Carbon\Carbon::parse($history->CreationDate)->format('d/m/Y H:i') : '' }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Aucun historique médical trouvé.</td>
                            </tr>
                        @endforelse
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
