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
                background: linear-gradient(to right, #8d188e,#0d47a1) !important;
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
                border-radius: 5px;
                overflow: hidden
            }

            .image-upload img {
                height: 100% !important;
                width: auto !important;
                border-radius: 0px;
                margin: 0 auto
            }

            .image-upload i {
                font-size: 6em;
                color: #ccc
            }

            .image-upload input {
                cursor: pointer;
                opacity: 0;
                height: 100%;
                width: 100%;
                z-index: 10;
                position: absolute;
                top: 0;
                left: 0
            }

            .item-wrapper input {
                height: 43px;
                line-height: 43px;
                border: 1px solid #ddd;
                border-radius: 4px;
                margin-bottom: 20px
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
                background: linear-gradient(to right, #373b44, #4286f4) !important;
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
                            <div class="card-header l-bg-blue-dark" style="border-radius: 10px">
                                <h5>My Account Center (Absenteeism Portal)</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="form-sample" enctype="multipart/form-data" action="#" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Date From:</label></strong>
                                <input type="datetime-local" class="form-control form-control-sm"
                                       placeholder="Ticket Subject" name="subject"
                                       aria-label="Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Date To (Expected Date of Return)</label></strong>
                                <input type="datetime-local" class="form-control form-control-sm"
                                       placeholder="Ticket Subject" name="subject"
                                       aria-label="Username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Select Reason for Unavailability</label></strong>
                                <select class="js-example-basic-single w-100" name="requester_id">
                                    @foreach(App\Models\LeaveReason::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->reason }}</option>
                                    @endforeach
                                    <option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">File upload (PDF/Photo)</label></strong>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-sm-10">
                                <strong><label class="text-primary">Please describe the issue in detail</label></strong>
                                <label for="editor"></label><textarea id="editor" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="border border-primary">
                    <button type="submit" class="btn l-bg-blue-dark float-right" style="color: #fff" data-toggle="modal" data-target="#exampleModal">
                        Submit Details
                    </button>

                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/vpqzq33el3188md9mtcyw5u3k62x5cz13rs8of0d0714ifnd/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $(function () {
            $(document).on('click', '.btn-add', function (e) {
                e.preventDefault();
                var controlForm = $('.controls:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('Remove <span class="fa fa-trash"> </span>');
            }).on('click', '.btn-remove', function (e) {
                $(this).parents('.entry:first').remove();
                e.preventDefault();
                return false;
            });
        });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false
        });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false
        });
    </script>

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
