{{-- filepath: resources/views/admin/include/header.blade.php --}}
<header class="navbar navbar-default navbar-static-top">
    <!-- start: NAVBAR HEADER -->
    <div class="navbar-header" style="display: flex">
        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg btn btn-navbar sidebar-toggle"
            data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
            <i class="ti-align-justify"></i>
        </a>
        <a class="" href="{{ route('admin.dashboard') }}">
            <img style="width: 90%;" src="{{ asset('assets/img/logo ligne fond bleu.png') }}" alt="logo">
        </a>
        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg"
            data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
            <i class="ti-align-justify"></i>
        </a>
        <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse"
            href=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="ti-view-grid"></i>
        </a>
    </div>
    <!-- end: NAVBAR HEADER -->
    <!-- start: NAVBAR COLLAPSE -->
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-right">
            <!-- start: MESSAGES DROPDOWN -->

            <li class="dropdown current-user">
                <a href="#" style="align-items: center;
    justify-content: center;
    display: flex
;"
                    class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('assets/assets_admin/images/images.jpg') }}" alt="Admin" />
                    <span class="username">
                        Admin
                        <i class="ti-angle-down"></i>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-dark">
                    <li>
                        <a href="#">
                            Change Password
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Log Out
                        </a>
                    </li>
                </ul>
            </li>
            <!-- end: USER OPTIONS DROPDOWN -->
        </ul>
        <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
        <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
            <div class="arrow-left"></div>
            <div class="arrow-right"></div>
        </div>
        <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
    </div>
    <!-- end: NAVBAR COLLAPSE -->
</header>
