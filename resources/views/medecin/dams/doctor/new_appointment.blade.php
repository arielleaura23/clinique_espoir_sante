@extends('medecin.dams.layouts.app')

@section('title', 'YDHP || New Appointment Detail')

@section('content')
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">New Appointment</h4>
                        </header>
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Appointment Number</th>
                                            <th>Patient Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Laravel va passer les données des rendez-vous ici --}}
                                        @if (isset($appointments) && $appointments->count() > 0)
                                            @foreach ($appointments as $cnt => $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> {{-- $loop->iteration pour le numéro de ligne --}}
                                                    <td>{{ $row->AppointmentNumber }}</td>
                                                    <td>{{ $row->Name }}</td>
                                                    <td>{{ $row->MobileNumber }}</td>
                                                    <td>{{ $row->Email }}</td>
                                                    <td>
                                                        @if ($row->Status == '')
                                                            Not Updated Yet
                                                        @else
                                                            {{ $row->Status }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('view-appointment-detail', ['editid' => $row->ID, 'aptid' => $row->AppointmentNumber]) }}"
                                                            class="btn btn-primary">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7">No new appointments found.</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>@endsection
