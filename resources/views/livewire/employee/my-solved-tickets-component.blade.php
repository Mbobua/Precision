<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Support | Precision Desk</title>
        <!-- Styles -->
        <!-- Plugin css for this page -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
        <!-- Template Main CSS File -->
        <link href="{{ asset('website-assets/css/style.css') }}" rel="stylesheet">
        <style>
            .l-bg-cherry {
                background: linear-gradient(to right, #8d188e,#0d47a1) !important;
                color: #fff;
            }
            .l-bg-green-dark {
                background: linear-gradient(to right, #0a504a, #38ef7d) !important;
                color: #fff;
            }
        </style>

        @livewireStyles
    </head>

    <body>
{{--    <div class="container-scroller">--}}
{{--        <form method="post">--}}
{{--            @csrf--}}
{{--            <div class="col-lg-12 grid-margin stretch-card">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title">My Solved Tickets</h4>--}}
{{--                        <p class="card-description">--}}
{{--                            Tickets are in <code>an ascending order.</code>--}}
{{--                        </p>--}}
{{--                        @if(Session::has('message_sent'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ Session::get('message_sent') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        T-ID--}}
{{--                                    </th>--}}
{{--                                    <th>--}}
{{--                                        Issue--}}
{{--                                    </th>--}}
{{--                                    <th>--}}
{{--                                        Asset--}}
{{--                                    </th>--}}
{{--                                    <th>--}}
{{--                                        Created_at--}}
{{--                                    </th>--}}
{{--                                    <th>--}}
{{--                                        Status--}}
{{--                                    </th>--}}
{{--                                    <th>--}}
{{--                                        Action--}}
{{--                                    </th>--}}

{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($solved as $ticket)--}}
{{--                                    <tr>--}}
{{--                                        <td class="py-1">--}}
{{--                                            {{ $ticket->id }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $ticket->issue }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ \App\Models\Asset::find($ticket->asset_name)->name }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $ticket->created_at }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $ticket->status->name }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="#"--}}
{{--                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}

{{--    </div>--}}


    <div class="col-12 grid-margin">
        <br>
        <div class="card card-outline-success">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card border-success mb-3" style="border-color: #8d188e !important;">
                            <div class="card-header l-bg-green-dark" style="border-radius: 10px">
                                <h5>My Solved Tickets</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Tickets are in <code>an ascending order.</code>
                </p>
                @if(Session::has('message_sent'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('message_sent') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="example5" class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                T-ID
                            </th>
                            <th>
                                Issue
                            </th>
                            <th>
                                Asset
                            </th>
                            <th>
                                Created_at
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($solved as $ticket)
                            <tr>
                                <td class="py-1">
                                    {{ $ticket->id }}
                                </td>
                                <td>
                                    {{ $ticket->issue }}
                                </td>
                                <td>
                                    {{ \App\Models\Asset::find($ticket->asset_name)->name }}
                                </td>
                                <td>
                                    {{ $ticket->created_at }}
                                </td>
                                <td>
                                    {{ $ticket->status->name }}
                                </td>
                                <td>
                                    <a href="#"
                                       class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example5').DataTable();
        });
    </script>
    </body>

    </html>
</div>
