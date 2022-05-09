@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Create New Course</h3>
                    <h6 class="font-weight-normal mb-0">Fill this form to create new course!</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Course</h4>
                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Title"
                                aria-label="title" required>
                        </div>
                        <div class="form-group">
                            <label>Creator</label>
                            <input type="text" id="creator" name="creator" class="form-control" placeholder="Creator"
                                aria-label="creator" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" id="price" name="price" class="form-control" placeholder="Price"
                                aria-label="price" required>
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail" class="form-control" placeholder="thumbnail"
                                aria-label="thumbnail" required>
                        </div>
                        <div class="form-group">
                            <label>Video</label>
                            <input type="file" id="video" name="video" class="form-control" placeholder="video"
                                aria-label="video" required>
                        </div>
                        <div class="d-flex mt-5">
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
