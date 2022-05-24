@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo"
                    width="350px">
                <h1 class="mt-4">Settings</h1>
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
            <form action="{{ route('updateProfile') }}" method="POST">
                @csrf
                @method('PUT')
                <h3>Edit Your Profile</h3>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number"
                        value="{{ Auth::user()->phone_number }}">
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth"
                        value="{{ Auth::user()->date_of_birth }}">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-select" name="gender">
                        <option disabled
                            {{ Auth::user()->gender == null ? 'selected' : '' }}>
                            Select gender...</option>
                        <option value="L"
                            {{ Auth::user()->gender == 'L' ? 'selected' : '' }}>
                            Laki-Laki</option>
                        <option value="P"
                            {{ Auth::user()->gender == 'P' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>
                <br>
                <h5 class="mt-5">Edit Your Password</h5>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-warning mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
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
