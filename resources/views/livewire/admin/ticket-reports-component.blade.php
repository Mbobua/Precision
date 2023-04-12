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
        @livewireStyles
    </head>
    <body>
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                             data-ride="carousel">

                            <button type="button" class="btn btn-outline-info btn-sm  btn-icon-text float-right"
                                    style="margin-right: 8px">
                                Print
                                <i class="ti-printer btn-icon-append"></i>
                            </button>

                            <button type="button" class="btn btn-outline-dribbble btn-sm  btn-icon-text float-right"
                style="margin-right: 8px" onclick="PrintPDF();">
            PDF
            <i class="ti-download btn-icon-append"></i>
        </button>
                            <br>
                            <br>

                            <div class="carousel-inner" id="ticket_details">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-12">
                                            <div class="row">
                                                <div class="col-md-12 border-right border-primary">
                                                    <blockquote class="blockquote blockquote-info">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <h3 class="font-weight-500 mb-xl-4 text-info"
                                                                style="font-size: medium">No. of Tickets per Status</h3>
                                                        </div>
                                                        <div style="overflow-x: scroll">
                                                            <div style="width: 600px; height: 500px">
                                                                {!! $chart1->container() !!}
                                                            </div>
                                                        </div>
                                                    </blockquote>
                                                </div>
                                            </div>
                                            <br>
                                            <hr class="border border-primary">
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12 border-right border-primary">
                                                    <blockquote class="blockquote blockquote-danger">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <h3 class="font-weight-500 mb-xl-4 text-danger"
                                                                style="font-size: medium;">No. of Unsolved
                                                                Tickets per Agent</h3>
                                                        </div>
                                                        <div style="overflow-x: scroll">
                                                            <div style="width: 700px; height: 500px">
                                                                {!! $chart2->container() !!}
                                                            </div>
                                                        </div>
                                                    </blockquote>

                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                    </div>
                                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
      <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js'></script>
    <script type='text/javascript'
            src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.min.js"></script>
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
                    pdfMake.createPdf(docDefinition).download("Admin-Tickets-Report.pdf");
                }
            });
        }
    </script>

    {!! $chart1->script() !!}

    {!! $chart2->script() !!}
    

    @livewireScripts

    </body>
    </html>

</div>
