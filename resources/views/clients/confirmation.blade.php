@extends('layouts.client.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap justify-content-between">
            <div class="col-first">
                <img class="img-fluid" src="{{ asset('images/logo-complete.png') }}" alt="logo"
                    width="350px">
                <h1 class="mt-4">Confirmation</h1>
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
        <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-12">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li><a href="#"><span>Order number</span> : {{ $data->id }}</a></li>
                        <li><a href="#"><span>Date</span> : {{ date('d-m-Y', strtotime($data->created_at)); }}</a></li>
                        <li><a href="#"><span>Total</span> : {{ 'Rp ' . number_format($data->total, 0, ',', '.') }}</a></li>
                        <li><a href="#"><span>Payment method</span> : Check payments</a></li>
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
        <html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-PweN_Qk2MpH7NNFM"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
  </head>
 
  <body>
    <button id="pay-button" class="btn btn-warning">Pay!</button>
    <form id="submit_form"action="{{ route('submit_midtrans') }}" method="POST">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
        // customer will be redirected after completing payment pop-up
      });

      function send_response_to_form(result){
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
      }
    </script>
  </body>
</html>
        </div>
    </div>
</section>
@endsection
