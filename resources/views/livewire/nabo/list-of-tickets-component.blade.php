<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skydash Admin</title>
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
                background: linear-gradient(to right, #8d188e, #0d47a1) !important;
                color: #fff;
            }
            .lg-bg-nabo {

                background: linear-gradient(to right, #142c3c, #6acfeb) !important;
                color: #fff;
            }
        </style>

        @livewireStyles
    </head>

    <body>
    <div class="col-12 grid-margin">
        <br>
        <div class="card card-outline-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                            <div class="card-header lg-bg-nabo" style="border-radius: 10px">
                                <h5>{{ auth()->user()->name }}'s raised Tickets</h5>
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
                <div class="row">
                    <div class="col-md-12 grid-margin transparent">
                        <div class="row">
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card card-tale">
                                    <div class="card-body">
                                        <p class="mb-4"> Total No. of Assigned Assets</p>
                                        <p class="fs-30 mb-2">N/A</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card l-bg-cherry">
                                    <div class="card-body">
                                        <p class="mb-4">My total No. of raised Tickets</p>
                                        <p class="fs-30 mb-2">{{ count($solved_ticket) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card card-light-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Solved tickets</p>
                                        <p class="fs-30 mb-2">{{ count($solved) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card card-light-danger">
                                    <div class="card-body">
                                        <p class="mb-4">Your Unsolved tickets</p>
                                        <p class="fs-30 mb-2">{{ count($solved_ticket) - count($open) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" id="new-tab" data-toggle="tab" href="#new"
                           role="tab" aria-controls="home" aria-selected="true">New
                            <span class="badge badge-dark">{{ count($new) }}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="open-tab" data-toggle="tab" href="#open"
                           role="tab" aria-controls="home" aria-selected="true">Open
                            <span class="badge badge-info">{{ count($open) }}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="in-progress-tab" data-toggle="tab" href="#in-progress"
                           role="tab" aria-controls="home" aria-selected="true">In-Progress
                            <span class="badge badge-primary">{{ count($in_progress) }}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" id="solved-tab" data-toggle="tab" href="#solved"
                           role="tab"
                           aria-controls="contact" aria-selected="false">Solved
                            <span class="badge badge-success">{{ count($solved) }}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="partially-solved-tab" data-toggle="tab"
                           href="#partially-solved"
                           role="tab"
                           aria-controls="contact" aria-selected="false">
                            Partially Solved
                            <span class="badge badge-info">{{ count($partially_solved) }}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" id="cancelled-tab" data-toggle="tab" href="#cancelled"
                           role="tab" aria-controls="contact" aria-selected="false">Cancelled
                            <span class="badge badge-danger">{{ count($cancelled) }}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="archived-tab" data-toggle="tab" href="#archived"
                           role="tab"
                           aria-controls="contact" aria-selected="false">Archived
                            <span class="badge badge-info">{{ count($archived) }}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="new" role="tabpanel" aria-labelledby="new-tab">
                        <div class="table-responsive">
                            <table id="example3" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        Subject
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
                                @foreach($new as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('nabo.it-td-ticket-details', $ticket)}}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="open" role="tabpanel" aria-labelledby="open-tab">
                        <div class="table-responsive">
                            <table id="example32" class="table table-striped">
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
                                @foreach($open as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-info"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('nabo.it-td-ticket-details', $ticket)}}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="in-progress" role="tabpanel" aria-labelledby="in-progress-tab">
                        <div class="table-responsive">
                            <table id="example16" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        Subject
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
                                @foreach($in_progress as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('nabo.it-td-ticket-details', $ticket)}}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="partially-solved" role="tabpanel"
                         aria-labelledby="partially-solved-tab">
                        <div class="table-responsive">
                            <table id="example18" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        Subject
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
                                @foreach($partially_solved as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('nabo.it-td-ticket-details', $ticket)}}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="solved" role="tabpanel" aria-labelledby="solved-tab">
                        <div class="table-responsive">
                            <table id="example6" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        Subject
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
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('nabo.it-td-ticket-details', $ticket)}}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                        <div class="table-responsive">
                            <table id="example19" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        Subject
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
                                @foreach($cancelled as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('nabo.it-td-ticket-details', $ticket)}}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="archived" role="tabpanel" aria-labelledby="archived-tab">
                        <div class="table-responsive">
                            <table id="example20" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        Subject
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
                                @foreach($archived as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('nabo.it-td-ticket-details', $ticket)}}"
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example3').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example32').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example6').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example20').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example19').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example18').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example17').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example16').DataTable();
        });
    </script>
    </body>

    </html>
</div>
