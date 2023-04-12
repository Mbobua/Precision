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
        <br>
        @if( $ticket->status->name != 'Solved' && $ticket->status->name != 'Cancelled' && $ticket->status->name != 'Archived')

            <button type="button" class="btn btn-outline-dribbble btn-sm  btn-icon-text float-right"
                    style="margin-right: 8px" data-toggle="modal" data-target="#exampleModal">
                Change Ticket Status
                <i class="ti-pencil btn-icon-append"></i>
            </button>
        @endif
        <button type="button" class="btn btn-outline-dribbble btn-sm  btn-icon-text float-right"
                style="margin-right: 8px" onclick="PrintPDF();">
            PDF
            <i class="ti-download btn-icon-append"></i>
        </button>


        <br>
        <br>

        <div id="ticket_details" class="card card-outline-primary">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                                        <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                            <h5>Ticket #ID - {{ $ticket->id }} - {{ $ticket->requester->name }}  </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="detailedReports"
                                 class="carousel slide detailed-report-carousel position-static pt-2"
                                 data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">

                                        <div class="row">
                                            <div class="col-md-12 col-xl-12">
                                                <div class="row">
                                                    <div class="col-md-6 border-right border-primary">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <h3 class="font-weight-500 mb-xl-4 text-info"
                                                                style="font-size: medium">Requester Details</h3>
                                                            {{--                                                        <blockquote class="blockquote blockquote-info">--}}
                                                            <table class="table table-borderless report-table">
                                                                <tr>
                                                                    <td class="text-muted">Name</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{ $ticket->requester->name }}</h6>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Company</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{$ticket->company->company_name ?? 'Not Available' }}</h6>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Email</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">
                                                                            {{ $ticket->requester->email }}</h6>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Phone</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{ $ticket->requester->phone_number ?? 'Not Available' }}</h6>
                                                                    </td>

                                                                </tr>
                                                            </table>

                                                            {{--                                                        </blockquote>--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 border-right">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <h3 class="font-weight-500 mb-xl-4 text-info"
                                                                style="font-size: medium">Ticket Details</h3>
                                                            {{--                                                        <blockquote class="blockquote blockquote-info">--}}
                                                            <table class="table table-borderless report-table">
                                                                <tr>
                                                                    <td class="text-muted">Ticket ID</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">
                                                                            TD-{{ $ticket->id }}</h6>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Subject</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{ $ticket->subject }}</h6>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Category</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{ \App\Models\Asset::find($ticket->asset_name)->name  ?? 'N/A' }}</h6>
                                                                    </td>

                                                                </tr>


                                                            </table>
                                                            {{--                                                        </blockquote>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="border border-primary">
                                                <br>
                                                <h3 class="font-weight-100 mb-xl-4 text-info"
                                                    style="font-size: medium">Other Important Details:</h3>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            {{--                                                        <div class="card-body">--}}
                                                            <blockquote class="blockquote blockquote-info">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>
                                                                            Assigned Agent
                                                                        </th>
                                                                        <th>
                                                                            Current Status
                                                                        </th>
                                                                        <th>
                                                                            Created On
                                                                        </th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    <tr>
                                                                        <td>{{ $ticket->solver ? $ticket->solver->name : 'No Assigned Agent' }} </td>
                                                                        <td>{{ $ticket->status->name }}</td>
                                                                        <td>{{ $ticket->created_at }}</td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="border border-primary">
                                                <br>
                                                <h3 class="font-weight-100 mb-xl-4 text-info"
                                                    style="font-size: medium">Ticket History</h3>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            {{--                                                        <div class="card-body">--}}
                                                            <blockquote class="blockquote blockquote-info">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>
                                                                            Previous Status
                                                                        </th>
                                                                        <th>
                                                                            New Status
                                                                        </th>
                                                                        <th>
                                                                            Initiated By
                                                                        </th>
                                                                        <th>
                                                                            Date Updated
                                                                        </th>
                                                                        <th>Duration</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($history->where('ticket_id', $ticket->id) as $index => $row)
                                                                        <tr>
                                                                            <td>{{ $row->old_status }}</td>
                                                                            <td>{{ $row->new_status }}</td>
                                                                            <td>{{ $row->user_id }}</td>
                                                                            <td>{{ $row->created_at }}</td>
                                                                            {{--                                                                         Calculate the difference in days and concat with difference in hours in minutes between the times in the current iteration and previous provided you are not at the first record--}}

                                                                            <td>{{ $loop->first ? '-' :
                                                                                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->diffForHumans(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->where('ticket_id', $ticket->id)->values()[$loop->index - 1]->created_at) )
                                                                                    }}
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="border border-primary">
                                                <div class="row">
                                                    <div class="col-md-6 border-right border-primary">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <h3 class="font-weight-100 mb-xl-4 text-danger"
                                                                style="font-size: medium">Requester's reason /
                                                                description
                                                                on the ticket</h3>
                                                            {{--                                                        <div class="card-body">--}}
                                                            <blockquote class="blockquote blockquote-danger">
                                                                <p style="text-align: justify">{{ $ticket->description ?? 'No reason currently available'}}</p>
                                                                <footer
                                                                    class="blockquote-footer">{{ $ticket->requester->name }}</footer>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 border-right">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <h3 class="font-weight-100 mb-xl-4 text-info"
                                                                style="font-size: medium">Agent's reason / description
                                                                on
                                                                the ticket</h3>
                                                            {{--                                                        <div class="card-body">--}}
                                                            <blockquote class="blockquote blockquote-info">
                                                                <p style="text-align: justify">{{ $ticket->admin_reason ?? 'No reason currently available'}}</p>
                                                                <footer
                                                                    class="blockquote-footer">{{ $ticket->solver ? $ticket->solver->name : 'No Assigned Agent' }}</footer>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if( $ticket->status->name == 'Solved' &&  $ticket->rstatus == true)
                                                    <hr class="border border-primary">

                                                    <div class="row">
                                                        <div class="col-md-12 border-right border-danger">
                                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                                <div class="col-sm-12"><h3
                                                                        class="font-weight-100 mb-xl-4 text-success"
                                                                        style="font-size: medium">
                                                                        Comment/Feedback on the Ticket</h3></div>

                                                                <blockquote class="blockquote blockquote-success">
                                                                    <p style="text-align: justify">No Feedback/Comment
                                                                        was provided</p>
                                                                    <footer
                                                                        class="blockquote-footer">{{  $ticket->requester->name }}</footer>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if( $ticket->reopening_status == true)
                                                    <hr class="border border-primary">

                                                    <div class="row">
                                                        <div class="col-md-12 border-right border-danger">
                                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                                <div class="col-sm-12">
                                                                    <strong><h3
                                                                            class="font-weight-100 mb-xl-4 text-dark"
                                                                            style="font-size: medium">
                                                                            Statement on the Re-Opening of the
                                                                            ticket:</h3></strong>
                                                                </div>
                                                                <blockquote class="blockquote blockquote-dark">
                                                                    <p style="text-align: justify">{{  $ticket->reopening_reason }}</p>
                                                                    <footer
                                                                        class="blockquote-footer">{{  $ticket->requester->name }}</footer>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Opening -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-primary">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Change Ticket Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.update-ticket', $ticket) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            {{--                        <strong>Kindly note that an email address will be sent to</strong>--}}
                            <p>The ticket status will change from
                                <strong>{{ $ticket->status->name }}</strong> to:
                            </p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                   id="In-progress" value="In-progress">
                                            In-progress
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                   id="Temporarily-Solved" value="Temporarily-Solved">
                                            Temporarily-Solved
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                   id="Solved" value="Solved">
                                            Solved
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                   id="Cancelled" value="Cancelled">
                                            Cancelled
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-primary">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong><label for="exampleTextarea1">Kindly indicate the reason for status
                                                change if applicable</label></strong>
                                        <textarea class="form-control" id="exampleTextarea1" name="admin_reason"
                                                  rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dribbble" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Opening -->

    </div>
    <!-- plugins:js -->
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
