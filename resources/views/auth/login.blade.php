{{--<x-guest-layout>--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
        rel="stylesheet"
    />


    <title>Precision Desk | Login</title>
    <style>
        .vh-100 {
            background: url({{ asset('website-assets/img/hero-bg.png') }}) top center no-repeat;
            background-size: cover;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .header {
            transition: all 0.5s;
            z-index: 997;
            padding: 20px 0;
        }

        .header.header-scrolled {
            background: #fff;
            padding: 15px 0;
            box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
        }

        .header .logo {
            line-height: 0;
        }

        .header .logo img {
            max-height: 40px;
            margin-right: 6px;
        }

        .header .logo span {
            font-size: 30px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #012970;
            font-family: "Nunito", sans-serif;
            margin-top: 3px;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        .l-bg-cherry {
            background: linear-gradient(to right, #0d47a1, #8d188e) !important;
            color: #fff;
        }

        .btn-primary {
            background-color: #4099ff;
            border-color: #4099ff;
            color: #fff;
            cursor: pointer;
            -webkit-transition: all ease-in .3s;
            transition: all ease-in .3s
        }

        .btn {
            border-radius: 2px;
            text-transform: capitalize;
            font-size: 15px;
            padding: 10px 19px;
            cursor: pointer
        }

        #infoMessage p {

            color: red !important;
        }


        .btn-google {
            color: #545454;
            background-color: #ffffff;
            box-shadow: 0 1px 2px 1px #ddd;
        }
    </style>
</head>
<body>
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('website-assets/img/logo.png') }}" alt="">
            <span>Precision Desk</span>
        </a>

    </div>
</header><!-- End Header -->
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid"
                     alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div
                        class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3"><strong>Sign in with:</strong>
                        </p>
                        <br>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="/signin"><img
                                    src="{{ asset('assets/images/icons8-microsoft-48.png') }}"> Sign in Using
                                Microsoft</a>
                        </div>
                    </div>
                    <br>

                    <!--<div class="divider d-flex align-items-center my-4">-->
                    <!--    <p class="text-center fw-bold mx-3 mb-0">Or</p>-->
                    <!--</div>-->

                    <!--<div class="row">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="#"><img-->
                    <!--                src="{{ asset('assets/images/icons8-google-48.png') }}"> Sign in Using-->
                    <!--            Google</a>-->

                    <!--    </div>-->
                    <!--</div>-->

                </form>
            </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 l-bg-cherry">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2022. All rights reserved.
        </div>
        <!-- Copyright -->

        <!-- Right -->
        <div>
                <span class="text-white"> <strong>Powered By <a href="http://tierdata.co.ke" class="text-white"
                                                                target="_blank">Tier Data Ltd</a>.</strong></span>&nbsp
            &nbsp
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>


        </div>

        <!-- Right -->
    </div>
</section>
<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>
</body>
</html>
{{--</x-guest-layout>--}}


