<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Precision Desk Support</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('website-assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('website-assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('website-assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('website-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('website-assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website-assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('website-assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('website-assets/css/style.css') }}" rel="stylesheet">
    <style>
        .l-bg-cherry {
            background: linear-gradient(to right, #0d47a1, #8d188e) !important;
            color: #fff;
        }
        .lg-bg-nabo {

            background: linear-gradient(to right, #142c3c, #6acfeb) !important;
            color: #fff;
        }

        .lg-bg-admi {

            background: linear-gradient(to right, #ed6a21, #b82e36) !important;
            color: #fff;
        }

    </style>
    @livewireStyles
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('website-assets/img/logo.png') }}" alt="">
            <span>Precision Desk</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li class="dropdown"><a href="#"><span>Solutions</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">StartUps</a></li>
                        <li class="dropdown"><a href="#"><span>Industries</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Corporates</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Internal HelpDesk</a></li>
                    </ul>
                </li>
                <li><a href="blog.html">Demo</a></li>
                <li><a class="nav-link scrollto" href="#contact">Pricing</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->user_type==='Administrator')
                            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('admin.dashboard') }}">My Dashboard</a></li>
                                    <li><a href="#"><a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                                Out</a></a></li>
                                </ul>
                            </li>
                        @elseif(Auth::user()->user_type==='default_user')
                            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('employee.dashboard') }}">My Dashboard</a></li>
                                    <li><a href="#"><a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                                Out</a></a></li>
                                </ul>
                            </li>
                        @elseif(Auth::user()->user_type==='NaboStaff')
                            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('nabostaff.dashboard') }}">My Dashboard</a></li>
                                    <li><a href="#"><a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                                Out</a></a></li>
                                </ul>
                            </li>

                        @elseif(Auth::user()->user_type==='Agent')
                            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('ticket.agent-assigned-tickets') }}">My Dashboard</a></li>
                                    <li><a href="#"><a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                                Out</a></a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('demo.dashboard') }}">Dashboard (Demo)</a></li>
                                    <li><a href="#"><a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                                Out</a></a></li>
                                </ul>
                            </li>

                        @endif
                        <form id="logout-form" method="post" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    @else
                        <li><a class="getstarted scrollto lg-bg-nabo" href="{{route('login')}}">Sign In</a></li>
                    @endif
                @endif

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- Used for rendering livewire component -->
{{$slot}}

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h4>Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                </div>
                <div class="col-lg-6">
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <img src="{{ asset('website-assets/img/logo.png') }}" alt="">
                        <span>Precision Desk</span>
                    </a>
                    <p>To organize ticket routing and support channels to enhance customer experience.</p>
                    <div class="social-links mt-3">
                        <a href="#" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/Precision-Desk-103602512242533" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Precision Desk</span></strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('website-assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('website-assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('website-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('website-assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('website-assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('website-assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('website-assets/vendor/php-email-form/validate.js') }}w"></script>

<!-- Template Main JS File -->
<script src="{{ asset('website-assets/js/main.js') }}"></script>
@livewireScripts
</body>

</html>
