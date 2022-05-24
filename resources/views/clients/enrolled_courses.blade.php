@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo" width="350px">
                <h1 class="mt-4">Enrolled Courses</h1>
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

<div class="container my-5">
  <div class="row">
      @foreach ($data as $item)
        <div class="col-lg-3 col-md-6">
            <div class="single-product">
                <img class="img-fluid"
                    src="{{ asset('storage/' . $item->course->thumbnail) }}" alt="">
                <div class="product-details">
                    <div style="height: 100px !important">
                        <a href="{{ route('detail_enrolled_courses', $item->course_id) }}">
                            <h6>{{ $item->course->title }}</h6>
                        </a>
                        <h6 class="text-muted">{{ $item->course->creator }}</h6>
                    </div>
                </div>
            </div>
        </div>
      @endforeach
  </div>
</div>
@endsection