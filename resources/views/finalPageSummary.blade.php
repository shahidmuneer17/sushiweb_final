@extends('app')

@section('content')
@if($order)
<section class="loginframe">
    <div class="row">
        <div class="col-12">
            <div class="p5 text-center mb-5" style="color: #BA321C;">
                <h1>Nous vous remercions pour votre commande !</h1>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-12">
    <div class="pmclr p5 text-center mb-5">
        <h4>Commande n°</h4>
        <p>{{ $order->order_number }}</p>
        <h4>Numéro de téléphone</h4>
        <p>{{ $order->user->phone }}</p>
        <h4>Montant total</h4>
        <p>{{ $order->total_order_price }}€</p>
        <h4>Mode de paiement</h4>
        <p>{{ $order->payment->payment_method }}</p>
        <br>
        <p>Votre avis compte pour nous ! Pensez à laisser un avis après votre passage chez Central Sushi !</p>
    </div>
    </div>
    <!-- <div class="row">
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
            @php
            $paymentMethod = $order->payment->payment_method;
            @endphp
            @if($paymentMethod == 'cash')
            <a href="{{route('payment-process', ['order_id'=>$order->order_id] )}}" role="button" class="btn sushibtn">Cash</a>
            @elseif($paymentMethod == 'counter')
            <a href="{{route('payment-process', ['order_id'=>$order->order_id] )}}" role="button" class="btn sushibtn">Counter</a>
            @elseif($paymentMethod == 'token')
            <a href="{{route('payment-process', ['order_id'=>$order->order_id] )}}" role="button" class="btn sushibtn">Token</a>
            @elseif($paymentMethod == 'online')
            <form method="POST" action="{{ route('payment-process', ['order_id' => $order->order_id]) }}">
    @csrf
    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
    <button type="submit" class="btn sushibtn">Online</button>
</form>
            @endif
         </div>
        </div>
    </div> -->
    
</section>

</section>
@endif

@endsection