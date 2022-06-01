@extends('layouts.client.master')

@section('content')
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="row d-flex">
                    <div class="col-lg-5 col-md-6">
                        <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}"
                            alt="logo" width="500px">
                        <div class="banner-content mt-5">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <div class="add-bag d-flex align-items-center">
                                <a href="#" class="primary-btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner-img d-flex justify-content-end">
                            <img class="img-fluid" src="{{ asset('images/illustration.png') }}"
                                alt="illustration" width="400px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- start best seller Area -->
<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Best Seller</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et
                        dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($best_sellers as $bs)
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <img class="img-fluid"
                        src="{{ asset('storage/' . $bs->course->thumbnail) }}" alt="">
                    <div class="product-details">
                        <div style="height: 100px !important">
                            <h6>{{ $bs->course->title }}</h6>
                            <h6 class="text-muted">{{ $bs->course->creator }}</h6>
                            <div class="price">
                                <h5 style="color: #ffba00">Rp
                                    {{ number_format($bs->course->price, 0, ',', '.') }}
                                </h5>
                            </div>
                        </div>
                        <div class="prd-bottom">
                            <a href="{{ route('shoppingCarts.store', $bs->course->id) }}"
                                class="social-info">
                                <span class="ti-bag"></span>
                                <p class="hover-text">add to cart</p>
                            </a>
                            <a href="" class="social-info">
                                <span class="lnr lnr-move"></span>
                                <p class="hover-text">view more</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
<!-- end best seller Area -->

<!-- start product Area -->
<section class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h1>All Courses</h1>
                <p>There are {{ $courses_total }} courses available!
                    Add to cart and checkout the courses you want.
                    You will get useful knowledge.</p>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($courses as $course)
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <img class="img-fluid"
                        src="{{ asset('storage/' . $course->thumbnail) }}" alt="">
                    <div class="product-details">
                        <div style="height: 100px !important">
                            <h6>{{ $course->title }}</h6>
                            <h6 class="text-muted">{{ $course->creator }}</h6>
                            <div class="price">
                                <h5 style="color: #ffba00">Rp
                                    {{ number_format($course->price, 0, ',', '.') }}
                                </h5>
                            </div>
                        </div>
                        <div class="prd-bottom">
                            <a href="{{ route('shoppingCarts.store', $course->id) }}"
                                class="social-info">
                                <span class="ti-bag"></span>
                                <p class="hover-text">add to cart</p>
                            </a>
                            <a href="" class="social-info">
                                <span class="lnr lnr-move"></span>
                                <p class="hover-text">view more</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- end product Area -->
@endsection

@push('script')
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }

    </script>
@endpush
