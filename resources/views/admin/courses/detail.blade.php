@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Data Courses</h3>
                    <h6 class="font-weight-normal mb-0">Detail course of {{ $course->title }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="d-sm-flex flex-row flex-wrap align-items-center">
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" class="img-md rounded" alt="profile image">
                            <div class="ms-sm-3 ms-md-3 ms-xl-3 mt-2 mt-sm-0 mt-md-3 mt-xl-2">
                                <h3 class="mb-2">{{ $course->title }}</h3>
                                <h5 class="text-muted mb-2">{{ $course->creator }}</h5>
                            </div>
                        </div>
                        <h2 class="mb-3 text-success font-weight-bold">Rp
                            {{ number_format($course->price, 0, ',', '.') }}
                        </h2>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <video controls class="rounded" width="100%">
                                <source src="{{ asset('storage/' . $course->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary me-2">Back</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-outline-primary me-2"> Edit </a> 
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="btn btn-outline-danger" onclick="this.closest('form').submit();return false;"> Delete </a> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
