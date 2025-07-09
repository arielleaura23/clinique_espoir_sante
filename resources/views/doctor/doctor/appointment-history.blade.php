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
                                    <th>Price</th>
                                    <th>Date / Time</th>
                                    <th>Appointment Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $index => $appointment)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $appointment->doctor->name ?? '-' }}</td>
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
                                            @if ($appointment->doctor_status == 1)
                                                <div class="actions-btn"
                                                    style="display: flex;gap: 10px;align-items: center;">
                                                    <!-- Bouton Approuver -->
                                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                                        data-target="#approveModal{{ $appointment->id }}">Approuver</button>

                                                    <!-- Bouton Rejeter -->
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#rejectModal{{ $appointment->id }}">Rejeter</button>

                                                    {{-- Modal Approuver --}}
                                                    <div class="modal fade" id="approveModal{{ $appointment->id }}"
                                                        tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <form
                                                                action="{{ route('appointments.approve', $appointment->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-content" style="background-color: white;">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Remarque pour approbation
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <textarea name="remark" class="form-control" required placeholder="Entrez la remarque pour le patient..."></textarea>
                                                                    </div>
                                                                    <div class="modal-footer" style="border: none">
                                                                        <button type="submit"
                                                                            class="btn btn-success">Confirmer
                                                                            l'approbation</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    {{-- Modal Rejeter --}}
                                                    <div class="modal fade" id="rejectModal{{ $appointment->id }}"
                                                        tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <form
                                                                action="{{ route('appointments.reject', $appointment->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-content" style="background-color: white;">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Remarque pour rejet</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <textarea name="remark" class="form-control" required placeholder="Expliquez pourquoi vous rejetez ce rendez-vous..."></textarea>
                                                                    </div>
                                                                    <div class="modal-footer" style="border: none">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Confirmer
                                                                            le rejet</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($appointment->doctor_status == 2)
                                                <span style="padding: 7px;    width: 70px;" class="badge badge-success">Approuvé</span>
                                            @elseif($appointment->doctor_status == 0)
                                                <span style="padding: 7px;    width: 70px;" class="badge badge-danger">Rejeté</span>
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
