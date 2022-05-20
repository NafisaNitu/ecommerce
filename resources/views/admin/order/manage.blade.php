@extends('admin.master')

@section('title')
    manage order
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Manage Order</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Dae & Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($orders as $order)
                                <tbody>
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>&#2547;{{ $order->total }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('M d,Y,h:iA') }}</td>
                                    <td>Pub</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">status</a>
                                        <a href="{{ route('view-order', ['id' =>$order->id ]) }}" class="btn btn-secondary btn-sm">edit</a>
                                        <a href="" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm">del</a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



