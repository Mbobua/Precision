<div>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Precision Desk | User Profile</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->

        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/user-profile.css') }}">
        @livewireStyles
    </head>
    <body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                            <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                <h5>{{ $user->name }}'s Profile</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3 py-4">

                    <div class="row">
                        <div class="col-lg-6 border-right">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/user.png') }}" width="100" class="rounded-circle"
                                     alt="Profile Photo">
                            </div>

                            <div class="text-center mt-3">
                                <span class="bg-info p-1 px-4 rounded text-white">{{ $user->name }}</span>

                                <h5 class="mt-4 mb-0">{{ $user->user_type }} | User-ID: {{ $user->id }}</h5>
                                <br>
                                <div class="col-sm-12">
                                    <span>{{$user->company->company_name ?? 'Not Available' }} | Executive Department</span>
                                </div>

                                <ul class="social-list">
                                    <li><i class="fa fa-facebook"></i></li>
                                    <li><i class="fa fa-dribbble"></i></li>
                                    <li><i class="fa fa-instagram"></i></li>
                                    <li><i class="fa fa-linkedin"></i></li>
                                    <li><i class="fa fa-google"></i></li>
                                </ul>

                                <div class="buttons">
                                    <button class="btn btn-outline-primary px-4" type="button" data-toggle="modal"
                                            data-target="#exampleModal">Edit User
                                    </button>
                                    <button class="btn btn-outline-primary px-4">Contact</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <blockquote class="blockquote blockquote-primary mt-3">
                                <table class="table table-borderless report-table mt-3">
                                    <tr>
                                        <td class="text-primary"><h5><strong>Email Address:</strong></h5></td>
                                        <td class="">
                                            <h6 class="font-weight-500"
                                                style="font-size: medium">{{ $user->email }}</h6>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="text-primary"><h5><strong>Phone Number:</strong></h5></td>
                                        <td class="">
                                            <h6 class="font-weight-500"
                                                style="font-size: medium">{{ $user->phone_number ?? 'Not Available' }}</h6>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="text-primary"><h5><strong>Tier Level:</strong></h5></td>
                                        <td class="">
                                            <h6 class="font-weight-500"
                                                style="font-size: medium">
                                                {{ $user->tier->tier_name ?? 'Unassigned' }}</h6>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="text-primary"><h5><strong>Account Created On:</strong></h5></td>
                                        <td class="">
                                            <h6 class="font-weight-500"
                                                style="font-size: medium">{{ $user->created_at }}</h6>
                                        </td>

                                    </tr>
                                </table>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel">Edit {{ $user->name }}'s
                                        Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('user.edit') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="text" name="user_id" hidden value="{{ $user->id }}">
                                        <div class="form-group">
                                            <strong><label class="text-primary">Phone No</label></strong>
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="e.g Login Issue" name="phone_number"
                                                   aria-label="Subject" value="{{ $user->phone_number ?? 'Not Available' }}">
                                        </div>
                                        <div class="form-group">
                                            <strong><label class="col-form-label text-primary">Tier Hierarchy/Level <br> <span class="text-danger">[Current Tier Level assigned -> Executive]</span></label></strong>
                                            <div>
                                                <select class="form-control" name="tier">
                                                    @foreach(App\Models\Tier::all() as $tier)
                                                        <option value="{{ $tier->id }}">{{ $tier->tier_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <strong><label class="col-form-label text-primary">Role <br> <span class="text-danger">[Current Role assigned -> {{ $user->user_type }}]</span></label></strong>
                                            <div>
                                                <select class="form-control" name="user_type">
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Agent">Agent</option>
                                                    <option value="NaboStaff">Nabo Capital-(Default)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn l-bg-cherry text-white">Save Changes</button>
                                    </div>
                                </form>
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

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    @livewireScripts
    </body>
    </html>

</div>
