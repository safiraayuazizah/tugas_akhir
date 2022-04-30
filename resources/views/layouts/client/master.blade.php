@extends('layouts.client.base')

@section('slot')

    <!-- Start Header Area -->
    @include('layouts.client.partials.header')
    <!-- End Header Area -->

    <!-- Start Content Area -->
    @yield('content')
    <!-- End Content Area -->

    <!-- Start Footer Area -->
    @include('layouts.client.partials.footer')
    <!-- End footer Area -->

@endsection