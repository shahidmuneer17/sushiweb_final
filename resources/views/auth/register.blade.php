@extends('app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex mb-3 justify-content-center">
            <div class="myiconac"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg></div>
        </div>
        <div class="pmclr p5 text-center">
            <h3>MON COMPTE CENTRAL SUSHI</h3>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center p-2 mb-3 mt-3 pmclr">SE CONNECTER</h3>
        <div id="registerForm" class="row justify-content-center hidden1">
            <div class="col-md-6">
                <div class="row pmclr sushiform p-md-2">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3 d-flex">
                            <label for="">Addresse mail:</label>
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
                            <label for="">Prenom</label>
                            <input name="last_name" type="text" value="{{old('last_name')}}" rquired>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="">Téléphone</label>
                            <input name="phone" id="phone" type="text" value="{{old('phone', '+33')}}" required>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="">Mot de passe</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="">Vérifier le mot de passe</label>


                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>


                        <div class="mb-3 d-flex justify-content-center mt-5">
                            <button type="submit" name="register" class="sushibtn">S'INSCRIRE</button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection