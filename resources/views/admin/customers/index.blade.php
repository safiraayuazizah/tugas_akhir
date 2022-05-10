@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Data Customers</h3>
                    <h6 class="font-weight-normal mb-0">There are {{ $customer_total }} customers!</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Phone Number</th>
                                    <th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->gender == null ? '-' : ($customer->gender == 'L' ? 'Laki-laki' : 'Perempuan') }}</td>
                                        <td>{{ $customer->phone_number == null ? '-' : $customer->phone_number }}</td>
                                        <td>{{ $customer->date_of_birth == null ? '-' : date_diff(date_create($customer->date_of_birth), date_create(date("Y-m-d")))->format('%y') . 'thn'  }}</td>
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