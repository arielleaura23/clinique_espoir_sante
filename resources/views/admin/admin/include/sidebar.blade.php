{{-- filepath: resources/views/admin/include/sidebar.blade.php --}}
<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <div class="navbar-title">
                <span>Main Navigation</span>
            </div>
            <ul class="main-navigation-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-home"></i></div>
                            <div class="item-inner"><span class="title"> Dashboard </span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-user"></i></div>
                            <div class="item-inner"><span class="title"> Doctors </span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.doctor.specialization') }}"><span class="title"> Doctor Specialization </span></a></li>
                        <li><a href="{{ route('admin.doctor.add') }}"><span class="title"> Add Doctor</span></a></li>
                        <li><a href="{{ route('admin.doctor.manage') }}"><span class="title"> Manage Doctors </span></a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-user"></i></div>
                            <div class="item-inner"><span class="title"> Users </span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.users.manage') }}"><span class="title"> Manage Users </span></a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-user"></i></div>
                            <div class="item-inner"><span class="title"> Patients </span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.patients.manage') }}"><span class="title"> Manage Patients </span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.appointment.history') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-file"></i></div>
                            <div class="item-inner"><span class="title"> Appointment History </span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-files"></i></div>
                            <div class="item-inner"><span class="title"> Contactus Queries </span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.queries.unread') }}"><span class="title"> Unread Query </span></a></li>
                        <li><a href="{{route('admin.queries.read')}}"><span class="title"> Read Query </span></a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.doctor.logs') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-list"></i></div>
                            <div class="item-inner"><span class="title"> Doctor Session Logs </span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.logs') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-list"></i></div>
                            <div class="item-inner"><span class="title"> User Session Logs </span></div>
                        </div>
                    </a>
                </li> --}}
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-files"></i></div>
                            <div class="item-inner"><span class="title"> Reports </span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.reports.between_dates') }}"><span class="title">B/w dates reports </span></a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-file"></i></div>
                            <div class="item-inner"><span class="title"> Pages </span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.pages.about') }}"><span class="title">About Us </span></a></li>
                        <li><a href="{{ route('admin.pages.contact') }}"><span class="title">Contact Us </span></a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ route('admin.patient.search') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-search"></i></div>
                            <div class="item-inner"><span class="title"> Patient Search </span></div>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
