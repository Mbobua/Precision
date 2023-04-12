<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skydash Admin</title>

        <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
        <style>
            .l-bg-cherry {
                background: linear-gradient(to right, #8d188e, #0d47a1) !important;
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
                            <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                <h5>My Raised Tickets</h5>
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
                                        <p class="mb-4">Raised Tickets</p>
                                        <p class="fs-30 mb-2">{{ count($new) + count($temporarily_solved) + count($open) + count($in_progress) + count($on_hold) + count($reopened)+count($solved) + count($cancelled) + count($archived) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card l-bg-cherry">
                                    <div class="card-body">
                                        <p class="mb-4">Resolved tickets</p>
                                        <p class="fs-30 mb-2">{{ count($solved) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card card-light-blue">
                                    <div class="card-body">
                                        <p class="mb-4"> Unresolved tickets</p>
                                        <p class="fs-30 mb-2">{{count($new) + count($temporarily_solved) + count($open) + count($in_progress) + count($on_hold) + count($reopened)  }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card card-light-danger">
                                    <div class="card-body">
                                        <p class="mb-4">Cancelled tickets</p>
                                        <p class="fs-30 mb-2">{{ count($cancelled) }}</p>
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
                            Temporarily-Solved
                            <span class="badge badge-info">{{ count($temporarily_solved) }}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" id="cancelled-tab" data-toggle="tab" href="#cancelled"
                           role="tab" aria-controls="contact" aria-selected="false">Cancelled
                            <span class="badge badge-danger">{{ count($cancelled) }}</span>
                            <span class="sr-only">unread messages</span></a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="archived-tab" data-toggle="tab" href="#archived"
                           role="tab"
                           aria-controls="contact" aria-selected="false">Archived
                            <span class="badge badge-info">{{ count($archived) }}</span>
                            <span class="sr-only">unread messages</span></a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" id="reopened-tab" data-toggle="tab" href="#reopened"
                           role="tab"
                           aria-controls="contact" aria-selected="false">Re-Opened
                            <span class="badge badge-warning">{{ count($reopened) }}</span>
                            <span class="sr-only">unread messages</span></a>
                        </a>
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
                                @foreach($new as $ticket_id)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket_id->id }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket_id->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.my-ticket-detail', $ticket_id)}}"
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
                                @foreach($open as $ticket_id)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket_id->id }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket_id->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.my-ticket-detail', $ticket_id)}}"
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
                                @foreach($in_progress as $ticket_id)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket_id->id }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-primary"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket_id->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.my-ticket-detail', $ticket_id)}}"
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
                                @foreach($temporarily_solved as $ticket_id)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket_id->id }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-info"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket_id->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.my-ticket-detail', $ticket_id)}}"
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
                                @foreach($solved as $ticket_id)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket_id->id }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-success"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket_id->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.my-ticket-detail', $ticket_id)}}"
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
                                @foreach($cancelled as $ticket_id)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket_id->id }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket_id->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.my-ticket-detail', $ticket_id)}}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="reopened" role="tabpanel" aria-labelledby="reopened-tab">
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
                                @foreach($reopened as $ticket_id)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket_id->id }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-warning"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket_id->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.my-ticket-detail', $ticket_id)}}"
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
                                @foreach($archived as $ticket_id)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket_id->id }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket_id->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-dark"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket_id->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.my-ticket-detail', $ticket_id)}}"
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
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

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
    @livewireScripts
    </body>

    </html>
</div>
