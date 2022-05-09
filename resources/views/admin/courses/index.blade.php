@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Data Courses</h3>
                    <h6 class="font-weight-normal mb-0">There are {{ $course_total }} courses available!</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="flex-md-grow-1 flex-xl-grow-0">
                            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                                Tambah Course Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" class="img-xl rounded" alt="profile image">
                            <div class="ms-sm-3 ms-md-0 ms-xl-5 mt-2 mt-sm-0 mt-md-3 mt-xl-3">
                                <h6 class="mb-1"><a href="{{ route('courses.show', $course->id) }}" style="text-decoration: none">{{ $course->title }}</a></h6>
                                <p class="text-muted mb-2">{{ $course->creator }}</p>
                                <p class="mb-3 text-success font-weight-bold fs-5">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-primary"> Edit </a> 
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="btn btn-sm btn-outline-danger" onclick="this.closest('form').submit();return false;"> Delete </a> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection