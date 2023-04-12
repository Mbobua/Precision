<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Precision Desk | Home</title>
         <!-- plugins:css -->

        <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
        <style>
            .l-bg-cyan {
                background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
                color: #fff;
            }

            .l-bg-cherry {
                background: linear-gradient(to right, #8d188e, #0d47a1) !important;
                color: #fff;
            }


            .spinner-button {
                border: 2px solid #000;
                display: inline-block;
                padding: 8px 20px 9px;
                font-size: 15px;
                color: #000;
                background-color: transparent
            }
            .btn-primary:disabled {
                color: #fff;
                background-color: #000;
                border-color: #000;
            }
            .spinner-button:hover {
                background-color: #000;
                border: 2px solid #000;
                color: #fff
            }

            .spinner-button i {
                color: #fff
            }

            .spinner-button:hover i {
                color: #fff
            }

            .fa{
                color:#fff;
            }

            .fa:hover{
                color:#fff;
            }
        </style>
        @livewireStyles
    </head>
    <body>
    <div class="content-wrapper">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-9 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Hi {{ auth()->user()->name }}, you can raise an IT support
                                ticket here!</h3>
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly!<span
                                    class="text-primary"></span></h6>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-outline-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                                        <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                            <h5>Support Ticket Form</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description text-info">
                                Kindly fill in the necessary details inline with your request.
                            </p>
                            <form class="forms-sample" action="{{ route('employee.ticket.submit') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary">Ticket Subject</label></strong>
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="e.g Login Issue" name="subject"
                                                   aria-label="Subject" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="">
                                            <strong><label class="text-primary">Category</label></strong>
                                            <select class="js-example-basic-single w-100" name="asset_name">
                                                @foreach(App\Models\Asset::all() as $asset)
                                                    <option value="{{ $asset->id }}">{{ $asset->name }}</option>
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
                                            {{--                                            <input type="file" name="attachment" class="file-upload-default">--}}
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
                                    <button id="btnFetch" type="submit"
                                            class="spinner-button btn l-bg-cherry mr-2 float-right"
                                            style="color: #fff;border: none">Send
                                        Request
                                    </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- End custom js for this page-->

    @livewireScripts
    </body>
    </html>
</div>



