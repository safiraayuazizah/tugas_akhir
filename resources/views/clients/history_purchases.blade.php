@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo"
                    width="350px">
                <h1 class="mt-4">History Purchases</h1>
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
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Top Courses</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ date('d M Y', strtotime($transaction->created_at)); }}</td>
                                        <td>{{ 'Rp ' . number_format($transaction->total, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="{{ $transaction->status == 'pending' ? 'badge badge-warning' : ($transaction->status == 'completed' ? 'badge badge-success' : 'badge badge-danger') }} text-capitalize">{{ $transaction->status }}</div>
                                        </td>
                                        <td><a href="{{ route('history_purchases_detail', $transaction->id) }}">View Detail</a></td>
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
