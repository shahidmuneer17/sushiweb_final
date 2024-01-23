@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <h1>My Orders</h1>
        @foreach(Auth::user()->orders as $order)
            <div class="order">
                <h2>Order #{{ $order->id }}</h2>
                <p>Delivery Method: {{ $order->delivery_method }}</p>
                <p>Total: ${{ $order->total }}</p>
                <h3>Order Details</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                            <tr>
                                <td>{{ $detail->product_id }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>${{ $detail->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @else
        <p>Please <a href="{{ route('login') }}">log in</a> to view your orders.</p>
    @endif
@endsection