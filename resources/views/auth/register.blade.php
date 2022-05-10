@extends('layouts.client.base')

@section('slot')
<!--================Register Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{ asset('images/login.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner" style="padding-top: 50px !important">
                    <h3>Register to enter</h3>
                    <form class="row login_form" method="POST" action="{{ route('register') }}"
                        id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" placeholder="Full Name"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required
                                autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required
                                autocomplete="phone_number">

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Email"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required
                                autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Password'" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control"
                                id="password-confirm" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Confirm Password'" required autocomplete="new-password">
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Register</button>
                            <a class="btn btn-link" href="{{ route('login') }}">Already have an account? Login here!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Register Box Area =================-->
@endsection
