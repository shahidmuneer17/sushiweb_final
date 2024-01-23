@extends('app')

@section('content')

<div class="row">
    <div class="col-12 text-center p-5 pmclr">
        <h2>NOUS CONTACTER</h2>
    </div>
</div>

<form action="{{ route('contact.send') }}" method="POST">
    @csrf
    <div class="row pmclr sushiform opbg p-md-5 p-2 justify-content-center">

        <div class="col-md-10">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
            <div class="mb-3 d-flex">
                <div>
                    <label for="" class="">Votre Nom:</label>
                </div>
                <div class="flex-fill">
                    <input type="text" name="name" placeholder="Votre Nom">
                </div>
            </div>

            <div class="mb-3 d-flex">
                <div>
                    <label for="" class="">Votre Adresse mail:</label>
                </div>
                <div class="flex-fill">
                    <input type="email" name="email" placeholder="votre-email@email.com">
                </div>
            </div>

            <div class="mb-3 d-flex">
                <div>
                    <label for="" class="">Votre numéro de téléphone (optionnel):</label>
                </div>
                <div class="flex-fill">
                    <input type="tel" name="phone" placeholder="+33 xxx xx xx xx">
                </div>
            </div>

            <div class="mb-3 mt-3 d-flex">
                <div>
                    <label for="" class="">Votre message:</label>

                </div>
                <div class="flex-fill">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Votre message"></textarea>
                </div>
            </div>

            <div class="mb-3 mt-3 d-flex d-flex justify-content-center">


                <div class="mt-3 mb-3 ">
                    <button type="submit" class="sushibtn">ENVOYER</button>
                </div>

            </div>


        </div>
</form>

</section>

@endsection