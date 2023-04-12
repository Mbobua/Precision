<div>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Custom Ticket | Precision Desk</title>
        <!-- Plugin css for this page -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
        <style>
            .l-bg-cherry {
                background: linear-gradient(to right, #493240, #f09) !important;
                color: #fff;
            }

            .l-bg-orange-dark {
                background: linear-gradient(to right, #a86008, #ffba56) !important;
                color: #fff;
            }


            .item .item-content {
                padding: 30px 35px
            }

            .image-upload {
                width: 100%;
                height: 300px;
                border: 1px dashed #ddd;
                border-radius: 5px;
                margin-bottom: 20px;
                position: relative;
                text-align: center;
                background: #f8f8f9;
                color: #666;
                overflow: hidden
            }

            .item-wrapper form img {
                margin-bottom: 20px;
                width: auto;
                height: auto;
                max-height: 400px;
                width: auto;
                border-radius: 5px;
                overflow: hidden
            }

            .image-upload img {
                height: 100% !important;
                width: auto !important;
                border-radius: 0px;
                margin: 0 auto;
            }

            .image-upload i {
                font-size: 6em;
                color: #ccc;
            }

            .image-upload input {
                cursor: pointer;
                opacity: 0;
                height: 100%;
                width: 100%;
                z-index: 10;
                position: absolute;
                top: 0;
                left: 0;
            }

            .item-wrapper input {
                height: 43px;
                line-height: 43px;
                border: 1px solid #ddd;
                border-radius: 4px;
                margin-bottom: 20px;
            }

            .btn-upload {
                padding: 10px 20px;
                margin-left: 10px;
            }

            .btn-success:not(:disabled):not(.disabled).active, .btn-success:not(:disabled):not(.disabled):active, .show > .btn-success.dropdown-toggle {
                color: #fff;
                background-color: #0062cc;
                border-color: #1c7430;
            }

            .upload-input-group {
                margin-bottom: 10px;
            }

            .input-group > .custom-select:not(:last-child) {
                height: 45px;
            }

            .input-group > .form-control:not(:last-child) {
                height: 45px;
            }

            .l-bg-blue-dark {
                background: linear-gradient(to right, #4286f4, #373b44) !important;
                color: #fff;
            }
        </style>
    </head>

    <body>
    <div class="col-12 grid-margin">
        <br>
        <div class="card card-outline-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                            <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                <h5>Add a New User</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="form-sample" action="{{ route('admin.add-new-user') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Name</label></strong>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Full Name" name="name"
                                       aria-label="Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Email Address</label></strong>
                                <input type="email" class="form-control form-control-sm"
                                       placeholder="Email Address" name="email"
                                       aria-label="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Phone Number</label></strong>
                                <input type="tel" class="form-control form-control-sm"
                                       placeholder="+254-XXX-XXX-XXX" name="phone_number"
                                       pattern="+254[0-9]{1}[0-9]{1}[0-9]{3}[0-9]{4}"
                                       aria-label="Phone" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Role</label></strong>
                                <select class="js-example-basic-single w-100" name="user_type">
                                    <option value="Administrator">Administrator</option>
                                    <option value="Agent">Agent</option>
                                    <option value="default_user">Default-User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Company</label></strong>
                                <select class="js-example-basic-single w-100" name="company">
                                    @foreach(App\Models\Companies::all() as $company)
                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                    </div>

                    <div class="row">

                    </div>

                    <hr class="border border-primary">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <div class="form-check">

                                    <strong> <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="phone_number"
                                                   value="true">
                                            Send SMS Notification to the New User
                                        </label>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn l-bg-cherry float-right" style="color: #fff" data-toggle="modal"
                            data-target="#exampleModal">
                        Save details
                    </button>
                </form>
            </div>
        </div>
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
    <script src="https://cdn.tiny.cloud/1/vpqzq33el3188md9mtcyw5u3k62x5cz13rs8of0d0714ifnd/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
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
