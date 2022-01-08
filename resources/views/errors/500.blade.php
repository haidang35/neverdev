<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Neverdev 500</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Neverdev" name="description" />
        <meta content="Neverdev" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo/neverdev_favicon.png') }}">
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <style>
            .neverdev-logo-exception {
                width: 300px;
            }
        </style>
    </head>

    <body>

        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/logo/neverdev_light_logo.png') }}" class="neverdev-logo-exception"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h1 class="display-2 fw-medium">5<i class="bx bx-buoy bx-spin text-primary display-3"></i>0</h1>
                            <h4 class="text-uppercase">Internal Server Error</h4>
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary waves-effect waves-light" href="{{ route('home') }}">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-xl-6">
                        <div>
                            <img src="{{ asset('assets/admin/assets/images/error-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/admin/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/app.js') }}"></script>
    </body>
</html>
