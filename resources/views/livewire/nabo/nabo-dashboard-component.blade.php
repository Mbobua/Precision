<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SkyDash | Home</title>
        <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
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

            .lg-bg-nabo {

                background: linear-gradient(to right, #142c3c, #6acfeb) !important;
                color: #fff;
            }

            .l-bg-green-dark {
                background: linear-gradient(to right, #0a504a, #38ef7d) !important;
                color: #fff;
            }
        </style>
    </head>
    <body>
    <div class="content-wrapper">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ auth()->user()->name }}!</h3>
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly!<span
                                    class="text-primary"></span></h6>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                            id="dropdownMenuDate2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('nabo.ticket-submit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-outline-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                                            <div class="card-header lg-bg-nabo" style="border-radius: 10px">
                                                <h5>Internal Ticket Form - Finance and Operations Department</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description text-info">
                                    Kindly fill in the necessary details inline with your request.
                                </p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary">Ticket Subject</label></strong>
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="Ticket Subject" name="subject"
                                                   aria-label="Username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary">Item of Issue</label></strong>
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="e.g. APX Permissions" name="issue"
                                                   aria-label="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="">
                                            <strong><label class="text-primary">Department To</label></strong>
                                            <select class="js-example-basic-single w-100" name="department_to">
                                                @foreach($departments as $department)
                                                    <option
                                                        value="{{ $department->department_name }}">{{ $department->department_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="">
                                            <strong><label class="text-primary">Select Agent</label></strong>
                                            <select class="js-example-basic-single w-100" name="agent">
                                                @foreach($users as $user)
                                                    <option
                                                        value="{{ $user->id }}">
                                                        {{ $user->name }} - {{ ($user->email) }} -
                                                        {{$user->phone_number}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary" for="exampleTextarea1">Detailed
                                                    description</label></strong>
                                            <textarea class="form-control" id="exampleTextarea1" name="description"
                                                      rows="4" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary">File upload</label></strong>
                                            <div class="input-group col-xs-12">
                                                <input type="file" class="form-control file-upload-info"
                                                       placeholder="Upload Image" name="attachment"><span
                                                    class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr class="border border-primary">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-sm-10">
                                            <div class="form-check">
                                                <strong>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="phone_number"
                                                               value="true">
                                                        Send SMS Notification to the Requester
                                                    </label>
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button type="button" class="btn lg-bg-nabo mr-2 float-right" data-toggle="modal"
                                        data-target="#delegateModal" style="color: #fff;border: none;">Delegate an Agent
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="delegateModal" tabindex="-1" role="dialog"
                     aria-labelledby="ticketModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-primary" id="ticketModalLabel">Select the Ticket
                                    Priority</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-sm-12">
                                            <div class="row">
                                                @foreach(App\Models\Priority::all() as $priority)
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="priority_name" id="{{ $priority->id }}"
                                                                       value="{{ $priority->id }}">
                                                                {{ $priority->priority_name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn lg-bg-nabo" style="border: none;">Assign Ticket
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>

    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    {{--<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>--}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $("button[type='submit']").click(function () {
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
        });
    </script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false
        });
    </script>
    <script>
        $('#category_id').change((event) => {
            $('.assets').hide();
            $(`.category_${event.target.value}`).show();
        });
        $(document).ready(function () {
            $('.assets').hide();
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


    </body>
    </html>
</div>
