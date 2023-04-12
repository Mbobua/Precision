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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
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
    </head>
    <body>
    <div class="row" style="margin-top: 40px">
        <div class="col-12 grid-margin stretch-card">
            <br>
            <div class="card card-outline-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                                <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                    <h5>Direct tickets from the email</h5>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            The tickets are <code>.in a descending order</code>
                        </p>

                        {{--                        @if(Session::has('message_sent'))--}}
                        {{--                            <div class="alert alert-success" role="alert">--}}
                        {{--                                {{ Session::get('message_sent') }}--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Requester
                                    </th>
                                    <th>
                                        Description
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
                                {{--                                @foreach($ticket as $item)--}}
                                <tr>
                                    <td class="py-1">
                                        {{--                                            {{ $item->id }}--}}
                                    </td>
                                    <td>
                                        {{--                                            {{ $item->requester->name }}--}}
                                    </td>
                                    <td>
                                        {{--                                            {{ $item->requester->name }}--}}
                                    </td>
                                    <td>
                                        {{--                                            {{ \App\Models\Asset::find($item->asset_name)->name }}--}}
                                    </td>
                                    <td>
                                        {{--                                            {{ $item->created_at }}--}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu"
                                                 aria-labelledby="dropdownMenuSizeButton3">
                                                <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                <button class="dropdown-item text-success" href="#"
                                                        data-toggle="modal"
                                                        data-target="#ticketModal"
                                                        data-ticket-id="#">
                                                    -- Assign / Edit Agent--
                                                </button>
                                                <a class="dropdown-item text-info" href="#">-- View Details
                                                    --</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
{{--                                                                @endforeach--}}
                                </tbody>
                            </table>
                            <br>
                            {{--                            <a href="{{ route('admin.all-tickets') }}">--}}
                            {{--                                <button type="submit" class="btn btn-info btn-sm ti-files">&nbsp; <strong>VIEW ALL--}}
                            {{--                                        TICKETS</strong></button>--}}
                            {{--                            </a>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>

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
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    </body>
    </html>


</div>
