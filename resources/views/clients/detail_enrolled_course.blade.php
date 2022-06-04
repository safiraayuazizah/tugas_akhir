@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between pb-5">
            <div class="col-first mb-5">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo"
                width="350px">
                @if ($diff != 0)
                    <h1 class="mt-4" style="width: 800px">{{ $data->course->title }}</h1>
                    <h5 class="text-white">by {{ $data->course->creator }}</h5>
                    <p class="text-white">Expired at {{ date('d M Y', strtotime($data->transaction->expired_date)); }}</p>
                @else
                    <h1>Ups...</h1>
                    <h3 class="text-white">This course not available for you</h3>
                @endif
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
    @if ($diff != 0)
        <div class="row">
            <div class="col-12">
                <h5 style="line-height: 1.5 !important">
                    Hai, <br>
                    Terimakasih sudah membeli video Pembelajaran. Selama <strong>{{ $diff }} hari</strong> ke depan Anda dapat menonton melalui video streaming atau download. Selamat menikmati!
                </h5>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <video controls class="rounded" width="100%">
                    <source src="{{ asset('storage/' . $data->course->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h3>Download</h3>
                <a href="{{ route('download_video', $data->course->id) }}" class="btn btn-primary">Download this video</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <h6 class="text-center"> Anda belum membeli courses ini </h6>
                <div class="text-center mt-4">
                    <a class="gray_btn items-center" href="{{ route('home') }}">Kembali</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
