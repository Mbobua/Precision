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
        @livewireStyles
    </head>
    <body>
    <div class="col-12 grid-margin">
        <br>

        <button type="button" class="btn btn-outline-dribbble btn-sm  btn-icon-text float-right"
                style="margin-right: 8px" onclick="PrintPDF();">
            PDF
            <i class="ti-download btn-icon-append"></i>
        </button>
        @if( $ticketItem->status->name == 'Solved' &&  $ticketItem->reopening_status == false)

            <button type="button" class="btn btn-outline-dribbble btn-sm  btn-icon-text float-right"
                    style="margin-right: 8px" data-toggle="modal" data-target="#exampleModal">
                Re-Open Ticket
                <i class="ti-pencil btn-icon-append"></i>
            </button>
        @endif

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
                                            <h5>Ticket #ID - {{  $ticketItem->id }}
                                                - {{  $ticketItem->requester->name }}  </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="detailedReports"
                                 class="carousel slide detailed-report-carousel position-static pt-2"
                                 data-ride="carousel">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if(Session::has('message'))
                                            <p class="alert alert-info" role="alert">{{ Session::get('message') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">

                                        <div class="row">
                                            <div class="col-md-12 col-xl-12">
                                                <div class="row">
                                                    <div class="col-md-6 border-right border-primary">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <div class="col-sm-12">
                                                                <h3 class="font-weight-500 mb-xl-4 text-info"
                                                                    style="font-size: medium">Requester Details</h3>
                                                            </div>

                                                            <table class="table table-borderless report-table">
                                                                <tr>
                                                                    <td class="text-muted">Name</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{  $ticketItem->requester->name }}</h6>
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
                                                                            {{  $ticketItem->requester->email }}</h6>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Phone</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{  $ticketItem->requester->phone_number ?? 'Not Available' }}</h6>
                                                                    </td>

                                                                </tr>
                                                            </table>

                                                            {{--                                                        </blockquote>--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 border-right">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <div class="col-sm-12">
                                                                <h3 class="font-weight-500 mb-xl-4 text-info"
                                                                    style="font-size: medium">Ticket Details</h3>
                                                            </div>
                                                            {{--                                                        <blockquote class="blockquote blockquote-info">--}}
                                                            <table class="table table-borderless report-table">
                                                                <tr>
                                                                    <td class="text-muted">Ticket ID</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">
                                                                            TD-{{  $ticketItem->id }}</h6>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Subject</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{  $ticketItem->subject }}</h6>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Category</td>
                                                                    <td class="">
                                                                        <h6 class="font-weight-500"
                                                                            style="font-size: medium">{{ \App\Models\Asset::find( $ticketItem->asset_name)->name  ?? 'N/A' }}</h6>
                                                                    </td>

                                                                </tr>
                                                                @if( $ticketItem->status->name == 'Solved' &&  $ticketItem->rstatus == true)

                                                                    <tr>
                                                                        <td class="text-muted">Rated</td>
                                                                        <td class="">
                                                                            <h6 class="font-weight-500"
                                                                                style="font-size: medium">Yes</h6>
                                                                        </td>

                                                                    </tr>
                                                                @endif
                                                            </table>
                                                            {{--                                                        </blockquote>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="border border-primary">
                                                <br>
                                                <div class="col-sm-12">
                                                    <h3 class="font-weight-500 mb-xl-4 text-info"
                                                        style="font-size: medium">Agent & Status Details</h3>
                                                </div>
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
                                                                            Assigned On
                                                                        </th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    <tr>
                                                                        <td>{{  $ticketItem->solver ?  $ticketItem->solver->name : 'No Assigned Agent' }} </td>
                                                                        <td>{{  $ticketItem->status->name }}</td>
                                                                        <td>{{  $ticketItem->created_at }}</td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="border border-primary">
                                                <br>
                                                <div class="col-sm-12">
                                                    <h3 class="font-weight-500 mb-xl-4 text-info"
                                                        style="font-size: medium">Ticket History</h3>
                                                </div>
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
                                                                            Initiated by
                                                                        </th>
                                                                        <th>
                                                                            Date Updated
                                                                        </th>
                                                                        <th>Duration</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($history->where('ticket_id',  $ticketItem->id) as $index => $row)
                                                                        <tr>
                                                                            <td>{{ $row->old_status }}</td>
                                                                            <td>{{ $row->new_status }}</td>
                                                                            <td>{{ $row->user_id }}</td>
                                                                            <td>{{ $row->created_at }}</td>
                                                                            {{--                                                                         Calculate the difference in days and concat with difference in hours in minutes between the times in the current iteration and previous provided you are not at the first record--}}

                                                                            <td>{{ $loop->first ? '-' :
                                                                                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->diffForHumans(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->where('ticket_id',  $ticketItem->id)->values()[$loop->index - 1]->created_at) )
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
                                                    <div class="col-md-6 border-right border-danger">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <div class="col-sm-12"><h3
                                                                    class="font-weight-100 mb-xl-4 text-danger"
                                                                    style="font-size: medium">{{  $ticketItem->requester->name }}
                                                                    's
                                                                    description
                                                                    about the ticket</h3></div>

                                                            <blockquote class="blockquote blockquote-danger">
                                                                <p style="text-align: justify">{{  $ticketItem->description ?? 'No reason currently available'}}</p>
                                                                <footer
                                                                    class="blockquote-footer">{{  $ticketItem->requester->name }}</footer>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 border-right">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <div class="col-sm-12">
                                                                <h3 class="font-weight-100 mb-xl-4 text-info"
                                                                    style="font-size: medium">Agent's reason /
                                                                    description
                                                                    about
                                                                    the ticket</h3>
                                                            </div>
                                                            <blockquote class="blockquote blockquote-info">
                                                                <p style="text-align: justify">{{  $ticketItem->admin_reason ?? 'No reason currently available'}}</p>
                                                                <footer
                                                                    class="blockquote-footer">{{  $ticketItem->solver ?  $ticketItem->solver->name : 'No Assigned Agent' }}</footer>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if( $ticketItem->status->name == 'Solved' &&  $ticketItem->rstatus == true)
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
                                                                        class="blockquote-footer">{{  $ticketItem->requester->name }}</footer>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if( $ticketItem->reopening_status == true)
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
                                                                    <p style="text-align: justify">{{  $ticketItem->reopening_reason }}</p>
                                                                    <footer
                                                                        class="blockquote-footer">{{  $ticketItem->requester->name }}</footer>
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

    @if( $ticketItem->status->name == 'Solved' &&  $ticketItem->rstatus == false)
        <!-- Modal -->
            <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">How your experience was
                                with {{  $ticketItem->solver->name }}?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.ticket.rating') }}" method="post">
                            @csrf
                            <input type="text" name="ticket_id" value="{{ $ticketItem->id }}" hidden>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="stars" style="align-items: center">
                                            <label style="font-size: 19px" for="">1 - 😖 </label>
                                            <input type="radio" name="rating" value="1" required>
                                            &nbsp; &nbsp;
                                            <label style="font-size: 19px" for="">2 - ☹️</label>
                                            <input type="radio" name="rating" value="2">
                                            &nbsp; &nbsp;
                                            <label style="font-size: 19px" for="">3 - 🙂</label>
                                            <input type="radio" name="rating" value="3">
                                            &nbsp; &nbsp;
                                            <label style="font-size: 19px" for="">4 - 😊</label>
                                            <input type="radio" name="rating" value="4">
                                            &nbsp; &nbsp;
                                            <label style="font-size: 19px" for="">5 - 🤩</label>
                                            <input type="radio" name="rating" value="5">

                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label for="exampleTextarea1" class="text-primary">Enter custom
                                                    comment
                                                    (Optional)</label></strong>
                                            <textarea class="form-control" id="exampleTextarea1" name="comment"
                                                      rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="float:right">
                                            <button class="btn btn-danger" data-dismiss="modal">Dismiss</button>
                                            <button type="submit" class="btn l-bg-cherry text-white">Save changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endif


    <!-- Modal Opening -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-primary">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Re-Open your Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.reopen-ticket',$ticketItem) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            {{--                        <strong>Kindly note that an email address will be sent to</strong>--}}
                            <p class="text-danger"><strong>If you initiate this action, your ticket status will change
                                    from
                                    {{ $ticketItem->status->name }} to Re-Opened and your
                                    agent {{$ticketItem->solver->name ?? 'No agent currently assigned' }} will be
                                    notified. </strong>
                            </p>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" name="optionsRadios"
                                                   id="Re-Opened" value="Re-Opened">
                                            Click to confirm the Re-Opening of your ticket
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-primary">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong><label for="exampleTextarea1">Kindly indicate the reason for initiating
                                                this action*</label></strong>
                                        <textarea class="form-control" id="exampleTextarea1" name="reopening_reason"
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
    {{--            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js'></script>
    <script type='text/javascript'
            src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.min.js"></script>
    <!-- endinject -->

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

    <script>
        $('#ticketModal').modal('show')
    </script>
    @livewireScripts
    </body>
    </html>


</div>
