@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo" width="350px">
                <h1 class="mt-4">About Us</h1>
            </div>
            <div class="col-second">
                <div class="banner-img">
                    <img class="img-fluid" src="{{ asset('images/illustration.png') }}" alt="illustration" width="250px">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12 col-md-12 blog_details">
                        {!! $profile->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
