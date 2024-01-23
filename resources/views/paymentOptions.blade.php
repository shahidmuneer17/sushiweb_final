@extends('app')

@section('content')
<section class="loginframe">
    <div class="row">
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
                <h3>C’est bientôt fini… Finalisez le paiement de votre commande</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
                
            <a href="{{route('place-order', ['payment_method'=>'especes'] )}}" role="button" class="btn sushibtn">ESPECES</a>

         </div>
        </div>
    </div>

    
    @if(session('method') == 'takeaway')
    <div class="row">
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
                <a href="{{route('place-order', ['payment_method'=>'au-restaurant'] )}}" role="button" class="btn sushibtn">Directement au restaurant</a>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="pmclr p5 text-center mb-5">
                
            <a href="{{route('place-order', ['payment_method'=>'cb-en-ligne'] )}}" role="button" class="btn sushibtn">CB en ligne</a>
            </div>
        </div>
    </div>

</section>

</section>


@endsection