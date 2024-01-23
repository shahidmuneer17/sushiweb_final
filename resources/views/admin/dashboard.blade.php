@extends('admin.layouts.admin')

@section('content')
<section class="container">
    <style>
        .card {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
            width: fit-content;
        }
        .card:hover {
            background-color: #ffdcdc;

        }
        </style>
<div class="row">
    <div class="col-12">
        <h1>Dashboard</h1>
        
    </div>
   </div>
<div class="row">
    <div class="col-12">

    <div class="row">
        <div class="col-12">

          
        <div class="row">
    <div class="col-3">
        <label for="">Select Date</label>
        <input type="date" name="from" class="form-control" value="{{ request()->get('from', \Carbon\Carbon::now()->format('Y-m-d')) }}">
    </div>
</div>

<div class="container">
    <div class="row">
        @php
        $Date = request()->get('from') ?? date('Y-m-d');
            
            $ordersdijon = $orders->where('rest_id', '1')
                                  ->where('order_date', $Date);
                                  
            $ordersbelfort = $orders->where('rest_id', '2')
                                    ->where('order_date', $Date);
                                    
            $ordersbesancon = $orders->where('rest_id', '3')
                                    ->where('order_date', $Date);

                                    $user = Auth::user();
        @endphp
        @if($user->rest_id == "1")
        <h2 class="mt-5">
            Central Sushi Dijon
        </h2>
        <div class="row gap-2 mt-3">
        <div class="card">
            <h3>
                Orders in Progress: {{ $ordersdijon->where('order_status', 'in-progress')->count() }}
            </h3>
            </div>

        <div class="card">
            <h3>
                Total Orders: {{ $ordersdijon->count() }}
            </h3>
            </div>
            <div class="card">
            <h3>
                Total Sales: {{ $ordersdijon->sum('total_order_price') }} €
            </h3>
            </div>
        </div>
        @endif
        @if($user->rest_id == "3")

        <h2 class="mt-5">
            Central Sushi Belfort
        </h2>
        <div class="row gap-2 mt-3">
        <div class="card">
            <h3>
                Orders in Progress: {{ $ordersbelfort->where('order_status', 'in-progress')->count() }}
            </h3>
            </div>

            <div class="card">
            <h3>
                Total Orders: {{ $ordersbelfort->count() }}
            </h3>
            </div>
            <div class="card">
            <h3>
                Total Sales: {{ $ordersbelfort->sum('total_order_price') }} €
            </h3>
            </div>
        </div>
        @endif
        @if($user->rest_id == "2")

        <h2 class="mt-5">
            Central Sushi Besancon
        </h2>
        <div class="row gap-2 mt-3">
        <div class="card">
            <h3>
                Orders in Progress: {{ $ordersbesancon->where('order_status', 'in-progress')->count() }}
            </h3>
            </div>

            <div class="card">
            <h3>
                Total Orders: {{ $ordersbesancon->count() }}
            </h3>
            </div>
            <div class="card">
            <h3>
                Total Sales: {{ $ordersbesancon->sum('total_order_price') }} €
            </h3>
            </div>
        </div>
        @endif
        
    </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to fetch and update orders based on selected date range
        function updateOrders() {
            var fromDate = $('[name="from"]').val();
            var toDate = $('[name="to"]').val();

            // Use AJAX to fetch updated orders from the server
            $.ajax({
                type: "GET",
                url: "/admin/update-orders", // Replace with the actual endpoint to fetch orders
                data: { from: fromDate, to: toDate },
                success: function (data) {
                    // Update the displayed orders
                    $("#dijon-orders").html(data.dijon);
                    $("#belfort-orders").html(data.belfort);
                    $("#besancon-orders").html(data.besancon);
                },
                error: function (error) {
                    console.error("Error fetching orders:", error);
                }
            });
        }

        // Attach change event handler to date inputs
        $('[name="from"], [name="to"]').change(function () {
            updateOrders();
        });

        // Initial update on page load
        updateOrders();
    });
</script>


@endsection