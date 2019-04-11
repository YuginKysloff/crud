@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Order #{{ $order->id }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-" method="post" action="{{ route('orders.update', ['id' => $order->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="client">Client</label>
                                <select class="form-control" id="client" name="client_id">
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>{{ $client->client }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product">Product</label>
                                <select class="form-control" id="product" name="product_id">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>{{ $product->product }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="number"
                                       class="form-control"
                                       id="total"
                                       name="total"
                                       value="{{ $order->total }}">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date"
                                       class="form-control"
                                       id="date"
                                       name="date"
                                       value="{{ $order->date->format('Y-m-d') }}">
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
