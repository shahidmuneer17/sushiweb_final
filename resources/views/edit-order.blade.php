@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Edit Order</h1>

    <!-- Display existing order details -->
    <div class="row">
        <div class="col-md-12">
            <h2>Order Details</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $orderDetail->product_name }}</td>
                            <td>{{ $orderDetail->product_qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form for updating order details -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h2>Update Order</h2>
            <form method="POST" action="{{ route('update-order', ['order_id' => $order->order_id]) }}">
                @csrf

                <!-- Add your form fields here -->
                <!-- Example: Quantity field -->
                <div class="mb-3">
                    <label for="quantity">New Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('product_qty') }}">
                </div>

                <!-- Add more fields as needed -->

                <button type="submit" class="btn btn-primary">Update Order</button>
            </form>
        </div>
    </div>
</div>
@endsection



@extends('app')

@section('content')
@php
$total = 0;
@endphp
<div class="row opbg p-2 pmclr">
    <div class="col-md-12">
        <h1 class="p-3">PANIER</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    
                    @foreach($orderDetails as $orderDetail)
                    @php
                    $total += $orderDetail['price'] * $orderDetail['qty'];
                    @endphp
                    <div class='col-12'>
                        <div class='row'>
                            <div class='col-3 border1 p-2'>
                                <div class='bgprod2' style='padding: 10px; width: 140px; height: 120px;'>
                                    <div style='position: relative;'>
                                        <img class='' style='width: 120px; height: 120px; object-fit: cover;' src='images/{{$product['imgsrc']}}'>
                                    </div>
                                </div>
                            </div>
                            <div class='col-5 mt-5 p-2 border1'>
                                <h4>{{ $product['name'] }}</h4>
                                @if(!empty($product['prod_options']))
                                <select class='product-option' data-product-id='{{ $product['prod_id'] }}'>
                                    <option value=''>Select Option</option>
                                    @foreach($product['prod_options'] as $option)
                                    <option value='{{ $option['option_id'] }}' data-option-price='{{ $option['option_price'] }}'>{{ $option['option_name'] }} (+{{ $option['option_price'] }}€)</option>
                                    @endforeach
                                </select>
                                @endif
                                <p>{{ $product['qty'] }}
                                    @if($product['qty'] > 1)
                                    Pièces
                                    @else
                                    Pièce
                                    @endif
                                </p>
                            </div>
                            <div class="col-2 mt-5 p-2 border1">
                                <div class='pricetag'>
                                    <div class='sidept'>
                                        @if($product['qty'] > 1)
                                        <a href="{{ url('decreaseQty?prod_id=' . $product['prod_id']) }}" role='button' class='btn pbtn'>-</a>
                                        @else
                                        <span id='sidept3'>x</span>
                                        @endif
                                    </div>
                                    <div class='centerinput'><input type='text' value='{{ $product['qty'] }}' disabled></div>
                                    <div class='sidelast'><a href="{{ url('add-to-cart?prod_id=' . $product['prod_id']) }}" role='button' class='btn pbtn'>+</a></div>
                                </div>
                            </div>
                            <div class='col-2 mt-5 p-2 border1'>
                                <p style='font-size: 18px;'><strong id='product_price_{{ $product['prod_id'] }}'>
                                        {{ number_format($product['price'] * $product['qty'], 2) }}€</strong>
                                </p>
                                <a href="{{ url('remove-frm-cart?prod_id=' . $product['prod_id']) }}" style='color: var(--sec-color);'>Supprimer</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <style>
                        .pbtn {
                            font-size: 20px;
                        }

                        #sidept3 {
                            font-size: 20px;
                        }
                    </style>

                    <div class="row">
                        <div class=" col-md-12">
                            <div class="row text-center p-2">
                                <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                    <h5 class=" mb-3 mt-3 p-2 seccolr">SOJA SUCRÉE
                                    </h5>
                                    <div class="pricetag justify-content-center">
                                        <div class="sidept">
                                            <button class="btn pbtn soja_sucre">-</button>
                                        </div>
                                        <div class="centerinput"><input type="text" value="{{ session('soja_sucre', 0) }}" id="soja_sucre" disabled></div>
                                        <div class="sidelast">
                                            <button class="btn pbtn soja_sucre">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                    <h5 class=" mb-3 mt-3 p-2 seccolr mb-3 mt-3">SOJA SALÉE</h3>
                                        <div class="pricetag justify-content-center">
                                            <div class="sidept">
                                                <button class="btn pbtn soja_salee">-</button>
                                            </div>
                                            <div class="centerinput"><input type="text" value="{{ session('soja_salee', 0) }}" id="soja_salee" disabled></div>
                                            <div class="sidelast">
                                                <button class="btn pbtn soja_salee">+</button>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                    <h5 class=" mb-3 mt-3 p-2 seccolr">SAUCE SPICY</h5>
                                    <div class="pricetag justify-content-center">
                                        <div class="sidept"><button class="btn pbtn sauce_spicy">-</button></div>
                                        <div class="centerinput"><input type="text" value="{{ session('sauce_spicy', 0) }}" id="sauce_spicy" disabled></div>
                                        <div class="sidelast">
                                            <button class="btn pbtn sauce_spicy">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                    <h5 class=" mb-3 mt-3 p-2 seccolr">BAGUETTES</h5>
                                    <div class="pricetag justify-content-center">
                                        <div class="sidept"><button class="btn pbtn baguettes">-</button></div>
                                        <div class="centerinput"><input type="text" value="{{ session('baguettes', 0) }}" id="baguettes" disabled></div>
                                        <div class="sidelast">
                                            <button class="btn pbtn baguettes">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                    <h5 class=" mb-3 mt-3 p-2 seccolr">WASABI</h5>
                                    <div class="pricetag justify-content-center">
                                        <div class="sidept"><button class="btn pbtn wasabi">-</button></div>
                                        <div class="centerinput"><input type="text" value="{{ session('wasabi', 0) }}" id="wasabi" disabled></div>
                                        <div class="sidelast">
                                            <button class="btn pbtn wasabi">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                    <h5 class=" mb-3 mt-3 p-2 seccolr">GINGEMBRE</h5>
                                    <div class="pricetag justify-content-center">
                                        <div class="sidept"><button class="btn pbtn ginger">-</button></div>
                                        <div class="centerinput"><input type="text" value="{{ session('ginger', 0) }}" id="ginger" disabled></div>
                                        <div class="sidelast">
                                            <button class="btn pbtn ginger">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.querySelector('.sidelast .wasabi').addEventListener('click', function() {
                            var input = document.getElementById('wasabi');
                            input.value = parseInt(input.value, 10) + 1;

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    wasabi: input.value
                                })
                            });
                        });

                        document.querySelector('.sidept .wasabi').addEventListener('click', function() {
                            var input = document.getElementById('wasabi');
                            var currentValue = parseInt(input.value, 10);
                            if (currentValue > 0) {
                                input.value = currentValue - 1;
                            }

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    wasabi: input.value
                                })
                            });
                        });
                        document.querySelector('.sidelast .ginger').addEventListener('click', function() {
                            var input = document.getElementById('ginger');
                            input.value = parseInt(input.value, 10) + 1;

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    ginger: input.value
                                })
                            });
                        });

                        document.querySelector('.sidept .ginger').addEventListener('click', function() {
                            var input = document.getElementById('ginger');
                            var currentValue = parseInt(input.value, 10);
                            if (currentValue > 0) {
                                input.value = currentValue - 1;
                            }

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    ginger: input.value
                                })
                            });
                        });
                        document.querySelector('.sidelast .baguettes').addEventListener('click', function() {
                            var input = document.getElementById('baguettes');
                            input.value = parseInt(input.value, 10) + 1;

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    baguettes: input.value
                                })
                            });
                        });

                        document.querySelector('.sidept .baguettes').addEventListener('click', function() {
                            var input = document.getElementById('baguettes');
                            var currentValue = parseInt(input.value, 10);
                            if (currentValue > 0) {
                                input.value = currentValue - 1;
                            }

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    baguettes: input.value
                                })
                            });
                        });
                        document.querySelector('.sidelast .sauce_spicy').addEventListener('click', function() {
                            var input = document.getElementById('sauce_spicy');
                            input.value = parseInt(input.value, 10) + 1;

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    sauce_spicy: input.value
                                })
                            });
                        });

                        document.querySelector('.sidept .sauce_spicy').addEventListener('click', function() {
                            var input = document.getElementById('sauce_spicy');
                            var currentValue = parseInt(input.value, 10);
                            if (currentValue > 0) {
                                input.value = currentValue - 1;
                            }

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    sauce_spicy: input.value
                                })
                            });
                        });
                        document.querySelector('.sidelast .soja_salee').addEventListener('click', function() {
                            var input = document.getElementById('soja_salee');
                            input.value = parseInt(input.value, 10) + 1;

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    soja_salee: input.value
                                })
                            });
                        });

                        document.querySelector('.sidept .soja_salee').addEventListener('click', function() {
                            var input = document.getElementById('soja_salee');
                            var currentValue = parseInt(input.value, 10);
                            if (currentValue > 0) {
                                input.value = currentValue - 1;
                            }

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    soja_salee: input.value
                                })
                            });
                        });


                        document.querySelector('.sidelast .soja_sucre').addEventListener('click', function() {
                            var input = document.getElementById('soja_sucre');
                            input.value = parseInt(input.value, 10) + 1;

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    soja_sucre: input.value
                                })
                            });
                        });

                        document.querySelector('.sidept .soja_sucre').addEventListener('click', function() {
                            var input = document.getElementById('soja_sucre');
                            var currentValue = parseInt(input.value, 10);
                            if (currentValue > 0) {
                                input.value = currentValue - 1;
                            }

                            // Send AJAX request to Laravel
                            fetch('/store-in-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    soja_sucre: input.value
                                })
                            });
                        });
                    </script>
                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <h3 class="p-5" style="color: var(--sec-color);">Laissez-vous tenter par…</h3>
                        </div>
                        <div class="col-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="accompagnements-tab" data-bs-toggle="tab" data-bs-target="#accompagnements" type="button" role="tab" aria-controls="home" aria-selected="true">ACCOMPAGNEMENTS</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="deserts-tab" data-bs-toggle="tab" data-bs-target="#deserts" type="button" role="tab" aria-controls="profile" aria-selected="false">DESSERTS</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="boissons-tab" data-bs-toggle="tab" data-bs-target="#boissons" type="button" role="tab" aria-controls="contact" aria-selected="false">BOISSONS</button>
                                </li>
                            </ul>


                            <div class="tab-content" id="myTabContent">
                                
                                <div class="tab-pane fade show active" id="accompagnements" role="tabpanel" aria-labelledby="-tab">
                                    <div class="row">
                                        @foreach($products1 as $product)
                                        <div class="col-md-4 subcart m-2" style="height: 250px;">
                                            <h5 class="mb-3 mt-3 p-2 seccolr mb-3 mt-3 text-center">
                                                <img style="width: 100px; height: 100px; object-fit: contain;" src="/images/{{ optional($product)->imgsrc }}"><br>
                                                {{ $product->prod_name }}
                                            </h5>
                                            <div class="pricetag justify-content-center">
                                                <div class="sidept"><span id="sidept3">x</span></div>
                                                <div class="centerinput"><input type="text" value="1"></div>
                                                <div class="sidelast"><a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" role="button" class="btn pbtn">+</a></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                            
                                
                                <div class="tab-pane fade show" id="deserts" role="tabpanel" aria-labelledby="-tab">
                                    <div class="row">
                                    @foreach($products2 as $product)
                                        <div class="col-md-4 subcart m-2" style="height: 250px;">
                                            <h5 class="mb-3 mt-3 p-2 seccolr mb-3 mt-3 text-center">
                                                <img style="width: 100px; height: 100px; object-fit: contain;" src="/images/{{ optional($product)->imgsrc }}"><br>
                                                {{ $product->prod_name }}
                                            </h5>
                                            <div class="pricetag justify-content-center">
                                                <div class="sidept"><span id="sidept3">x</span></div>
                                                <div class="centerinput"><input type="text" value="1"></div>
                                                <div class="sidelast"><a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" role="button" class="btn pbtn">+</a></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                            
                                
                                <div class="tab-pane fade show" id="boissons" role="tabpanel" aria-labelledby="-tab">
                                    <div class="row">
                                        @foreach($products3 as $product)
                                        <div class="col-md-4 subcart m-2" style="height: 250px;">
                                            <h5 class="mb-3 mt-3 p-2 seccolr mb-3 mt-3 text-center">
                                                <img style="width: 100px; height: 100px; object-fit: contain;" src="/images/{{ optional($product)->imgsrc }}"><br>
                                                {{ $product->prod_name }}
                                            </h5>
                                            <div class="pricetag justify-content-center">
                                                <div class="sidept"><span id="sidept3">x</span></div>
                                                <div class="centerinput"><input type="text" value="1"></div>
                                                <div class="sidelast"><a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" role="button" class="btn pbtn">+</a></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-4">
                            <h3 class="p-3 d-flex pmclr" style="background-color: var(--sec-color); justify-content: space-between; color: #e4d4bf!important;">
                                SOUS TOTAL: <span style="width: auto; display: inline-flex; text-align: right;">€{{ number_format($total, 2) }}</span>
                            </h3>
                            <div class="mb-3 mt-3 d-flex justify-content-end">
                                <a href="{{ route('place-order') }}" role="button" class="sushibtn">COMMANDER</a>
                            </div>
                        </div>
                    </div>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection