@extends('app')

@section('content')
<style>
    .goback {
        text-decoration: none;
        color: var(--primary-color);
        border-radius: 0;
        font-size: medium;
        padding: 10px !important;
    }

    .goback:hover {
        text-decoration: none;
        color: var(--primary-color);
        border-radius: 0;
        font-size: medium;
        padding: 10px !important;
    }
</style>
<div class="row opbg p-2 pmclr">
    <div class="col-md-12">
        <a href="{{ url()->previous() }}" role="button" class="btn sushibtn p-md-3 goback">
            < Retour</a>
                <a href="{{ route('menu') }}" role="button" class="btn sushibtn p-md-3 goback">| Menu</a>
                <h1 class="p-3">PANIER</h1>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            @if(session('cart') && !empty(session('cart')['products']))
                            @foreach(session('cart')['products'] as $product)

                            <div class='col-12'>
                                <div class='row'>
                                    <style>
                                        .prodimg-div {
                                            padding: 10px;
                                            width: 100%;
                                            height: 100%;
                                        }

                                        .prodimg-div img {
                                            width: 120px;
                                            height: 120px;
                                            object-fit: cover;
                                        }

                                        @media (max-width: 768px) {
                                            .prodimg-div {
                                                width: 100%;
                                                height: 100%;
                                            }

                                            .prodimg-div img {
                                                width: 100%;
                                                height: 100%;
                                                object-fit: cover;
                                            }

                                            .bgprod2 {
                                                min-height: auto;

                                            }

                                            .pricetag {
                                                justify-content: center;
                                            }

                                            .accmp {
                                                align-items: center;
                                                justify-content: center;
                                            }
                                        }
                                    </style>
                                    <div class='col-3 border1 p-2'>
                                        <div class='bgprod2 d-flex prodimg-div align-items-center justify-content-center'>
                                            <div style='position: relative;'>
                                                <img src='images/{{$product['imgsrc']}}'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-5 col-9 mt-md-5 p-2 border1'>
                                        <h4>{{ $product['name'] }}</h4>
                                        @if(!empty($product['option_id']))
                                        <p>Option: {{ $product['option_name'] }}</p>
                                        @endif

                                        @if(!empty($product['prod_options']))
                                        <select class='product-option' data-product-id='{{ $product['prod_id'] }}'>
                                            <option value=''>Select Option</option>
                                            @foreach($product['prod_options'] as $option)
                                            <option value='{{ $option['option_id'] }}' data-option-price='{{ $option['option_price'] }}'>{{ $option['option_name'] }} (+{{ $option['option_price'] }}€)</option>
                                            @endforeach
                                        </select>
                                        @endif
                                        @if(!empty($product['choices']))
                                        <p>Choix: {{ $product['choices'] }}</p>
                                        @endif
                                        <p>{{ $product['qty'] }}
                                            @if($product['qty'] > 1)
                                            Pièces
                                            @else
                                            Pièce
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-2 col-6 mt-md-5 p-2 border1">
                                        <div class='pricetag'>
                                            <div class='sidept'>
                                                @if($product['qty'] > 1)
                                                @if(isset($product['option_id']))
                                                <a id="prod_price" href="{{ url('decreaseQty?prod_id=' . $product['prod_id'] . '&option_id=' . $product['option_id']) }}" role='button' class='btn pbtn'>-</a>
                                                @else
                                                <a id="prod_price" href="{{ url('decreaseQty?prod_id=' . $product['prod_id']) }}" role='button' class='btn pbtn'>-</a>
                                                @endif
                                                @else
                                                <span id='sidept3'>x</span>
                                                @endif
                                            </div>
                                            <div class='centerinput'><input type='text' value='{{ $product['qty'] }}' disabled></div>
                                            @if(isset($product['option_id']))
                                            <div class='sidelast'><a href="{{ url('add-to-cart?prod_id=' . $product['prod_id'] . '&option_id=' . $product['option_id']) }}" role='button' class='btn pbtn'>+</a></div>
                                            @else
                                            <div class='sidelast'><a href="{{ url('add-to-cart?prod_id=' . $product['prod_id']) }}" role='button' class='btn pbtn'>+</a></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-2 col-6 mt-md-5 p-2 border1'>
                                        @if(isset($product['option_id']))
                                        <p style='font-size: 18px;'><strong id='prod_price'>
                                                {{ number_format($product['option_price'] * $product['qty'], 2) }}€</strong>
                                        </p>
                                        @else
                                        <p style='font-size: 18px;'><strong id='prod_price'>
                                                {{ number_format($product['price'] * $product['qty'], 2) }}€</strong>
                                        </p>
                                        @endif
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

                                .ft-16 {
                                    font-size: 16px;
                                }
                            </style>

                            <div class="row">
                                <div class=" col-md-12">
                                    <div class="row text-center p-2">
                                        <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                            <h5 class="ft-16 mb-2 mt-2 p-2 seccolr">SOJA SUCRÉE
                                            </h5>
                                            <div class="pricetag pricetag1 justify-content-center">
                                                <div class="sidept">
                                                    <button class="btn pbtn decrease-btn" data-item="soja_sucre">-</button>
                                                </div>
                                                <div class="centerinput"><input type="text" value="{{ session('soja_sucre', 0) }}" id="soja_sucre" disabled></div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn" data-item="soja_sucre">+</button>
                                                </div>
                                            </div>
                                            <div class="pricetag justify-content-center">
                                                <div class="centerinput">
                                                    <p style="font-weight: 100;"><strong id="soja_sucre_price">{{ number_format(session('soja_sucre_price', 0), 2) }}€</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                            <h5 class="ft-16 mb-2 mt-2 p-2 seccolr">SOJA SALÉE</h3>
                                                <div class="pricetag pricetag1 justify-content-center">
                                                    <div class="sidept">
                                                        <button class="btn pbtn decrease-btn" data-item="soja_salee">-</button>
                                                    </div>
                                                    <div class="centerinput"><input type="text" value="{{ session('soja_salee', 0) }}" id="soja_salee" disabled></div>
                                                    <div class="sidelast">
                                                        <button class="btn pbtn increase-btn" data-item="soja_salee">+</button>
                                                    </div>
                                                </div>
                                                <div class="pricetag pricetag1 justify-content-center">
                                                    <div class="centerinput">
                                                        <p style="font-weight: 100;"><strong id="soja_salee_price">{{ number_format(session('soja_salee_price', 0), 2) }}€</strong></p>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                            <h5 class="ft-16 mb-2 mt-2 p-2 seccolr">SAUCE SPICY</h5>
                                            <div class="pricetag pricetag1 justify-content-center">
                                                <div class="sidept"><button class="btn pbtn decrease-btn" data-item="sauce_spicy">-</button></div>
                                                <div class="centerinput"><input type="text" value="{{ session('sauce_spicy', 0) }}" id="sauce_spicy" disabled></div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn" data-item="sauce_spicy">+</button>
                                                </div>
                                            </div>
                                            <div class="pricetag pricetag1 justify-content-center">
                                                <div class="centerinput">
                                                    <p style="font-weight: 100;"><strong id="sauce_spicy_price">{{ number_format(session('sauce_spicy_price', 0), 2) }}€</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                            <h5 class="ft-16 mb-2 mt-2 p-2 seccolr">BAGUETTES</h5>
                                            <div class="pricetag justify-content-center">
                                                <div class="sidept"><button class="btn pbtn decrease-btn" data-item="baguettes">-</button></div>
                                                <div class="centerinput"><input type="text" value="{{ session('baguettes', 0) }}" id="baguettes" disabled></div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn" data-item="baguettes">+</button>
                                                </div>
                                            </div>
                                            <div class="pricetag justify-content-center">
                                                <div class="centerinput">
                                                    <p style="font-weight: 100;"><strong id="baguettes_price">Gratuit</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                            <h5 class="ft-16 mb-2 mt-2 p-2 seccolr">WASABI</h5>
                                            <div class="pricetag pricetag1 justify-content-center">
                                                <div class="sidept"><button class="btn pbtn decrease-btn" data-item="wasabi">-</button></div>
                                                <div class="centerinput"><input type="text" value="{{ session('wasabi', 0) }}" id="wasabi" disabled></div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn" data-item="wasabi">+</button>
                                                </div>
                                            </div>
                                            <div class="pricetag pricetag1 justify-content-center">
                                                <div class="centerinput">
                                                    <p style="font-weight: 100;"><strong id="wasabi_price">{{ number_format(session('wasabi_price', 0), 2) }}€</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center subcart2" style="flex-direction: column; justify-content: space-between;">
                                            <h5 class="ft-16 mb-2 mt-2 p-2 seccolr">GINGEMBRE</h5>
                                            <div class="pricetag pricetag1 justify-content-center">
                                                <div class="sidept"><button class="btn pbtn decrease-btn" data-item="ginger">-</button></div>
                                                <div class="centerinput"><input type="text" value="{{ session('ginger', 0) }}" id="ginger" disabled></div>
                                                <div class="sidelast">
                                                    <button class="btn pbtn increase-btn" data-item="ginger">+</button>
                                                </div>
                                            </div>
                                            <div class="pricetag pricetag1 justify-content-center">
                                                <div class="centerinput">
                                                    <p style="font-weight: 100;"><strong id="ginger_price">{{ number_format(session('ginger_price', 0), 2) }}€</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="row mt-5 mb-5">
                                <div class="col-12">
                                    <h3 class="p-md-3 pb-3" style="color: var(--sec-color); padding-left: 0px!important;">Laissez-vous tenter par…</h3>
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
                                            <div class="row accmp">
                                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach($products1->chunk(3) as $chunk)
                                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                            <div class="row">
                                                                @foreach($chunk as $product)
                                                                <div class="col d-flex justify-content-center">
                                                                    <div class="subcart m-2" style="height: 180px; border: none; align-items: center;">
                                                                        <img style="width: 80px; height: 80px; object-fit: contain;" src="/images/{{ optional($product)->imgsrc }}"><br>
                                                                        <h5 class="mb-2 mt-2 seccolr text-center" style="font-size: 14px;">

                                                                            {{ $product->prod_name }}
                                                                        </h5>
                                                                        <div class="pricetag justify-content-center">
                                                                            <div class="sidept"><span id="sidept3">x</span></div>
                                                                            <div class="centerinput"><input type="text" value="1"></div>
                                                                            <div class="sidelast"><a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" role="button" class="btn pbtn">+</a></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <style>
                                            .nav-tabs .nav-item.show .nav-link,
                                            .nav-tabs .nav-link.active {
                                                color: #e4d4bf !important;
                                                background-color: var(--sec-color);
                                                border-color: var(--sec-color);
                                            }

                                            .nav-link {
                                                color: var(--sec-color);
                                            }

                                            .nav-tabs {
                                                --bs-nav-tabs-border-width: var(--bs-border-width);
                                                --bs-nav-tabs-border-color: var(--sec-color);
                                                --bs-nav-tabs-border-radius: var(--bs-border-radius);
                                                --bs-nav-tabs-link-hover-border-color: var(--sec-color);
                                                --bs-nav-tabs-link-active-color: var(--bs-emphasis-color);
                                                --bs-nav-tabs-link-active-bg: var(--bs-body-bg);
                                                --bs-nav-tabs-link-active-border-color: var(--bs-border-color) var(--bs-border-color) var(--bs-body-bg);
                                                border-bottom: var(--bs-nav-tabs-border-width) solid var(--bs-nav-tabs-border-color);
                                            }

                                            .deserts-icon-sm {
                                                height: 200px;
                                                width: 100px;
                                            }
                                        </style>

                                        <div class="tab-pane fade show" id="deserts" role="tabpanel" aria-labelledby="-tab">
                                            <div class="row accmp">
                                                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach($products2->chunk(3) as $chunk)
                                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                            <div class="row">
                                                                @foreach($chunk as $product)
                                                                <div class="col d-flex justify-content-center">
                                                                    <div class="subcart m-2" style="height: 180px; border: none; align-items: center;">
                                                                        <img style="width: 80px; height: 80px; object-fit: contain;" src="/images/{{ optional($product)->imgsrc }}"><br>
                                                                        <h5 class="mb-2 mt-2 seccolr text-center" style="font-size: 14px;">

                                                                            {{ $product->prod_name }}
                                                                        </h5>
                                                                        <div class="pricetag justify-content-center">
                                                                            <div class="sidept"><span id="sidept3">x</span></div>
                                                                            <div class="centerinput"><input type="text" value="1"></div>
                                                                            <div class="sidelast"><a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" role="button" class="btn pbtn">+</a></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane fade show" id="boissons" role="tabpanel" aria-labelledby="-tab">
                                            <div class="row accmp">
                                                <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach($products3->chunk(3) as $chunk)
                                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                            <div class="row">
                                                                @foreach($chunk as $product)
                                                                <div class="col d-flex justify-content-center">
                                                                    <div class="subcart m-2" style="height: 180px; border: none; align-items: center;">
                                                                        <img style="width: 80px; height: 80px; object-fit: contain;" src="/images/{{ optional($product)->imgsrc }}"><br>
                                                                        <h5 class="mb-2 mt-2 seccolr text-center" style="font-size: 14px;">

                                                                            {{ $product->prod_name }}
                                                                        </h5>
                                                                        <div class="pricetag justify-content-center">
                                                                            <div class="sidept"><span id="sidept3">x</span></div>
                                                                            <div class="centerinput"><input type="text" value="1"></div>
                                                                            <div class="sidelast"><a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" role="button" class="btn pbtn">+</a></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-4">
                                    <p style="color: var(--sec-color); text-align: right; font-size: 14px;">Frais de gestion: 0.95€</p>
                                    <p style="color: var(--sec-color); text-align: right; font-size: 14px;">En passant commande, vous acceptez les termes des CGV</p>

                                    <a href="{{ route('summaryPage') }}" role="button">
                                        <h3 class="p-3 d-flex pmclr" style="background-color: #ba321c; justify-content: space-between; color: #e4d4bf!important;">
                                            SOUS TOTAL: <span style="width: auto; display: inline-flex; text-align: right;" id="total_price">0.00€</span>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="p-3 d-flex" style="justify-content: center;">
                                        Votre panier est vide..
                                    </h3>
                                    <div class="mb-3 mt-3 d-flex justify-content-center">
                                        @php
                                        $sessionMethod = session('method');
                                        @endphp
                                        @if(isset($sessionMethod))
                                        <a href="{{ url('/menu') }}" role="button" class="sushibtn">Voir le menu</a>
                                        @else
                                        <a href="{{ url('/') }}" role="button" class="sushibtn">Voir le menu</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
    </div>
</div>

<script>
    updateTotalPrice();
    // Get all buttons with class 'increase-btn' or 'decrease-btn'
    const increaseButtons = document.querySelectorAll('.increase-btn');
    const decreaseButtons = document.querySelectorAll('.decrease-btn');

    // Add click event listener to each increase button
    increaseButtons.forEach(button => {
        button.addEventListener('click', function() {
            updateSession(this.getAttribute('data-item'), 1); // Increase quantity by 1
        });
    });

    // Add click event listener to each decrease button
    decreaseButtons.forEach(button => {
        button.addEventListener('click', function() {
            updateSession(this.getAttribute('data-item'), -1); // Decrease quantity by 1
        });
    });

    // Function to update session values
    function updateSession(item, quantityChange) {
        // Make an Ajax request to update session values on the server
        // Adjust the URL based on your Laravel routes
        const url = `/update-session/${item}/${quantityChange}`;

        // Example using fetch:
        fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                // Update the displayed values
                document.getElementById(item).value = data.quantity;
                document.getElementById(item + '_price').innerText = `${data.price.toFixed(2)}€`;
                // Update the total price if needed
                updateTotalPrice();
            })
            .catch(error => console.error('Error:', error));
    }

    // Function to update the total price
    function updateTotalPrice() {
        // Calculate total price based on individual item prices
        // Update the total_price element
        const totalPriceElement = document.getElementById('total_price');
        // You may need to adjust this calculation based on your specific requirements
        // For example, you might need to fetch the latest session values for all items and calculate the total on the server side
        // and return it in the response
        totalPriceElement.innerText = calculateTotalPrice().toFixed(2) + '€';
    }

    // Function to calculate the total price based on individual item prices
    function calculateTotalPrice() {
        // Sum up the prices of all items
        var prodPrices = document.querySelectorAll('#prod_price');
        var serviceCharge = 0.95;
        let totalPrice = 0;

        for (var i = 0; i < prodPrices.length; i++) {
            // Get the price from the element and remove the euro symbol
            var price = parseFloat(prodPrices[i].textContent.replace('€', '')) || 0;
            totalPrice += price;
        }
        // Add more items as needed
        totalPrice += parseFloat(document.getElementById('soja_sucre_price').innerText);
        totalPrice += parseFloat(document.getElementById('soja_salee_price').innerText);
        totalPrice += parseFloat(document.getElementById('sauce_spicy_price').innerText);
        totalPrice += parseFloat(document.getElementById('wasabi_price').innerText);
        totalPrice += parseFloat(document.getElementById('ginger_price').innerText);
        totalPrice += serviceCharge;
        // Return the total price
        return totalPrice;
    }
</script>


@endsection