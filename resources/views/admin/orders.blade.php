@extends('admin.layouts.admin')

@section('content')
<section class="container">
    @php
    $user = Auth::user();
    if ($user->role != 'admin') {
    $orders = $orders->where('rest_id', $user->rest_id);
}
    $pendingOrders = $orders->where('order_status', 'pending')->sortByDesc('order_id');
    $allOrders = $orders->sortByDesc('order_status');
    @endphp
    <div class="row mb-3">
        <div class="col-12">
            <h1>List of Orders</h1>
        </div>
    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#pendingOrders">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#allOrders">All</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="allOrders">
            <!-- All Orders Tab -->
            <div class="row">
                <div class="col-12">
                    <input type="text" id="search" placeholder="Search by Customer Phone Number">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Customer Phone</th>
                                <th>Order Date/Time</th>
                                <th>Total Order Price</th>
                                <th>Estimated Delivery Time</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allOrders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ optional($order->user)->phone }}</td>
                                <td>{{ $order->order_date }}<br>{{ $order->order_time }}</td>
                                <td>{{ $order->total_order_price }}</td>
                                <td>{{ $order->estimated_delivery_time }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="{{ route('orders.show', ['id' => $order->order_id]) }}">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="pagination" class="pagination"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pendingOrders">
            <!-- Pending Orders Tab -->
            <div class="row">
                <div class="col-12">
                    <input type="text" id="search" placeholder="Search by Customer Phone Number">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Customer Phone</th>
                                <th>Order Date/Time</th>
                                <th>Total Order Price</th>
                                <th>Estimated Delivery Time</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendingOrders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->user->phone_number }}</td>
                                <td>{{ $order->order_date }}<br>{{ $order->order_time }}</td>
                                <td>{{ $order->total_order_price }}</td>
                                <td>{{ $order->estimated_delivery_time }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="{{ route('orders.show', ['id' => $order->order_id]) }}">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="pagination" class="pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('search').addEventListener('input', function(e) {
        var search = e.target.value.toLowerCase();
        var rows = Array.from(document.querySelectorAll('table tbody tr'));
        rows.forEach(row => {
            var subcatName = row.cells[1].textContent.toLowerCase();
            row.style.display = subcatName.includes(search) ? '' : 'none';
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script>
    $(document).ready(function() {
        var items = $("table tbody tr");
        var numItems = items.length;
        var perPage = 10;

        items.slice(perPage).hide();

        $('#pagination').pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide().slice(showFrom, showTo).show();
            }
        });
    });
</script>
@endsection