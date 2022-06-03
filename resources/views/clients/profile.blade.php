@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo"
                    width="350px">
                <h1 class="mt-4">My Profile</h1>
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
        <div class="col">
            <div class="card shadow border-none">
                <div class="card-body">
                    <div class="card-title">Total Enrolled Courses</div>
                    <h1>5</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow border-none">
                <div class="card-body">
                    <div class="card-title">Total Transactions</div>
                    <h1>4</h1>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-5 mb-4">
    <div class="row">
        <div class="col-12">
            <dl class="row">
                <dt class="col-sm-3" style="font-size: 16px">Full Name</dt>
                <dd class="col-sm-9" style="font-size: 16px">{{ Auth::user()->name }}</dd>

                <dt class="col-sm-3" style="font-size: 16px">Email</dt>
                <dd class="col-sm-9" style="font-size: 16px">{{ Auth::user()->email }}</dd>

                <dt class="col-sm-3" style="font-size: 16px">Gender</dt>
                <dd class="col-sm-9" style="font-size: 16px">{{ Auth::user()->gender === 'L' ? 'Laki - laki' : 'Perempuan' }}</dd>

                <dt class="col-sm-3" style="font-size: 16px">Phone Number</dt>
                <dd class="col-sm-9" style="font-size: 16px">{{ Auth::user()->phone_number }}</dd>

                <dt class="col-sm-3" style="font-size: 16px">Age</dt>
                <dd class="col-sm-9" style="font-size: 16px">{{ Auth::user()->date_of_birth == null ? '-' : date_diff(date_create(Auth::user()->date_of_birth), date_create(date("Y-m-d")))->format('%y') . ' tahun'  }}</dd>
            </dl>
            <div class="add-bag d-flex align-items-center">
                    <a class="primary-btn" href="{{ route('settings') }}">Edit My Profile</a>
                    </div>             
        </div>
        
    </div>
</div>
@endsection
