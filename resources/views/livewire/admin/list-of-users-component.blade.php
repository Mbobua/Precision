<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skydash Admin</title>

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
        <div class="card card-outline-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                            <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                <h5>List of All Users</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Users are in <code>an ascending order.</code>
                </p>
                @if(Session::has('message_sent'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('message_sent') }}
                    </div>
                @endif
                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-info" id="new-tab" data-toggle="tab" href="#new"
                           role="tab" aria-controls="home" aria-selected="true">Administrators
                        <span
                            class="badge badge-info">{{\App\Models\User::where('user_type', 'Administrator')->count()}}</span>
                        <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="in-progress-tab" data-toggle="tab" href="#agents"
                           role="tab" aria-controls="home" aria-selected="true">Agents
                            <span
                                class="badge badge-primary">{{\App\Models\User::where('user_type', 'Agent')->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" id="open-tab" data-toggle="tab" href="#open"
                           role="tab" aria-controls="home" aria-selected="true">Default Users
                            <span
                                class="badge badge-success">{{\App\Models\User::where('user_type', 'default_user')->count()}}</span>
                            <span class="sr-only">unread messages</span></a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="new" role="tabpanel" aria-labelledby="new-tab">
                        <div class="table-responsive">
                            <table id="example60" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        U-ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone No.
                                    </th>
                                    <th>
                                        Role
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
                                @foreach(App\Models\User::where('user_type', 'Administrator')->get() as $user)
                                    <tr>
                                        <td class="py-1">
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone_number ?? 'Not Available' }}</td>
                                        <td>
                                            <label class="badge badge-primary"
                                                   style=" font-size: 0.9em;"><strong>{{ $user->user_type }}</strong></label>

                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>

                                        <td>
                                            <a href="{{route('admin.user-profile',$user)}}"
                                               class="btn btn-sm btn-info px-2">View User</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="agents" role="tabpanel" aria-labelledby="agent-tab">
                        <div class="table-responsive">
                            <table id="example62" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        U-ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone No.
                                    </th>
                                    <th>
                                        Role
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
                                @foreach(App\Models\User::where('user_type', 'Agent')->get() as $user)
                                    <tr>
                                        <td class="py-1">
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone_number ?? 'Not Available' }}</td>
                                        <td>
                                            <label class="badge badge-primary"
                                                   style=" font-size: 0.9em;"><strong>{{ $user->user_type }}</strong></label>

                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>

                                        <td>
                                            <a href="{{route('admin.user-profile',$user)}}"
                                               class="btn btn-sm btn-info px-2">View User</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="open" role="tabpanel" aria-labelledby="open-tab">
                        <div class="table-responsive">
                            <table id="example63" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        U-ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone No.
                                    </th>
                                    <th>
                                        Role
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
                                @foreach(App\Models\User::where('user_type', 'default_user')->get() as $user)
                                    <tr>
                                        <td class="py-1">
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone_number ?? 'Not Available' }}</td>
                                        <td>
                                            <label class="badge badge-primary"
                                                   style=" font-size: 0.9em;"><strong>{{ $user->user_type }}</strong></label>

                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>

                                        <td>
                                            <a href="{{route('admin.user-profile',$user)}}"
                                               class="btn btn-sm btn-info px-2">View User</a>
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
