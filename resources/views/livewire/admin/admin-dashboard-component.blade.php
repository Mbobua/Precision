<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skydash Admin</title>
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

    <div class="col-12 grid-margin">
        <div class="row">
            <div class="col-md-12 mt-4 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ auth()->user()->name }}!</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-outline-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                            <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                <h5>List of All Tickets</h5>
                            </div>
                        </div>
                    </div>
                </div>


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
                                        <p class="fs-30 mb-2">{{\App\Models\Tickets::all()->count()}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card l-bg-cherry">
                                    <div class="card-body">
                                        <p class="mb-4">Allocated Tickets</p>
                                        <p class="fs-30 mb-2">{{\App\Models\Tickets::where('status_id', '!=', 1)->count()}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card card-light-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Unallocated Tickets</p>
                                        <p class="fs-30 mb-2">{{\App\Models\Tickets::where('status_id', 1)->count()}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4 stretch-card transparent">
                                <div class="card card-light-danger">
                                    <div class="card-body">
                                        <p class="mb-4">Escalated Tickets</p>
                                        <p class="fs-30 mb-2">0.</p>
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
                            <span
                                class="badge badge-dark">{{\App\Models\Tickets::where('status_id', 1)->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="open-tab" data-toggle="tab" href="#open"
                           role="tab" aria-controls="home" aria-selected="true">Open
                            <span
                                class="badge badge-info">{{\App\Models\Tickets::where('status_id', 2)->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" id="reopened-tab" data-toggle="tab" href="#re-opened"
                           role="tab" aria-controls="home" aria-selected="true">Re-Opened
                            <span
                                class="badge badge-danger">{{\App\Models\Tickets::where('status_id', 9)->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="in-progress-tab" data-toggle="tab" href="#in-progress"
                           role="tab" aria-controls="home" aria-selected="true">In-Progress
                            <span
                                class="badge badge-primary">{{\App\Models\Tickets::where('status_id', 4)->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" id="solved-tab" data-toggle="tab" href="#solved"
                           role="tab"
                           aria-controls="contact" aria-selected="false">Solved
                            <span
                                class="badge badge-success">{{\App\Models\Tickets::where('status_id', 5)->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="partially-solved-tab" data-toggle="tab"
                           href="#partially-solved"
                           role="tab"
                           aria-controls="contact" aria-selected="false">
                            Temporarily solved
                            <span
                                class="badge badge-info">{{\App\Models\Tickets::where('status_id', 3)->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" id="cancelled-tab" data-toggle="tab" href="#cancelled"
                           role="tab" aria-controls="contact" aria-selected="false">Cancelled
                            <span
                                class="badge badge-danger">{{\App\Models\Tickets::where('status_id', 7)->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="archived-tab" data-toggle="tab" href="#archived"
                           role="tab"
                           aria-controls="contact" aria-selected="false">Archived
                            <span
                                class="badge badge-info">{{\App\Models\Tickets::where('status_id', 8)->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="new" role="tabpanel" aria-labelledby="new-tab">
                        <div class="table-responsive">
                            <table id="dt1" class="table table-striped display" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        From
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
                                            {{ $ticket->requester->name }}
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
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger btn-sm">Action</button>
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
                                                       data-ticket-id="{{ $ticket->id }}">Assign an Agent</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                       href="{{ route('admin.view-ticket-details', $ticket) }}">View
                                                        Ticket Details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Cancel Ticket</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>


                                @endforeach

                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="open" role="tabpanel" aria-labelledby="open-tab">
                        <div class="table-responsive">
                            <table id="dt2" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Assigned Agent
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
                                @foreach($open as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                         <td>
                                            {{ $ticket->requester->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->solver->name }}
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
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger btn-sm">Action</button>
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
                                                       href="{{ route('admin.view-ticket-details', $ticket) }}">View
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
                    <div class="tab-pane fade" id="re-opened" role="tabpanel" aria-labelledby="reopened-tab">
                        <div class="table-responsive">
                            <table id="dt3" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Assigned Agent
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
                                @foreach($reopened as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                         <td>
                                            {{ $ticket->requester->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->solver->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-danger"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.view-ticket-details', $ticket) }}"
                                               class="btn btn-outline-danger btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="in-progress" role="tabpanel" aria-labelledby="in-progress-tab">
                        <div class="table-responsive">
                            <table id="dt4" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Assigned Agent
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
                                            {{ $ticket->requester->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->solver->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-primary"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.view-ticket-details', $ticket) }}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="partially-solved" role="tabpanel"
                         aria-labelledby="partially-solved-tab">
                        <div class="table-responsive">
                            <table id="dt5" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Assigned Agent
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
                                @foreach($temporarily_solved as $ticket)
                                    <tr>
                                        <td class="py-1">
                                            {{ $ticket->id }}
                                        </td>
                                         <td>
                                            {{ $ticket->requester->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->solver->name }}
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
                                            <a href="{{ route('admin.view-ticket-details', $ticket) }}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <br>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="solved" role="tabpanel" aria-labelledby="solved-tab">
                        <div class="table-responsive">
                            <table id="dt6" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Assigned Agent
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
                                            {{ $ticket->requester->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->solver->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->subject }}
                                        </td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                        <td>
                                            <label class="badge badge-success"
                                                   style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.view-ticket-details', $ticket) }}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <br>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                        <div class="table-responsive">
                            <table id="dt7" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Agent
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
                                            {{ $ticket->requester->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->solver->name }}
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
                                            <a href="{{ route('admin.view-ticket-details', $ticket) }}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="archived" role="tabpanel" aria-labelledby="archived-tab">
                        <div class="table-responsive">
                            <table id="dt8" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Assigned Agent
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
                                            {{ $ticket->requester->name }}
                                        </td>
                                        <td>
                                            {{ $ticket->solver->name }}
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
                                            <a href="{{ route('admin.view-ticket-details', $ticket) }}"
                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <br>
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
                    <h5 class="modal-title text-primary" id="ticketModalLabel">Assign an Agent</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('solver.set') }}" method="post">
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
                                @foreach($users as $user)
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
                        <button type="submit" class="btn btn-primary">Assign Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
{{--    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--            crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>



    <!-- plugins:js -->

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

    <script>
        $(document).ready(function () {
            $("#ticketModal").on("show.bs.modal", function (e) {
                $('#ticket').val($(e.relatedTarget).data('ticket-id'));
            });

            $('#dt1').DataTable();
            $('#dt2').DataTable();
            $('#dt3').DataTable();
            $('#dt4').DataTable();
            $('#dt5').DataTable();
            $('#dt6').DataTable();
            $('#dt7').DataTable();
            $('#dt8').DataTable();
        });
    </script>

    @livewireScripts
    </body>

    </html>
</div>
