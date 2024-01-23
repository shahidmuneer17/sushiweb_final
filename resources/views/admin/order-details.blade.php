@extends('admin.layouts.admin')

@section('content')
<section class="container">
<div class="row">
    <div class="col-12">
        
    <h1>Order Details</h1>

    <h2>Order ID: {{ $order->order_id }}</h2>
    </div>
   </div>
<div class="row">
    <div class="col-12">
    <input type="text" id="search" placeholder="Search by user">
        <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
            @foreach ($order->orderDetails as $detail)
                <tr>
                    <td>{{ $detail->product_id }}</td>
                    <td>{{ $detail->product_name }}</td>
                    <td>{{ $detail->product_qty }}</td>

                    <!-- Add more columns as needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="pagination" class="pagination"></div>
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