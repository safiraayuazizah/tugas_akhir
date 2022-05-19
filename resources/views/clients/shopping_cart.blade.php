@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo"
                    width="350px">
                <h1 class="mt-4">Shopping Cart</h1>
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

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            @if($data->isEmpty())
                <h6 class="text-center"> Anda belum memiliki courses apapun di keranjang </h6>
                <div class="text-center mt-4">
                    <a class="gray_btn items-center" href="{{ route('home') }}">Continue Shopping</a>
                </div>

            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Courses</th>
                                <th scope="col" style="width: 144px">Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach($data as $dt)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ asset('storage/' . $dt->course->thumbnail) }}"
                                                    alt="" style="max-width: 152px; max-height: 102px">
                                            </div>
                                            <div class="media-body">
                                                <h6>{{ $dt->course->title }}</h6>
                                                <p>{{ $dt->course->creator }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ 'Rp ' . number_format($dt->course->price, 0, ',', '.') }}
                                        </h5>
                                    </td>
                                    <td>
                                        <form action="{{ route('shopping_carts.destroy', $dt->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="text-secondary" style="cursor: pointer" title="Delete course" onclick="this.closest('form').submit();return false;"><i class="fa fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $total += $dt->course->price;
                                @endphp
                            @endforeach
                            <tr class="bottom_button">
                                <td class="text-right pr-5">
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>{{ 'Rp ' . number_format($total, 0, ',', '.') }}
                                    </h5>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="out_button_area">
                                <td>
                                    <a class="gray_btn" href="{{ route('home') }}">Continue
                                        Shopping</a>
                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex justify-content-end align-items-center">
                                        <a class="primary-btn" href="#">Proceed to checkout</a>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
@endsection

@push('script')
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }

    </script>
@endpush