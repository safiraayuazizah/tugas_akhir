@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">About Us</h3>
                    <h6 class="font-weight-normal mb-0">Fill this form to manage your profile!</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            @if($count == 0)
                <div class="card">
                    <form action="{{ route('about_us.store') }}" method="POST" id="form">
                        @csrf
                        <div class="card-body">
                            <p class="card-title mb-0">About Us</p>
                            <div class="mt-3">
                                <div id="editor"
                                    style="height: 42vh; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">

                                </div>
                            </div>
                            <textarea name="content" id="content" style="display: none"></textarea>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="card">
                    <form action="{{ route('about_us.update', $profile->id) }}" method="POST" id="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <p class="card-title mb-0">About Us</p>
                            <div class="mt-3">
                                <div id="editor"
                                    style="height: 42vh; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">
                                    {!! $profile->content !!}
                                </div>
                            </div>
                            <textarea name="content" id="content" style="display: none"></textarea>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('style')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('script')
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
        });

    </script>

    <script>
        $("#form").on("submit", function () {
            $("#content").val(quill.container.firstChild.innerHTML);
        });
    </script>
@endpush
