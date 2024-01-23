@extends('app')

@section('content')
<section class="loginframe">
    @if (session('method') == 'delivery')
    <div class="row">
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
                <h3>Vous avez choisi l’option suivante</h3>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-12">
            <h4 class="pmclr p-3 text-center" style="color: var(--sec-color);">LIVRAISON</h4>
            <p class="pmclr p-2 text-center" style="color: var(--sec-color);">
                {{ session('timeslot') ?? 'Dans un délai de 30 à 45 minutes' }}</p>
        </div>
        <div class="col-md-4">
            <h5 class="pmclr p-2">A l’adresse suivante</h5>
            <p class="pmclr p-2">{{ $user->address ?? '' }}</p>
            <p class="pmclr p-2">{{ $user->info ?? '' }}</p>
        </div>

        <div class="col-md-4">
            <h5 class="pmclr p-2">Vous êtes joignable au</h5>
            <p class="pmclr p-2">{{ $user->phone ?? '' }}</p>
            <p class="pmclr p-2">Créneau:
                @if(!empty(session('timeslot'))){{session('timeslot')}}@else{{ \Carbon\Carbon::parse(now())->addMinutes(30)->format('H:i') }}
                à {{ \Carbon\Carbon::parse(now())->addMinutes(45)->format('H:i') }}@endif</p>
        </div>

        <div class="col-md-4">
            @if(!empty($user->address))
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCyvvHKG-mifH6LIBKneDnJXHnqlAPpuec&q={{ urlencode($user->address) }}"
                    allowfullscreen></iframe>
            </div>
            @endif

        </div>
        <div class="col-12 p-3">
            <p style="color: var(--sec-color);">Profitez d’une livraison sans frais par l’un de nos livreurs CENTRAL
                SUSHI</p>
        </div>
        <div class="col-12 p-3 text-center pmclr">
            <a class="p-2 pmclr" href="{{ route('menu') }}">

                <h3 style="text-decoration: underline;">Vous avez changé d’avis ? Récupérez votre commande au restaurant
                </h3>
            </a>
        </div>
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
                <a role="button" href="{{ route('payment-options') }}" class="btn sushibtn">
                    Procéder au paiement
                </a>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
                <h3>Vous avez choisi l’option suivante</h3>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-12">
            <h4 class="pmclr p-3 text-center" style="color: var(--sec-color);">A RECUPERER AU RESTAURANT</h4>
            <p class="pmclr p-2 text-center" style="color: var(--sec-color);">
                {{ session('timeslot') ?? 'Dans un délai de 15 à 20 minutes' }}</p>
        </div>
        <div class="col-md-4">
       
            @php
            $restaurent = session('restaurent');
            @endphp
            @if($restaurent == '1')
            <h5 class="pmclr p-2">CENTRAL SUSHI DIJON</h5>
            <p class="pmclr p-2">25 Place Darcy</p>
            <p class="pmclr p-2">21000 DIJON</p>
            <p class="pmclr p-2">03 80 23 22 00</p>
            @elseif($restaurent == '3')
            <h5 class="pmclr p-2">CENTRAL SUSHI BELFORT</h5>
            <p class="pmclr p-2">60 Faubourg de Montbéliard</p>
            <p class="pmclr p-2">90000 BELFORT</p>
            <p class="pmclr p-2">03 84 58 67 37</p>
            @elseif($restaurent == '2')
            <h5 class="pmclr p-2">CENTRAL SUSHI BESANCON</h5>
            <p class="pmclr p-2">35 Avenue Carnot </p>
            <p class="pmclr p-2">25000 BESANCON</p>
            <p class="pmclr p-2">03 70 88 97 00</p>
            @endif
        </div>

        <div class="col-md-4">
            <h5 class="pmclr p-2">Créneau:</h5>

            <p class="pmclr p-2">
                @if(!empty(session('timeslot'))){{session('timeslot')}}@else{{ \Carbon\Carbon::parse(now())->addMinutes(15)->format('H:i') }}
                à {{ \Carbon\Carbon::parse(now())->addMinutes(20)->format('H:i') }}@endif</p>
        </div>

        <div class="col-md-4">
            @if($restaurent == '1')
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCyvvHKG-mifH6LIBKneDnJXHnqlAPpuec&q=dijon"
                    allowfullscreen></iframe>
            </div>
            @elseif($restaurent == '2')
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCyvvHKG-mifH6LIBKneDnJXHnqlAPpuec&q=besancon"
                    allowfullscreen></iframe>
            </div>
            @elseif($restaurent == '3')
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCyvvHKG-mifH6LIBKneDnJXHnqlAPpuec&q=belfort"
                    allowfullscreen></iframe>
            </div>
            @endif

        </div>
        <div class="col-12 p-3">
            <p style="color: var(--sec-color);">Profitez d’une livraison sans frais par l’un de nos livreurs CENTRAL
                SUSHI</p>
        </div>
        <div class="col-12 p-3 text-center pmclr">
            <a class="p-2 pmclr" href="{{ route('menu') }}">

                <h3 style="text-decoration: underline;">Vous avez changé d’avis ? Faites-vous livrer
                </h3>
            </a>
        </div>
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
                <a role="button" href="{{ route('payment-options') }}" class="btn sushibtn">
                    Procéder au paiement
                </a>
            </div>
        </div>
    </div>
    @endif
</section>

</section>


@endsection