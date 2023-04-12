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
            .lg-bg-nabo {

                background: linear-gradient(to right, #142c3c, #6acfeb) !important;
                color: #fff;
            }
        </style>
    </head>
    <body>
    <div class="col-12 grid-margin">
        <br>

        <button type="button" class="btn btn-outline-dribbble btn-sm  btn-icon-text float-right"
                style="margin-right: 8px" onclick="PrintPDF();">
            PDF
            <i class="ti-download btn-icon-append"></i>
        </button>
        <button type="button" class="btn btn-outline-info btn-sm  btn-icon-text float-right"
                style="margin-right: 8px" data-toggle="modal" data-target="#exampleModal">
            Change Ticket Status
            <i class="ti-email btn-icon-append"></i>
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
                                        <div class="card-header lg-bg-nabo" style="border-radius: 10px">
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
                                                                    <td class="text-muted">Department</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">Finance and Operations</h6>
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
                                                                    <td class="text-muted">Incident/Issue</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{ $ticket->issue ?? 'N/A' }}</h6>
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
                                                    <div class="col-md-6 border-right border-info">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <h3 class="font-weight-100 mb-xl-4 text-info"
                                                                style="font-size: medium">Requester's reason /
                                                                description
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
                                                                style="font-size: medium">Agent's reason / description
                                                                on
                                                                the ticket</h3>
                                                            {{--                                                        <div class="card-body">--}}
                                                            <blockquote class="blockquote blockquote-info">
                                                                <p style="text-align: justify">{{ $ticket->agent_reason ?? 'No reason currently available'}}</p>
                                                                <footer
                                                                    class="blockquote-footer">{{ $ticket->solver ? $ticket->solver->name : 'No Assigned Agent' }}</footer>
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
                    <form action="{{ route('nabo.update-ticket', $ticket) }}" method="post">
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
                                                   id="On-Hold" value="On-Hold">
                                            On-Hold
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
                                        <textarea class="form-control" id="exampleTextarea1" name="description"
                                                  rows="4"></textarea>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
    {{--            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js'></script>
    <script type='text/javascript'
            src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.min.js"></script>

    <script>
        function PrintPDF() {
            html2canvas(document.getElementById('ticket_details'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("My-Raised-Ticket.pdf");
                }
            });
        }
    </script>
    </body>
    </html>
</div>
