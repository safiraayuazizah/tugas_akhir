@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Edit Customer Password</h3>
                    <h6 class="font-weight-normal mb-0">Fill this form to edit customer password!</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" id="password-confirm"
                                name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                        <input type="hidden" value="true" name="editPass">
                        <input type="hidden" value="{{ $customer->id }}" name="id">
                        <div class="d-flex mt-5">
                            <a href="{{ route('customers.index') }}"
                                class="btn btn-outline-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
