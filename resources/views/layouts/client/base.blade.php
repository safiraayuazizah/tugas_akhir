<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/karma/images/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>warungpeneleh.com</title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="{{ asset('assets/karma/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/karma/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/karma/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/karma/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/karma/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/karma/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/karma/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/karma/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/karma/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/karma/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/karma/css/main.css') }}">
    <!-- Custom page css -->
    @stack('style')
</head>

<body>

    @yield('slot')
    <!-- End footer Area -->

    <script src="{{ asset('assets/karma/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/karma/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/karma/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/karma/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/karma/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/karma/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/karma/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/karma/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/karma/js/main.js') }}"></script>
    <!-- Custom page script -->
    @stack('script')
</body>

</html>
