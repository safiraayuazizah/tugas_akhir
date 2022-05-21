<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>warungpeneleh.com</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/skydash/vendors/feather/feather.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/skydash/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/skydash/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    @stack('style')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet"
        href="{{ asset('assets/skydash/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/skydash/images/favicon.png') }}" />
    <style>
        .content-wrapper {
            background-color: #fffbf0 !important;
        }

        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .count-indicator .count {
            background: #f5b300 !important;
        }

        .sidebar .nav:not(.sub-menu) > .nav-item.active {
            background: #f5b300 !important;
        }

        .sidebar .nav .nav-item.active > .nav-link {
            background: #f5b300 !important;
        }

        .sidebar .nav:not(.sub-menu) > .nav-item:hover > .nav-link, .sidebar .nav:not(.sub-menu) > .nav-item:hover[aria-expanded="true"] {
            background: #f5b300 !important;
        }

        .footer {
            background-color: #fffbf0 !important;
        }

        a {
            color: #f5b300;
        }

        a:hover {
            color: #dba000;
        }

        .text-primary {
            color: #f5b300 !important;
        }

        .btn-primary {
            background: #f5b300 !important;
            border: 1px solid #f5b300;
            font-weight: bold;
        }

        .btn-primary:hover {
            border: 2px solid #ffd666;
            font-weight: bold;
        }

        .btn-outline-primary {
            border: 1px solid #f5b300;
            color: #f5b300;
            font-weight: bold;
        }

        .btn-outline-primary:hover {
            background: #f5b300 !important;
            border: 1px solid #ffd666;
            font-weight: bold;
        }

        .btn-outline-danger {
            border: 1px solid #FF784F;
            color: #FF784F;
            font-weight: bold;
        }

        .btn-outline-danger:hover {
            background: #FF784F !important;
            border: 1px solid #FF784F;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.admin.partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.admin.partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('layouts.admin.partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('assets/skydash/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('assets/skydash/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/skydash/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/skydash/js/template.js') }}"></script>
    <script src="{{ asset('assets/skydash/js/settings.js') }}"></script>
    <script src="{{ asset('assets/skydash/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @stack('script')
    <!-- End plugin js for this page -->
</body>

</html>
