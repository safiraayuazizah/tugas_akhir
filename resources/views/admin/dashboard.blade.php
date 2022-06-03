@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome Admin</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white" type="button">
                                <i class="mdi mdi-calendar"></i> Today ({{ date('d M Y') }})
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin transparent">
            <div class="row">
                <div class="col-md-3 stretch-card transparent">
                    <div class="card" style="background: #fab600; color: white">
                        <div class="card-body">
                            <p class="mb-4 pb-2">Today’s Transactions</p>
                            <p class="fs-44 mb-4">{{ $transaction_today_count }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 stretch-card transparent">
                    <div class="card" style="background: #fea500; color: white">
                        <div class="card-body">
                            <p class="mb-4 pb-2">Total Transactions</p>
                            <p class="fs-44 mb-4">{{ $transaction_count }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 stretch-card transparent">
                    <div class="card" style="background: #FFB652; color: white">
                        <div class="card-body">
                            <p class="mb-4 pb-2">Total Courses</p>
                            <p class="fs-44 mb-4">{{ $course_count }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 stretch-card transparent">
                    <div class="card" style="background: #FF784F; color: white">
                        <div class="card-body">
                            <p class="mb-4 pb-2">Total Customers</p>
                            <p class="fs-44 mb-4">{{ $customer_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Top Courses</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Creator</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($top_course as $item)
                                    <tr>
                                        <td>{!! wordwrap($item->course->title, 110, "<br>\n") !!}</td>
                                        <td class="font-weight-bold">{{ $item->course->creator }}</td>
                                        <td>{{ 'Rp ' . number_format($item->course->price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/skydash/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/skydash/js/select.dataTables.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('assets/skydash/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/skydash/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/skydash/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/skydash/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/skydash/js/Chart.roundedBarCharts.js') }}"></script>
@endpush
