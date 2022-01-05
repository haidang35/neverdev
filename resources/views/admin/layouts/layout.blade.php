<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Jinner Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/admin/assets/images/favicon.ico') }}">
        <link href="{{ asset('assets/admin/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/assets/css/customize.css') }}" rel="stylesheet" type="text/css" />
        <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
        <link href="{{ asset('assets/admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        @stack('styles')
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

         @include('admin.layouts.header')
         @include('admin.layouts.left_sidebar')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

               @yield('content')
                
              @include('admin.layouts.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
 
       @include('admin.layouts.right_sidebar')
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        @include('admin.layouts.scripts')
        @stack('scripts')
    </body>
</html>