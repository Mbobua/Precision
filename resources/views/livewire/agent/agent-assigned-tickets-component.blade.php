<div>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SkyDash | Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

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
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <br>
                <br>
                <div class="card card-outline-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                                    <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                        <h5>List of my Assigned Tickets</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            The tickets are <code>.in a descending order</code>
                        </p>
                        <div class="col-12">
                            @if(Session::has('message_sent'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message_sent') }}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12 grid-margin transparent">
                                <div class="row">
                                    <div class="col-md-3 mb-4 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body">
                                                <p class="mb-4">Assigned Tickets</p>
                                                <strong>
                                                    <p class="fs-30 mb-2">{{ count($myassignedtickets) }}</p>
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4 stretch-card transparent">
                                        <div class="card l-bg-cherry">
                                            <div class="card-body">
                                                <p class="mb-4">Resolved Tickets</p>
                                                <strong>
                                                    <p class="fs-30 mb-2">{{ count($solved) }}</p>
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4 stretch-card transparent">
                                        <div class="card l-bg-red">
                                            <div class="card-body">
                                                <p class="mb-4">Unresolved Tickets</p>
                                                <strong>
                                                    <p class="fs-30 mb-2">{{ count($temporarily_solved) + count($open) + count($in_progress) + count($on_hold) + count($reopened)}}</p>
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4 stretch-card transparent">
                                        <div class="card l-bg-cherry">
                                            <div class="card-body">
                                                <p class="mb-4">Escalated Tickets</p>
                                                <strong>
                                                    <p class="fs-30 mb-2">{{ 0. }}</p>
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-primary" id="open-tab" data-toggle="tab" href="#open"
                                   role="tab" aria-controls="home" aria-selected="true">Open <span
                                        class="badge badge-info">{{ count($open) }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" id="in-progress-tab" data-toggle="tab"
                                   href="#re-opened"
                                   role="tab" aria-controls="home" aria-selected="true">Re-Opened<span
                                        class="badge badge-danger">{{ count($reopened) }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" id="in-progress-tab" data-toggle="tab"
                                   href="#in-progress"
                                   role="tab" aria-controls="home" aria-selected="true">In-Progress <span
                                        class="badge badge-primary">{{ count($in_progress) }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success" id="solved-tab" data-toggle="tab" href="#solved"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Solved <span
                                        class="badge badge-success">{{ count($solved) }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="partially-solved-tab" data-toggle="tab"
                                   href="#partially-solved"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Temporarily Solved <span
                                        class="badge badge-dark">{{ count($temporarily_solved) }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" id="cancelled-tab" data-toggle="tab" href="#cancelled"
                                   role="tab" aria-controls="contact" aria-selected="false">Cancelled <span
                                        class="badge badge-danger">{{ count($cancelled) }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning" id="archived-tab" data-toggle="tab" href="#archived"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Archived <span
                                        class="badge badge-warning">{{ count($archived) }}</span></a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active " id="open" role="tabpanel"
                                 aria-labelledby="open-tab">
                                <div class="table-responsive">
                                    <table id="dt17" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Subject
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($open as $ticket)
                                            <tr>
                                                <td>
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger btn-sm">Action
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#"
                                                               data-toggle="modal"
                                                               data-target="#ticketModal"
                                                               data-ticket-id="{{ $ticket->id }}">Delegate Ticket</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item"
                                                               href="{{ route('agent.edit-ticket', $ticket) }}">View
                                                                Ticket Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="re-opened" role="tabpanel"
                                 aria-labelledby="in-progress-tab">
                                <div class="table-responsive">
                                    <table id="dt18" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Subject
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reopened as $ticket)
                                            <tr>
                                                <td>
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('agent.edit-ticket', $ticket) }}"
                                                       class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="in-progress" role="tabpanel"
                                 aria-labelledby="in-progress-tab">
                                <div class="table-responsive">
                                    <table id="dt19" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Subject
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($in_progress as $ticket)
                                            <tr>
                                                <td>
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('agent.edit-ticket', $ticket) }}"
                                                       class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                <div class="table-responsive">
                                    <table id="dt20" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Subject
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($temporarily_solved as $ticket)
                                            <tr>
                                                <td>
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('agent.edit-ticket', $ticket) }}"
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
                                    <table id="dt21" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Subject
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($temporarily_solved as $ticket)
                                            <tr>
                                                <td>
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('agent.edit-ticket', $ticket) }}"
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
                                    <table id="dt22" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Subject
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($solved as $ticket)
                                            <tr>
                                                <td>
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('agent.edit-ticket', $ticket) }}"
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
                                    <table id="dt23" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Subject
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($cancelled as $ticket)
                                            <tr>
                                                <td>
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('agent.edit-ticket', $ticket) }}"
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
                                    <table id="dt24" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Subject
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($archived as $ticket)
                                            <tr>
                                                <td>
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('agent.edit-ticket', $ticket) }}"
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
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog"
             aria-labelledby="ticketModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="ticketModalLabel">Delegate Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('agent.delegator.set') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <strong>* An email will be sent to the agent assigned *</strong>
                            <br>
                            <br>
                            <div class="form-group">
                                <label id="ticket-label" for="exampleFormControlSelect3">Select an Agent</label>
                                <input type="text" id="ticket" name="ticket" hidden>
                                <select name="agent" class="form-control form-control-sm" id="exampleFormControlSelect3"
                                        required>
                                    @foreach(App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}"> {{ $user->name }} - {{ ($user->email) }} -
                                            {{$user->phone_number}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <hr class="border-primary">
                            <div class="form-group">
                                <div class="form-check">
                                    <strong>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="phone_number"
                                                   value="true">
                                            Send SMS to the selected agent
                                        </label>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delegate Ticket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- End custom js for this page-->
    <script>
        $(document).ready(function () {
            $("#ticketModal").on("show.bs.modal", function (e) {
                $('#ticket').val($(e.relatedTarget).data('ticket-id'));
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#ticketModal").on("show.bs.modal", function (e) {
                $('#ticket').val($(e.relatedTarget).data('ticket-id'));
            });

            $('#dt17').DataTable();
            $('#dt18').DataTable();
            $('#dt19').DataTable();
            $('#dt20').DataTable();
            $('#dt21').DataTable();
            $('#dt22').DataTable();
            $('#dt23').DataTable();
            $('#dt24').DataTable();
        });
    </script>

    @livewireScripts
    </body>
    </html>
</div>







