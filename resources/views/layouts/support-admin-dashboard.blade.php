<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Precision Desk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
    <style>
        .l-bg-cherry {
            background: linear-gradient(to right, #8d188e, #0d47a1) !important;
            color: #fff;
        }

        .l-bg-red {
            background: linear-gradient(to right, #e03e2d, #ea4c89) !important;
            color: #fff;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }

        .l-bg-green {
            background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
            color: #fff;
        }
    </style>
    @livewireStyles
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/images/tier-data.png') }}" alt="" style="width: 100%;height: 50px">

            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="{{ asset('assets/images/user.png') }}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                           <a class="dropdown-item" href="{{ route('admin.dashboard.settings') }}" >
                            <i class="ti-pencil-alt text-primary"></i>
                            Go to My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
                <form id="logout-form" method="post" action="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    @csrf
                </form>
                <li class="nav-item nav-settings d-none d-lg-flex">
                    <a class="nav-link" href="#">
                        <i class="icon-ellipsis"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <main role="main" class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                <p class="mb-3">{{ session('error') }}</p>
                @if(session('errorDetail'))
                    <pre class="alert-pre border bg-light p-2"><code>{{ session('errorDetail') }}</code></pre>
                @endif
            </div>
        @endif

        @yield('content')
    </main>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>
                    Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                    Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ url('admin/dashboard') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false"
                       aria-controls="reports">
                        <i class="ti-file menu-icon"></i>
                        <span class="menu-title">Tickets</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="reports">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('admin.ticket-form') }}">Ticket Form</a></li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('admin.my-raised-tickets') }}"> My Raised Tickets</a></li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('ticket.assigned-tickets') }}"> My Assigned Tickets</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.ticket-report')}}"> Ticket
                                    Reports </a></li>
                         
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/dashboard/custom-ticket-request') }}">
                        <i class="icon-paragraph menu-icon"></i>
                        <span class="menu-title">Custom ticket request</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.list-of-users') }}">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">Manage Users</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">Logout</span>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            {{$slot}}
        </div>
        <!-- page-body-wrapper-ends -->
    </div>
    <!-- container-scroller -->

</div>


@livewireScripts
<!-- End custom js for this page-->

</body>
</html>
