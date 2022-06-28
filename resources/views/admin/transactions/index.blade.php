@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Data Transactions</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->customer->name }}</td>
                                        <td>{{ date('d M Y', strtotime($transaction->created_at)); }}</td>
                                        <td>{{ 'Rp ' . number_format($transaction->total, 0, ',', '.') }}</td>
                                        <td class="font-weight-medium">
                                            <div class="{{ $transaction->status == 'pending' ? 'badge badge-warning' : ($transaction->status == 'completed' ? 'badge badge-success' : 'badge badge-danger') }} text-capitalize">{{ $transaction->status }}</div>
                                        </td>
                                        
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