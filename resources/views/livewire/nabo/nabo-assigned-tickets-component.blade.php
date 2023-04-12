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
                background: linear-gradient(to right, #8d188e,#0d47a1) !important;
                color: #fff;
            }
            .lg-bg-nabo {

                background: linear-gradient(to right, #142c3c, #6acfeb) !important;
                color: #fff;
            }
        </style>
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
                                    <div class="card-header lg-bg-nabo" style="border-radius: 10px">
                                        <h5>{{ auth()->user()->name }}'s Assigned Nabo Tickets</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            The tickets are <code>.in a descending order</code>
                        </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-primary" id="open-tab" data-toggle="tab" href="#open"
                                   role="tab" aria-controls="home" aria-selected="true">Open
                                    <span class="badge badge-info">{{ count($open) }}</span></a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" id="in-progress-tab" data-toggle="tab" href="#in-progress"
                                   role="tab" aria-controls="home" aria-selected="true">In-Progress
                                    <span class="badge badge-primary">{{ count($in_progress) }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success" id="solved-tab" data-toggle="tab" href="#solved"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Solved
                                    <span class="badge badge-success">{{ count($solved) }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="partially-solved-tab" data-toggle="tab"
                                   href="#partially-solved"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Partially Solved
                                    <span class="badge badge-info">{{ count($partially_solved) }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" id="cancelled-tab" data-toggle="tab" href="#cancelled"
                                   role="tab" aria-controls="contact" aria-selected="false">Cancelled
                                    <span class="badge badge-danger">{{ count($cancelled) }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-info" id="archived-tab" data-toggle="tab" href="#archived"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Archived
                                    <span class="badge badge-info">{{ count($archived) }}</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active " id="open" role="tabpanel" aria-labelledby="open-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Email
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
                                                    {{ $ticket->requester->email }}
                                                </td>

                                                <td>
                                                    <label class="badge badge-primary"
                                                           style=" font-size: 0.9em;"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('nabo.edit-ticket', $ticket) }}"
                                                       class="btn btn-outline-info btn-sm btn-fw">View Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                        Ticket Status from <strong class="text-primary">Open</strong>
                                                        to:</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-info">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optionsRadios" id="optionsRadios1"
                                                                           value="">
                                                                    On-Hold
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-success">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optionsRadios" id="optionsRadios1"
                                                                           value="">
                                                                    Solved
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-danger">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optionsRadios" id="optionsRadios1"
                                                                           value="">
                                                                    Cancelled
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-secondary">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optionsRadios" id="optionsRadios1"
                                                                           value="">
                                                                    Closed
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="in-progress" role="tabpanel" aria-labelledby="in-progress-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Email
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
                                                    {{ $ticket->requester->email }}
                                                </td>

                                                <td>
                                                    <label class="badge badge-warning"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('nabo.edit-ticket', $ticket) }}"
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
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Email
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
                                        @foreach($partially_solved as $ticket)
                                            <tr>
                                                <td class="py-1">
                                                    {{ $ticket->id }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $ticket->requester->email }}
                                                </td>

                                                <td>
                                                    <label class="badge badge-warning"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>

                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('nabo.edit-ticket', $ticket) }}"
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
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Email
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
                                                    {{ $ticket->requester->email }}
                                                </td>

                                                <td>
                                                    <label class="badge badge-success"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('nabo.edit-ticket', $ticket) }}"
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
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Email
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
                                                    {{ $ticket->requester->email }}
                                                </td>

                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('nabo.edit-ticket', $ticket) }}"
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
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Email
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
                                                    {{ $ticket->requester->email }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-danger"
                                                           style=" font-size: 0.9em;color: white"><strong>{{ $ticket->status->name }}</strong></label>
                                                </td>
                                                <td>
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('nabo.edit-ticket', $ticket) }}"
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
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- plugins:js -->

    {{--    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>--}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false
        });
    </script>
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/s/todolist.js') }}j"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- End custom js for this page-->

    <script>
        $(document).ready(function () {
            $("#ticketModal").on("show.bs.modal", function (e) {
                $('#ticket').val($(e.relatedTarget).data('ticket-id'));
            });
        });
    </script>
    </body>
    </html>
</div>

