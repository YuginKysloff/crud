@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <form id="search" method="get" action="{{ route('index') }}">
                        <input type="text" name="search[keyword]" value="{{ $params['search']['keyword'] ?? null }}" placeholder="Keyword">
                        <select name="search[field]">
                            <option value="all" {{ ($params['search']['field'] ?? '') == 'all' ? 'selected' : '' }}>All</option>
                            <option value="client" {{ ($params['search']['field'] ?? '') == 'client' ? 'selected' : '' }}>Client</option>
                            <option value="product" {{ ($params['search']['field'] ?? '') == 'product' ? 'selected' : '' }}>Product</option>
                            <option value="total" {{ ($params['search']['field'] ?? '') == 'total' ? 'selected' : '' }}>Total</option>
                            <option value="date" {{ ($params['search']['field'] ?? '') == 'date' ? 'selected' : '' }}>Date</option>
                        </select>
                        <button type="submit">Submit</button>
                    </form>
                    <div class="card-body">
                        <table id="orders" class="table table-dark" style="width:100%">
                            <thead>
                                <tr>
                                    <th>
                                        <button type="submit" form="search" name="order[client]" value="asc" class="btn btn-sm btn-dark"><i data-feather="chevron-up"></i></button>
                                        <button type="submit" form="search" name="order[client]" value="desc" class="btn btn-sm btn-dark"><i data-feather="chevron-down"></i></button>
                                        Client
                                    </th>
                                    <th>
                                        <button type="submit" form="search" name="order[product]" value="asc" class="btn btn-sm btn-dark"><i data-feather="chevron-up"></i></button>
                                        <button type="submit" form="search" name="order[product]" value="desc" class="btn btn-sm btn-dark"><i data-feather="chevron-down"></i></button>
                                        Product
                                    </th>
                                    <th>Total</th>
                                    <th>
                                        <button type="submit" form="search" name="order[date]" value="asc" class="btn btn-sm btn-dark"><i data-feather="chevron-up"></i></button>
                                        <button type="submit" form="search" name="order[date]" value="desc" class="btn btn-sm btn-dark"><i data-feather="chevron-down"></i></button>
                                        Date
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->client }}</td>
                                        <td>{{ $order->product }}</td>
                                        <td>${{ $order->total }}</td>
                                        <td>{{ $order->date->format('n/j/Y') }}</td>
                                        <td>
                                            <a href="{{ route('edit', ['id' => $order->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ route('destroy', ['id' => $order->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->appends($params)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
