@extends('medecin.dams.layouts.app')

@section('title', 'DAMS || Approved Appointment Detail')

@section('content')
    <section class="app-content">
        <div class="row">
            <!-- DOM dataTable -->
            <div class="col-md-12">
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">Approved Appointment</h4>
                    </header><!-- .widget-header -->
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
                                    @php $cnt = 1; @endphp
                                    @forelse($appointments as $appointment)
                                        <tr>
                                            <td>{{ $cnt++ }}</td>
                                            <td>{{ $appointment->AppointmentNumber }}</td>
                                            <td>{{ $appointment->Name }}</td>
                                            <td>{{ $appointment->MobileNumber }}</td>
                                            <td>{{ $appointment->Email }}</td>
                                            <td>
                                                @if ($appointment->Status == '')
                                                    Not Updated Yet
                                                @else
                                                    {{ $appointment->Status }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('doctor.view_appointment_detail', ['id' => $appointment->ID, 'aptid' => $appointment->AppointmentNumber]) }}"
                                                    class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No approved appointments found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div><!-- .row -->
    </section><!-- .app-content -->
@endsection
