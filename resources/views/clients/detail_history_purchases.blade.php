@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo"
                    width="350px">
                <h1 class="mt-4">Detail History Purchase</h1>
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

<section class="order_details section_gap">
    <div class="container">
        <div class="row order_d_inner">
            <div class="col-lg-12">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li><a href="#"><span>Order number</span> : {{ $data->id }}</a></li>
                        <li><a href="#"><span>Date</span> : {{ date('d-m-Y', strtotime($data->created_at)); }}</a></li>
                        <li><a href="#"><span>Total</span> : {{ 'Rp ' . number_format($data->total, 0, ',', '.') }}</a></li>
                        <li><a href="#"><span>Payment method</span> : Check payments</a></li>
                        <li>
                          <a href="#">
                            <span>Status</span> : 
                            <div class="{{ $data->status == 'pending' ? 'badge badge-warning' : ($data->status == 'completed' ? 'badge badge-success' : 'badge badge-danger') }} text-capitalize">
                              {{ $data->status }}
                            </div>
                          </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data->transactions as $item)
                            <tr>
                                <td>
                                    <p>{{ $item->course->title }}</p>
                                </td>
                                <td>
                                    <p>{{ 'Rp ' . number_format($item->course->price, 0, ',', '.') }}</p>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <p>{{ 'Rp ' . number_format($data->total, 0, ',', '.') }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-5 text-center">
          <a href="{{ route('history_purchases') }}" class="btn btn-warning">KEMBALI</a>
        </div>
    </div>
</section>
@endsection
