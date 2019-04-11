@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table" style="width:100%">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Product</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->client }}</td>
                                    <td>{{ $order->product }}</td>
                                    <td>${{ $order->total }}</td>
                                    <td>{{ $order->date->format('n/j/Y') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
