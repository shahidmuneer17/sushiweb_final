@extends('mac-sidebar')

@section('mac-content')
<style>
  .table {

    --bs-table-color: #e4d4bf;
    --bs-table-bg: #00000030;
  }

  .my-card {
    background-color: #00000030;
    border-radius: 10px;
    border: 1px solid #e4d4bf;
    padding: 20px;
  }
</style>
<div class="row">
  <div class="col-12">
    <h2 class="pmclr p-2">Commandes en cours</h2>
    <section class="row p-md-3 p-2">
      @if(!empty($orders))
      @php
      $pendingOrders = $orders->where('order_status', 'pending payment');
      $inProgressOrders = $orders->where('order_status', 'in-progress');
      @endphp

      @if(!empty($inProgressOrders))

      <div class="row">
      @foreach($inProgressOrders as $order)
      
        <div class="col-md-6">
        <div class="my-card m-3">
        <div class="row mb-2">
          <div class="col-12">
            <p class="pmclr"><strong>Numéro de commande:</strong> {{ $order->order_number }}</p>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-12">
            <p class="pmclr"><strong>Statut de la commande:</strong> {{ $order->order_status }}</p>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-12">
            <p class="pmclr"><strong>Date de commande:</strong> {{ $order->order_date }}</p>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-12">
            <p class="pmclr"><strong>Temps de commande:</strong> {{ $order->order_time }}</p>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-12">
            <p class="pmclr"><strong>Total de la commande:</strong> {{ $order->total_order_price }}</p>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-12">
            <a role="button" class="btn sushibtn" href="{{ route('order-details', ['order_id' => $order->order_id]) }}">Voir l'ordre</a>
          </div>
        </div>
      </div>
        </div>
      
      @endforeach
      </div>
      @endif
      @else
      <div class="row">
        <div class="col-md-12 p-3">
          <div class="my-card">
            <h3 class="text-center">Aucune commande active</h3>
          </div>
        </div>
      </div>
      @endif
    </section>
  </div>
</div>
@endsection