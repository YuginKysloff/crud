@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Orders</div>
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
                        <form class="form form-inline mb-3" id="search" method="get" action="{{ route('orders.index') }}">
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       name="search[keyword]"
                                       value="{{ $params['search']['keyword'] ?? null }}"
                                       placeholder="Keyword">
                            </div>
                            <div class="form-group">
                                <select name="search[field]" class="form-control">
                                    <option value="all" {{ ($params['search']['field'] ?? '') == 'all' ? 'selected' : '' }}>All</option>
                                    <option value="client" {{ ($params['search']['field'] ?? '') == 'client' ? 'selected' : '' }}>Client</option>
                                    <option value="product" {{ ($params['search']['field'] ?? '') == 'product' ? 'selected' : '' }}>Product</option>
                                    <option value="total" {{ ($params['search']['field'] ?? '') == 'total' ? 'selected' : '' }}>Total</option>
                                    <option value="date" {{ ($params['search']['field'] ?? '') == 'date' ? 'selected' : '' }}>Date</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                        <table id="orders" class="table table-dark" style="width:100%">
                            <thead>
                            <tr>
                                <th>
                                    <button type="submit"
                                            form="search"
                                            name="order[client]"
                                            value="asc"
                                            class="btn btn-sm btn-dark"><i data-feather="chevron-up"></i></button>
                                    <button type="submit"
                                            form="search"
                                            name="order[client]"
                                            value="desc"
                                            class="btn btn-sm btn-dark"><i data-feather="chevron-down"></i></button>
                                    Client
                                </th>
                                <th>
                                    <button type="submit"
                                            form="search"
                                            name="order[product]"
                                            value="asc"
                                            class="btn btn-sm btn-dark"><i data-feather="chevron-up"></i></button>
                                    <button type="submit"
                                            form="search"
                                            name="order[product]"
                                            value="desc"
                                            class="btn btn-sm btn-dark"><i data-feather="chevron-down"></i></button>
                                    Product
                                </th>
                                <th class="pb-3">Total</th>
                                <th>
                                    <button type="submit"
                                            form="search"
                                            name="order[date]"
                                            value="asc"
                                            class="btn btn-sm btn-dark"><i data-feather="chevron-up"></i></button>
                                    <button type="submit"
                                            form="search"
                                            name="order[date]"
                                            value="desc"
                                            class="btn btn-sm btn-dark"><i data-feather="chevron-down"></i></button>
                                    Date
                                </th>
                                <th class="pb-3">Actions</th>
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
                                        <a href="{{ route('orders.edit', ['id' => $order->id]) }}"
                                           class="btn btn-sm btn-warning">Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger" onclick="conf(event)">
                                            Delete
                                        </button>
                                        <form id="logout-form"
                                              action="{{ route('orders.destroy', ['id' => $order->id]) }}"
                                              method="POST"
                                              style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
    <script>
        function conf(e) {
            var answer = confirm('Do you want to delete this order?');
            if (answer) {
                e.preventDefault();
                document.getElementById('logout-form').submit();
            }
        }
    </script>
@endsection
