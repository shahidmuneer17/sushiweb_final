@extends('menu.sidemenu-products')

@section('menubody')

<div class="col-md-12 p-5">
  <a href="{{ route('menu') }}" class="btn sushibtn p-md-3 goback2">&lt; retour</a>
    <div class="row justify-content-center">
        <div class="col-md-12 pmclr">
            <div class="row justify-content-center pmclr opbg p-md-5">
                <div class="col-md-5 d-flex" style="background-color: black; justify-content: center;">
                    <div class="bgprod" style="width: 250px; height: 250px;">
                        <div style="position: relative;">
                            <img style="width: 250px; height: 250px; object-fit: cover;" src="/images/{{ ($product->imgsrc) }}">
                        </div>
                    </div>
                </div>

                @if($product->options->count())
                <div class="col-md-7 p-4">
                    <h2 class="mb-3" style="color: var(--sec-color);">{{ $product->prod_name }}</h2>
                    @if($product->prod_name == 'TANDEM')
                    <p>24 pièces</p>
                    @endif
                    @if($product->prod_name == 'TENDANCE')
                    <p>44 pièces</p>
                    @endif
                    <h3>Options:</h3>
                    <select id="product_options" class="form-control">
                        @foreach ($product->options as $option)
                        <option value="{{ $option->option_id }}" data-price="{{ $option->option_price }}">
                            {{ $option->option_name }} ({{ $option->option_price }}€)
                        </option>
                        @endforeach
                    </select>

                    <h2 class="mt-3" id="selected_option_price">{{ $product->options->first()->option_price ?? $product->price }}€</h2>
                    <a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id, 'option_id' => $product->options->first()->option_id ]) }}" id="add-to-cart-link" role="button" class="btn sushibtn mt-3">Ajouter au panier</a>

                @else
                <div class="col-md-7 p-md-4">
                    <h2 class="mb-3" style="color: var(--sec-color);">{{ $product->prod_name }}</h2>
                    @if($product->prod_name == 'TANDEM')
                    <p>24 pièces</p>
                    @endif
                    @if($product->prod_name == 'TENDANCE')
                    <p>44 pièces</p>
                    @endif
                    <h2 class="mt-3">{{ $product->price }}€</h2>
                    <!-- <p class="mb-5">SKU: {{ $product->sku }}</p> -->
                    
@if($product->prod_name == 'FREEZ’BOX 32 pièces' || $product->prod_name == 'FREEZ’BOX 24 pièces')
<a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" id="add-to-cart-btn" role="button" class="btn sushibtn mt-3">Ajouter au panier</a>
<script>
document.getElementById('add-to-cart-btn').addEventListener('click', function(e) {
    e.preventDefault();

    var quantities = {
        'Saumon': document.getElementById('freez_saumon').value,
        'Thon': document.getElementById('freez_thon').value,
        'Crevette': document.getElementById('freez_crevette').value,
        'Poulet': document.getElementById('freez_poulet').value
    };

    var totalQuantity = Object.values(quantities).reduce(function(sum, quantity) {
        return sum + parseInt(quantity);
    }, 0);

    if (totalQuantity === 4 || totalQuantity === 3) {
        var choices = Object.entries(quantities).map(function([item, quantity]) {
            return item + ' ' + quantity;
        }).join(', ');

        this.href += '&choices=' + encodeURIComponent(choices);

        window.location.href = this.href;
    } else {
        alert('Please select a total of 4 items for the 32 pieces product or 3 items for the 24 pieces product.');
    }
});
</script>
@else
                    <a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" role="button" class="btn sushibtn mt-3">Ajouter au panier</a>
                    @endif
                @endif
                @if($subcategory->subcat_name != 'BOISSONS')
                <div class="row mt-5">
                    <div class="col-6">
                        <p class="text-center">COMPOSITION</p>
                        @if($product->prod_name == 'Freez cut')
                        <p class="text-center">
                        Riz panure panko<br>
                        Saumon : saumon façon tartare, sauce mayonnaise épicée<br>
                        Poulet : émietté de poulet à la crème<br>
                        Thon cuit : thon cuit façon rillette”<br>
                        </p>
                        @elseif($product->prod_name == 'CENTRAL MIX')
                        <p class="text-center">
                        Sushi : 1 thon, 1 saumon, 1 crevette<br>
                        Sashimi : 2 saumon, 1 thon<br>
                        3 california saumon, 3 maki saumon, 3 maki thon<br>
                        </p>
                        @elseif($product->prod_name == 'TENDANCE')
                        <p class="text-center">
                        Sushi : 2 saumon, 2 thon, 2 daurade, 2 crevette</br>
                        Maki : 6 saumon, 6 concombre, 6 avocat cheese</br>
                        6 saum’roll cheese, 6 california thon, 6 onion roll chicken</br>
                        </p>
                        @elseif($product->prod_name == 'FREEZ’BOX 32 pièces' || $product->prod_name == 'FREEZ’BOX 24 pièces')
                        @if($product->prod_name == 'FREEZ’BOX 32 pièces')
                        <p>4 saveurs au choix</p>
                        @elseif($product->prod_name == 'FREEZ’BOX 24 pièces')
                        <p>3 saveurs au choix</p>
                        @endif
                        <div class="row border-bottom-1">
                            <div class="col-6 d-flex align-items-center">
                                <p style="padding: 0px!important; margin:0px;">Saumon</p>
                            </div>
                            <div class="col-6">
                                <div class="pricetag pricetag1 justify-content-center">
                                    <div class="sidept">
                                        <button class="btn pbtn decrease-btn" data-item="freez_saumon">-</button>
                                    </div>
                                    <div class="centerinput"><input type="text" value="0" id="freez_saumon" disabled></div>
                                    <div class="sidelast">
                                        <button class="btn pbtn increase-btn" data-item="freez_saumon">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom-1">
                            <div class="col-6 d-flex align-items-center">
                                <p style="padding: 0px!important; margin:0px;">Thon</p>
                            </div>
                            <div class="col-6">
                                <div class="pricetag pricetag1 justify-content-center">
                                    <div class="sidept">
                                        <button class="btn pbtn decrease-btn" data-item="freez_thon">-</button>
                                    </div>
                                    <div class="centerinput"><input type="text" value="0" id="freez_thon" disabled></div>
                                    <div class="sidelast">
                                        <button class="btn pbtn increase-btn" data-item="freez_thon">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom-1">
                            <div class="col-6 d-flex align-items-center">
                                <p style="padding: 0px!important; margin:0px;">Crevette</p>
                            </div>
                            <div class="col-6">
                                <div class="pricetag pricetag1 justify-content-center">
                                    <div class="sidept">
                                        <button class="btn pbtn decrease-btn" data-item="freez_crevette">-</button>
                                    </div>
                                    <div class="centerinput"><input type="text" value="0" id="freez_crevette" disabled></div>
                                    <div class="sidelast">
                                        <button class="btn pbtn increase-btn" data-item="freez_crevette">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom-1">
                            <div class="col-6 d-flex align-items-center">
                                <p style="padding: 0px!important; margin:0px;">Poulet</p>
                            </div>
                            <div class="col-6">
                                <div class="pricetag pricetag1 justify-content-center">
                                    <div class="sidept">
                                        <button class="btn pbtn decrease-btn" data-item="freez_poulet">-</button>
                                    </div>
                                    <div class="centerinput"><input type="text" value="0" id="freez_poulet" disabled></div>
                                    <div class="sidelast">
                                        <button class="btn pbtn increase-btn" data-item="freez_poulet">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @else
                        <p class="text-center">{{ $product->composition }}</p>
                        @endif
                        <!-- @php
                        $compositions = explode(',', $product->composition);
                        @endphp
                        @foreach ($compositions as $composition) -->
                            
                        <!-- @endforeach -->
                    </div>
                    <div class="col-6" style="border-left: 1px solid var(--primary-color);">
                        <p class="text-center">ALLERGENES</p>
                        <p class="text-center">{{ $product->allergenes }}</p>
                        <!-- @php
                        $allergenes = explode(',', $product->allergenes);
                        @endphp
                        @foreach ($allergenes as $allergene)
                            
                        @endforeach -->
                    </div>
                </div>
                @elseif(($subcategory->subcat_name == 'BOISSONS') && ($product->composition !== null))
                <div class="row mt-5">
                    <div class="col-12">
                        
                        <p class="text-left" style="font-size: 0.8rem;">{{ $product->composition }}</p>
                    </div>
                </div>
                @endif
                <div class="row mt-5">
                    <div class="col-12">
                        <p class="text-left" style="font-size: 0.8rem;">{{ $product->text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@if($product->prod_name == 'FREEZ’BOX 32 pièces')
<script>
// Assuming you have a maxTotal variable representing the maximum total value allowed
var maxTotal = 4;

document.querySelectorAll('.increase-btn, .decrease-btn').forEach(function(button) {
    button.addEventListener('click', function() {
        var input = document.getElementById(this.dataset.item);
        var currentValue = parseInt(input.value);
        var newValue = currentValue + (this.classList.contains('increase-btn') ? 1 : -1);

        // Calculate the total value of all inputs
        var total = calculateTotal();

        // Check if the new value is within bounds
        if (newValue >= 0 && total + (newValue - currentValue) <= maxTotal) {
            input.value = newValue;

            // Check if the total exceeds the maximum allowed value after the update
            if (calculateTotal() > maxTotal) {
                // If it does, reset the input value and show an error message
                input.value = currentValue;
                alert('Error: Maximum total value of 4 exceeded.');
            }
        } else {
            // Show an error message or handle the error accordingly
            alert('4 saveurs au choix');
        }
    });
});

// Function to calculate the total value of all inputs
function calculateTotal() {
    var inputs = document.querySelectorAll('.centerinput input');
    var total = 0;

    inputs.forEach(function(input) {
        total += parseInt(input.value) || 0; // Convert input value to a number, default to 0 if NaN
    });

    return total;
}


</script>
@elseif($product->prod_name == 'FREEZ’BOX 24 pièces')
<script>
// Assuming you have a maxTotal variable representing the maximum total value allowed
var maxTotal = 3;

document.querySelectorAll('.increase-btn, .decrease-btn').forEach(function(button) {
    button.addEventListener('click', function() {
        var input = document.getElementById(this.dataset.item);
        var currentValue = parseInt(input.value);
        var newValue = currentValue + (this.classList.contains('increase-btn') ? 1 : -1);

        // Calculate the total value of all inputs
        var total = calculateTotal();

        // Check if the new value is within bounds
        if (newValue >= 0 && total + (newValue - currentValue) <= maxTotal) {
            input.value = newValue;

            // Check if the total exceeds the maximum allowed value after the update
            if (calculateTotal() > maxTotal) {
                // If it does, reset the input value and show an error message
                input.value = currentValue;
                alert('Error: Maximum total value of 4 exceeded.');
            }
        } else {
            // Show an error message or handle the error accordingly
            alert('3 saveurs au choix');
        }
    });
});

// Function to calculate the total value of all inputs
function calculateTotal() {
    var inputs = document.querySelectorAll('.centerinput input');
    var total = 0;

    inputs.forEach(function(input) {
        total += parseInt(input.value) || 0; // Convert input value to a number, default to 0 if NaN
    });

    return total;
}


</script>
@endif
@if($product->options->count())
<script>
    document.getElementById('product_options').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        var optionId = selectedOption.value;
        document.getElementById('selected_option_price').textContent = price + '€';

        var addToCartLink = document.getElementById('add-to-cart-link');
        var url = new URL(addToCartLink.href);
        url.searchParams.set('option_id', optionId);
        addToCartLink.href = url.toString();
    });

    // Handle the "+" and "-" buttons

</script>
@endif
@endsection