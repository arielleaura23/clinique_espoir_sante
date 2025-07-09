@extends('admin.layouts.app')

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
                    <h5 class="over-title margin-bottom-15">Liste des <span class="text-bold">patients</span></h5>

                    <table class="table table-hover" id="sample-table-1">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Nom du patient</th>
                                <th>Téléphone</th>
                                <th>Genre</th>
                                <th>Date de création</th>
                                <th>Dernière mise à jour</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($patients as $index => $patient)
                                <tr>
                                    <td class="center">{{ $index + 1 }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->phone ?? '-' }}</td>
                                    <td>{{ ucfirst($patient->gender ?? 'Non spécifié') }}</td>
                                    <td>{{ $patient->created_at ? $patient->created_at->format('d/m/Y H:i') : '-' }}</td>
                                    <td>{{ $patient->updated_at ? $patient->updated_at->format('d/m/Y H:i') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.patient.view', $patient->id) }}" class="btn btn-primary btn-xs" target="_blank">Voir</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Aucun patient trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
