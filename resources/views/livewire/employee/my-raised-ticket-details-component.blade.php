<div>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SkyDash | Home</title>
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
        <style>
            .l-bg-cherry {
                background: linear-gradient(to right, #8d188e, #f09) !important;
                color: #fff;
            }
        </style>
    </head>
    <body>
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                             data-ride="carousel">

                            <button type="button" class="btn btn-outline-info btn-sm  btn-icon-text float-right"
                                    style="margin-right: 8px">
                                Print
                                <i class="ti-printer btn-icon-append"></i>
                            </button>

                            <button type="button" class="btn btn-outline-dribbble btn-sm  btn-icon-text float-right"
                                    style="margin-right: 8px" data-toggle="modal" data-target="#exampleModal">
                                Change Ticket Status
                                <i class="ti-email btn-icon-append"></i>
                            </button>
                            <br>
                            <br>
                            <hr class="border border-primary">
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
                                                                        style="font-size: medium">Tier Data Ltd</h6>
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
                                                                        style="font-size: medium">0727497792</h6>
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
                                                                <td class="text-muted">Asset</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ \App\Models\Asset::find($ticket->asset_name)->name }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Incident/Issue</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->issue }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Assignee</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->solver->name }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Status</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->status->name }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Date raised</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->created_at }}</h6>
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
                                                                        <td>{{ $row->created_at }}</td>
                                                                        {{-- Calculate the difference in days and concat with difference in hours in minutes between the times in the current iteration and previous provided you are not at the first record--}}

                                                                        <td>{{ $loop->first ? '-' :
                                                                                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->where('ticket_id', $ticket->id)[$index]->created_at)->diffInDays(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->where('ticket_id', $ticket->id)[$index-1]->created_at)) . ' days' . ' ' .
                                                                                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->where('ticket_id', $ticket->id)[$index]->created_at)->diffInHours(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->where('ticket_id', $ticket->id)[$index-1]->created_at)) . ' hours' . ' ' .
                                                                                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->where('ticket_id', $ticket->id)[$index]->created_at)->diffInMinutes(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->where('ticket_id', $ticket->id)[$index-1]->created_at)) . ' minutes' }}</td>
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
                                                <div class="col-md-6 border-right border-info">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <h3 class="font-weight-100 mb-xl-4 text-info"
                                                            style="font-size: medium">Requester's reason / description
                                                            on the ticket</h3>
                                                        {{--                                                        <div class="card-body">--}}
                                                        <blockquote class="blockquote blockquote-info">
                                                            <p style="text-align: justify">{{ $ticket->description ?? 'No reason currently available'}}</p>
                                                            <footer
                                                                class="blockquote-footer">{{ $ticket->requester->name }}</footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 border-right">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <h3 class="font-weight-100 mb-xl-4 text-info"
                                                            style="font-size: medium">Agent's reason / description on
                                                            the ticket</h3>
                                                        {{--                                                        <div class="card-body">--}}
                                                        <blockquote class="blockquote blockquote-info">
                                                            <p style="text-align: justify">{{ $ticket->admin_reason ?? 'No reason currently available'}}</p>
                                                            <footer
                                                                class="blockquote-footer">{{ auth()->user()->name }}</footer>
                                                        </blockquote>
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
            </div>
        </div>


    </div>
    </body>
    </html>

</div>
