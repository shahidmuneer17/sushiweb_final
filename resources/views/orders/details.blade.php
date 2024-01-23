@extends('mac-sidebar')

@section('mac-content')

<style>
    .table {
        --bs-table-color: #e4d4bf;
        --bs-table-bg: #00000030;
    }
</style>

<div class="row pmclr">
    <div class="col-md-12 p-3">
        <h3>Commande</h3>
        <style>
            .table {
                --bs-table-color: #e4d4bf;
                --bs-table-bg: #00000030;
            }
            h4 {
                color: white;
            }
            </style>
            <div class="row">
                <div class="col-md-6 p-3">
                <h5 class="pt-3"><strong>Restaurent:</strong><br>{{$order->restaurent->restaurent_name}}</h5>
        <h5 class="pt-3"><strong>Numéro de commande:</strong><br>{{$order->order_number}}</h5>
        <h5 class="pt-3"><strong>Date de commande:</strong><br>{{$order->order_date}}</h5>
        <h5 class="pt-3"><strong>Temps de commande:</strong><br>{{$order->order_time}}</h5>
        <h5 class="pt-3"><strong>Temps de livraison estimé:</strong><br>{{$order->estimated_delivery_time}}</h5>
        <h5 class="pt-3"><strong>Méthode de livraison:</strong><br>{{$order->delivery_method}}</h5>
                </div>
                <div class="col-md-6 p-3">
                <h5 class="pt-3"><strong>Statut de la commande:</strong><br>{{$order->order_status}}</h5>
        <h5 class="pt-3"><strong>Mode de paiement:</strong><br>{{$order->payment->payment_method}}</h5>
        <h5 class="pt-3"><strong>Statut de paiement:</strong><br>{{$order->payment->payment_status}}</h5>
        <h5 class="pt-3"><strong>Prix total de la commande:</strong><br>{{$order->total_order_price}}</h5>
                </div>
            </div>
        
        
        
        
        <h3 class="pt-3 pb-3 pmclr">Détails de la commande</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $orderDetail)
                <tr>
                    <td style="color: white;">
                    @if($orderDetail->option_id !== null)
    {{ $orderDetail->option->product->subcategory->subcat_name }}<br>
    {{ $orderDetail->option->product->prod_name }}<br>
    ({{ $orderDetail->option->option_name }})
@else
    @if($orderDetail->extra_id !== null)
        
        {{ $orderDetail->product_name }}
    @else
    {{ $orderDetail->product->subcategory->subcat_name ?? null }}<br>
        {{ $orderDetail->product->prod_name ?? null }}
    @endif
    @if($orderDetail->choices !== null)
        <br>({{ $orderDetail->choices }})
    @endif
@endif
                    </td>
                    <td style="color: white;">{{ $orderDetail->product_qty }}</td>
                    <td style="color: white;">{{ $orderDetail->product_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection