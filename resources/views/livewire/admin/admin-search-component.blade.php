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
        </style>
    </head>
    <body>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <br>
                <div class="card card-outline-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                                    <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                        <h5>List of All Tickets</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="card-description">
                                    The tickets are <code>.in a descending order</code>
                                </p>
                            </div>
                            @if(Session::has('message_sent'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message_sent') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            T-ID
                                        </th>
                                        <th>
                                            Requester
                                        </th>
                                        <th>
                                            Subject
                                        </th>
                                        <th>
                                            Agent
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Created at
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alltickets as $item)
                                        <tr>
                                            <td class="py-1">
                                                {{ $item->id }}
                                            </td>
                                            <td>
                                                {{ $item->requester->name }}
                                            </td>
                                            <td>
                                                {{ $item->subject }}
                                            </td>
                                            <td>
                                                {{ $item->solver ? $item->solver->name : 'Not Assigned' }}
                                            </td>
                                            <td>
                                                {{ $item->status->name }}
                                            </td>
                                            <td>
                                                {{ $item->created_at }}
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
                                                           data-ticket-id="{{ $item->id }}">Assign an Agent</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">View Ticket Details</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Cancel Ticket</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    {{ $alltickets->links() }}
                                </ul>
                            </nav>
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
                <form action="{{ route('desk.set') }}" method="post">
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
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
    @livewireScripts

    </body>
    </html>

</div>
