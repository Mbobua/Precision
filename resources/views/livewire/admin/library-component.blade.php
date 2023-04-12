<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!DOCTYPE html>
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

        <div class="row mt-3">
            <div class="col-sm-12">
                <button type="button" class="btn btn-info btn-sm  btn-icon-text float-right text-white"
                        style="margin-right: 8px" data-toggle="modal" data-target="#createArticleModal">
                    Create an Article
                    <i class="ti-pencil btn-icon-append"></i>
                </button>
            </div>

        </div>

        <div class="card card-outline-primary mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                            <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                <h5>How can We Help You?</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Articles are in <code>an ascending order.</code>
                </p>
                @if(Session::has('message_sent'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('message_sent') }}
                    </div>
                @endif


                <div class="tab-pane fade show active " id="new" role="tabpanel" aria-labelledby="new-tab">
                    <div class="table-responsive">
                        <table id="example60" class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    A-ID
                                </th>
                                <th>
                                    Article Title
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Created_at
                                </th>
                                <th>
                                    Action
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            {{--                                @foreach(App\Models\User::where('user_type', 'Administrator')->get() as $user)--}}
                            <tr>
                                <td class="py-1">
                                    1
                                </td>
                                <td>
                                    Printer Setup
                                </td>
                                <td>
                                    Downloads/Installation

                                </td>
                                <td>
                                    22/02/22
                                </td>

                                <td>
                                    <a href="#"
                                       class="btn btn-sm btn-info px-2">View Article</a>
                                </td>
                            </tr>
                            {{--                                @endforeach--}}

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="createArticleModal" tabindex="-1" role="dialog"
                     aria-labelledby="createArticleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-success" id="createArticleModalLabel"><strong>CREATE AN
                                        ARTICLE</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <strong><label class="text-primary">Article Title</label></strong>
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="How to Setup a Printer" name="name"
                                                   aria-label="Subject" value="">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <strong><label class="col-form-label text-primary">Category</label></strong>
                                            <div>
                                                <select class="form-control" name="tier">
                                                    @foreach(App\Models\Tier::all() as $tier)
                                                        <option value="{{ $tier->id }}">{{ $tier->tier_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <strong><label class="text-primary">Attach File (Image/PDF
                                                    etc)</label></strong>
                                            <div class="input-group col-xs-12">
                                                <input type="file" class="form-control file-upload-info"
                                                       placeholder="Upload Image" name="attachment"><span
                                                    class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary"
                                            type="button">Upload</button></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <strong><label class="text-primary">Please describe the issue in
                                                    detail</label></strong>
                                            <label for="editor"></label><textarea id="editor"
                                                                                  name="description"></textarea>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Publish Article</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="https://cdn.tiny.cloud/1/vpqzq33el3188md9mtcyw5u3k62x5cz13rs8of0d0714ifnd/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    {{--    <script src="{{ asset('js/script.js') }}"></script>--}}

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
    </script>    <!-- End custom js for this page-->
    @livewireScripts
    </body>

    </html>
</div>
