@extends('medecin.dams.layouts.app')

@section('title', 'Espoir sante - admin dashboard')

@section('content')
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="widget stats-widget">
                            <div class="widget-body clearfix">
                                @php
                                    $docid = session('damsid'); // Get session data via Laravel's session helper
                                    // You'll need to fetch this data using a Controller and pass it to the view
                                    // For now, let's assume $totnewapt is passed from the controller
                                    $totnewapt = 0; // Placeholder: this will come from the controller
                                    if (isset($newAppointmentsCount)) {
                                        $totnewapt = $newAppointmentsCount;
                                    }
                                @endphp
                                <div class="pull-left">
                                    <h3 class="widget-title text-warning">
                                        <span class="counter" data-plugin="counterUp">{{ $totnewapt }}</span>
                                    </h3>
                                    <small class="text-color">Total New Appointment</small>
                                </div>
                                <span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
                            </div>
                            <footer class="widget-footer bg-warning">
                                <a href="{{ url('new-appointment') }}"><small> View Detail</small></a>
                                <span class="small-chart pull-right" data-plugin="sparkline"
                                    data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
                            </footer>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="widget stats-widget">
                            <div class="widget-body clearfix">
                                @php
                                    // Placeholder: this will come from the controller
                                    $totappapt = 0;
                                    if (isset($approvedAppointmentsCount)) {
                                        $totappapt = $approvedAppointmentsCount;
                                    }
                                @endphp
                                <div class="pull-left">
                                    <h3 class="widget-title text-success">
                                        <span class="counter" data-plugin="counterUp">{{ $totappapt }}</span>
                                    </h3>
                                    <small class="text-color">Total Approved</small>
                                </div>
                                <span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
                            </div>
                            <footer class="widget-footer bg-success">
                                <a href="{{ url('approved-appointment') }}"><small> View Detail</small></a>
                                <span class="small-chart pull-right" data-plugin="sparkline"
                                    data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
                            </footer>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="widget stats-widget">
                            <div class="widget-body clearfix">
                                <div class="pull-left">
                                    @php
                                        // Placeholder: this will come from the controller
                                        $totncanapt = 0;
                                        if (isset($cancelledAppointmentsCount)) {
                                            $totncanapt = $cancelledAppointmentsCount;
                                        }
                                    @endphp
                                    <h3 class="widget-title text-danger">
                                        <span class="counter" data-plugin="counterUp">{{ $totncanapt }}</span>
                                    </h3>
                                    <small class="text-color">Cancelled Appointment</small>
                                </div>
                                <span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
                            </div>
                            <footer class="widget-footer bg-danger">
                                <a href="{{ url('cancelled-appointment') }}"><small> View Detail</small></a>
                                <span class="small-chart pull-right" data-plugin="sparkline"
                                    data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
                            </footer>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="widget stats-widget">
                            <div class="widget-body clearfix">
                                <div class="pull-left">
                                    @php
                                        // Placeholder: this will come from the controller
                                        $totapt = 0;
                                        if (isset($totalAppointmentsCount)) {
                                            $totapt = $totalAppointmentsCount;
                                        }
                                    @endphp
                                    <h3 class="widget-title text-primary">
                                        <span class="counter" data-plugin="counterUp">{{ $totapt }}</span>
                                    </h3>
                                    <small class="text-color">Total Appointment</small>
                                </div>
                                <span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
                            </div>
                            <footer class="widget-footer bg-primary">
                                <a href="{{ url('all-appointment') }}"><small> View Detail</small></a>
                                <span class="small-chart pull-right" data-plugin="sparkline"
                                    data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- No need for separate script section if loaded via layout --}}
{{-- If you have specific scripts for this page, you can define them here: --}}
{{--
@push('scripts')
    <script src="libs/bower/moment/moment.js"></script>
    <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
@endpush
--}}
