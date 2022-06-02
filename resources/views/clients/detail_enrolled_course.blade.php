@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo"
                    width="350px">
                <h1 class="mt-4">{{ $data->title }}</h1>
                <h5 class="text-white">by {{ $data->creator }}</h5>
            </div>
            <div class="col-second">
                <div class="banner-img">
                    <img class="img-fluid" src="{{ asset('images/illustration.png') }}"
                        alt="illustration" width="250px">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h6 style="line-height: 1.5 !important">
                Hai, <br>
                Terimakasih sudah membeli video Pembelajaran. Selama beberapa hari ke depan Anda dapat menonton melalui video streaming atau download. Selamat menikmati!
            </h6>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <video controls class="rounded" width="100%">
                <source src="{{ asset('storage/' . $data->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h3>Download</h3>
            <a href="{{ route('download_video', $data->id) }}" class="btn btn-primary">Download this video</a>
        </div>
    </div>
</div>
@endsection
