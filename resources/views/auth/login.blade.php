@extends('app')

@section('content')
<style>
    .myiconac svg {
        fill: #000
    }

    .hidden1 {
        display: none;
    }

    body {
        padding: 2em;
    }

    /* Shared */
    .loginBtn {
        box-sizing: border-box;
        position: relative;
        /* width: 13em;  - apply for fixed size */
        margin: 0.2em;
        padding: 0 15px 0 46px;
        border: none;
        text-align: left;
        line-height: 34px;
        white-space: nowrap;
        border-radius: 0.2em;
        font-size: 16px;
        color: #FFF;
    }

    .loginBtn:before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        width: 34px;
        height: 100%;
    }

    .loginBtn:focus {
        outline: none;
    }

    .loginBtn:active {
        box-shadow: inset 0 0 0 32px rgba(0, 0, 0, 0.1);
    }


    /* Facebook */
    .loginBtn--facebook {
        background-color: #4C69BA;
        background-image: linear-gradient(#4C69BA, #3B55A0);
        /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
        text-shadow: 0 -1px 0 #354C8C;
    }

    .loginBtn--facebook:before {
        border-right: #364e92 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
    }

    .loginBtn--facebook:hover,
    .loginBtn--facebook:focus {
        background-color: #5B7BD5;
        background-image: linear-gradient(#5B7BD5, #4864B1);
    }


    /* Google */
    .loginBtn--google {
        /*font-family: "Roboto", Roboto, arial, sans-serif;*/
        background: #DD4B39;
    }

    .loginBtn--google:before {
        border-right: #BB3F30 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
    }

    .loginBtn--google:hover,
    .loginBtn--google:focus {
        background: #E74B37;
    }
</style>
<section class="loginframe">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex mb-3 justify-content-center">
                        <div class="myiconac"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                            </svg></div>
                    </div>
                    <div class="pmclr p5 text-center">
                        <h3>CONNECTEZ-VOUS A VOTRE COMPTE<br>CENTRAL SUSHI</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 p-3">
                    
                    <form method="POST" action="{{ route('login') }}" id="emailform">
                        @csrf
                        <div class="row pmclr sushiform p-md-3 p-2">
                            <div class="mb-3 d-flex">
                                <label for="">Adresse mail:</label>
                                <!-- <input name="email" type="text" value="@if(session('email')){{session('useremail')}}@endif"> -->
                                <input placeholder="Entrer votre adresse mail.." name="email" type="email" id="email" value="{{ old('email', session('checkemail')) }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex">
                                <label for="">Mot de passe:</label>
                                <input placeholder="Entrer votre mot de passe.." name="password" type="password" id="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex p-3 justify-content-center">

                            </div>
                            <div class="mb-3 d-flex justify-content-center mt-5">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" class="btn sushibtn">ME CONNECTER</button>
                                    </div>
                                </div>


                            </div>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" style="color: #ff883e;" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-12">

                    <div class="pmclr p5 text-center" style="margin-top: 59px;">
                        <h3>NOUVEAU COMPTE</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 p-3">
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row pmclr sushiform p-md-3 p-2">
                            <div class="mb-3 d-flex">
                                <label for="">Adresse mail:</label>
                                <input name="email" type="text" value="{{old('email')}}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <input name="role" type="hidden" value="customer" required>

                            <div class="mb-3 d-flex">
                                <label for="">Nom:</label>
                                <input name="first_name" type="text" value="{{old('first_name')}}" required>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex">
                                <label for="">Prénom</label>
                                <input name="last_name" type="text" value="{{old('last_name')}}" rquired>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex">
                                <label for="">Téléphone</label>
                                <input name="phone" id="phone" type="text" value="{{old('phone', '+33')}}" pattern="(\+33|0)[1-9](\d{2}){4}" required>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex">
                                <label for="">Mot de passe</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex">
                                <label for="">Vérifier le mot de passe</label>


                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>


                            <div class="mb-3 d-flex justify-content-center mt-5">
                                <button type="submit" name="register" class="sushibtn">S'INSCRIRE</button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</section>
<!-- Modal -->
<div class="modal fade" id="exampleModaladdress" tabindex="-1" aria-labelledby="exampleModaladdress" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Changement d'adresse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">
                <h5 class="text-center p-2">LIVRAISON</h5>
                <div class="input-container" style="display: flex; align-items: center;">
                    <input type="text" id="map-address-input" placeholder="Entrez votre addresse...">
                    <button id="checkDZ" style="background-color: var(--sec-color); border: none; margin-left: 5px;" class="p-2">Entrer</button>
                    <button onclick="getCurrentLocation()" style="    background-color: transparent;
    border: none;
    color: var(--sec-color);
    position: absolute;
    top: 0;
    right: 72px;
    font-size: 24px;
    margin-top: 0px!important;
    padding-top: 9px!important;" class="mt-2 p-2"><i class="fa-solid fa-location-crosshairs"></i></button>
                </div>

            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn goback p-0">Save changes</button>
      </div> -->
        </div>
    </div>
</div>

@endsection