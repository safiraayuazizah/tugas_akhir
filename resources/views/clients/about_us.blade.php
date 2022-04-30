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
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('assets/karma/images/blog/feature-img1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 blog_details">
                        <h2>Astronomy Binoculars A Great Alternative</h2>
                        <p class="excert">
                            MCSE boot camps have its supporters and its detractors. Some people do not understand
                            why you should have to spend money on boot camp when you can get the MCSE study
                            materials yourself at a fraction.
                        </p>
                        <p>
                            Boot camps have its supporters and its detractors. Some people do not understand why
                            you should have to spend money on boot camp when you can get the MCSE study materials
                            yourself at a fraction of the camp price. However, who has the willpower to actually
                            sit through a self-imposed MCSE training. who has the willpower to actually sit through
                            a self-imposed
                        </p>
                        <p>
                            Boot camps have its supporters and its detractors. Some people do not understand why
                            you should have to spend money on boot camp when you can get the MCSE study materials
                            yourself at a fraction of the camp price. However, who has the willpower to actually
                            sit through a self-imposed MCSE training. who has the willpower to actually sit through
                            a self-imposed
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <div class="quotes">
                            MCSE boot camps have its supporters and its detractors. Some people do not understand
                            why you should have to spend money on boot camp when you can get the MCSE study
                            materials yourself at a fraction of the camp price. However, who has the willpower to
                            actually sit through a self-imposed MCSE training.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
