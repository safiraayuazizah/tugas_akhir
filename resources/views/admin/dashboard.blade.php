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
                            <p class="fs-44 mb-4">4006</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 stretch-card transparent">
                    <div class="card" style="background: #fea500; color: white">
                        <div class="card-body">
                            <p class="mb-4 pb-2">Total Transactions</p>
                            <p class="fs-44 mb-4">61344</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 stretch-card transparent">
                    <div class="card" style="background: #FFB652; color: white">
                        <div class="card-body">
                            <p class="mb-4 pb-2">Total Courses</p>
                            <p class="fs-44 mb-4">34040</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 stretch-card transparent">
                    <div class="card" style="background: #FF784F; color: white">
                        <div class="card-body">
                            <p class="mb-4 pb-2">Total Customers</p>
                            <p class="fs-44 mb-4">47033</p>
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
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Search Engine Marketing</td>
                                    <td class="font-weight-bold">$362</td>
                                    <td>21 Sep 2018</td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Search Engine Optimization</td>
                                    <td class="font-weight-bold">$116</td>
                                    <td>13 Jun 2018</td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display Advertising</td>
                                    <td class="font-weight-bold">$551</td>
                                    <td>28 Sep 2018</td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pay Per Click Advertising</td>
                                    <td class="font-weight-bold">$523</td>
                                    <td>30 Jun 2018</td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-Mail Marketing</td>
                                    <td class="font-weight-bold">$781</td>
                                    <td>01 Nov 2018</td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-danger">Cancelled</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Referral Marketing</td>
                                    <td class="font-weight-bold">$283</td>
                                    <td>20 Mar 2018</td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Social media marketing</td>
                                    <td class="font-weight-bold">$897</td>
                                    <td>26 Oct 2018</td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                </tr>
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
