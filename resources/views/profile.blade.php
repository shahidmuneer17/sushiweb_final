@extends('mac-sidebar')

@section('mac-content')
<style>
    .myiconac svg {
        fill: #000
    }
</style>
<style>
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

    .goback {
    text-decoration: none;
    color: var(--sec-color);
    border-radius: 0;
    font-size: medium;
    padding: 10px!important;
    padding: 10px;
}

.goback:hover {
    text-decoration: none;
    color: var(--sec-color);
    border-radius: 0;
    font-size: medium;
    padding: 10px!important;
}
</style>

<div class="row">
    <div class="col-12">
        <div class="d-flex mb-3 justify-content-center">
            
        </div>

    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="/update-profile" method="POST">
        @csrf
        @method('PUT')
        <div class="row pmclr sushiform p-md-3 p-2">
        <div class="mb-3 d-flex">
            <label for="name">Nom</label>
            <input type="text" id="name" name="first_name" value="{{ auth()->user()->first_name }}" required>
        </div>

        <div class="mb-3 d-flex">
            <label for="name">Prénom</label>
            <input type="text" id="name" name="last_name" value="{{ auth()->user()->last_name }}" required>
        </div>

        <div class="mb-3 d-flex">
          <div>

          
            <label for="name">Numéro de téléphone</label>
            </div>
            <div class="flex-fill">
            <input type="text" id="name" name="phone" value="{{ auth()->user()->phone }}" required>
            </div>
        </div>

        <div class="mb-3 d-flex">
          <div>
            <label for="email">Adresse mail</label>
            </div>
            <div class="flex-fill">
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" disabled>
            </div>
        </div>

        <div class="mb-3 d-flex">
        <button type="button" class="btn goback p-0" data-bs-toggle="modal" data-bs-target="#exampleModalpassword">Modifier le mot de passe</button>
        </div>

        <div class="mb-3 d-flex">
          <div>
            <label for="email">Adresse de livraison</label>
            </div>
            <div class="flex-fill">
            <input type="text" id="address-de-livraison" name="address" value="{{ auth()->user()->address }}" disabled>
            </div>
        </div>

        <div class="mb-3 d-flex">
        <button type="button" class="btn goback p-0" data-bs-toggle="modal" data-bs-target="#exampleModaladdress">Modifier l’adresse de livraison</button>
        </div>

        <button type="submit" class="btn btn-primary sushibtn">Mettre à jour mon profil</button>
        </div>
    </form>
    </div>
</div>
</section>
<div class="modal fade" id="exampleModalpassword" tabindex="-1" aria-labelledby="exampleModalpassword" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #bc2d2d; color: #fff;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier le mot de passe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body">
        <div class="row pmclr sushiform p-md-3 p-2">
        <form action="/updateProfilePassword" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3 d-flex">
            <label for="password">Nouveau mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="mb-3 d-flex">
            <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary sushibtn">Modifier le mot de passe</button>

</form>
</div>
        
        <div id="result" class="align-items-center">
          <span id="resultText"></span>
          <button id="closeButton" onclick="closeResult()">X</button>
        </div>
    

        </div>
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn goback p-0">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModaladdress" tabindex="-1" aria-labelledby="exampleModaladdress" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #bc2d2d; color: #fff;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier l’adresse de livraison</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/updateProfileAddress" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body">
        <h5 class="pmclr p-2">LIVRAISON</h5>
        <div class="input-container" style="display: flex; align-items: center; height: 53px; overflow: hidden;">
          <input type="text" id="map-address-input" name="address" placeholder="Entrez votre addresse...">
          <button type="submit" style="background-color: var(--sec-color); border: none; margin-left: 5px; height: 53px; margin: 0;" class="p-2">Entrer</button>
          <button onclick="getCurrentLocation()" style="background-color: transparent; border: none; color: var(--sec-color); position: absolute; top: 0; right: 60px; font-size: 24px;    margin-top: 0px!important;    padding-top: 0;" class="mt-2 p-2">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1.5em" viewBox="0 0 50.000000 50.000000" preserveAspectRatio="xMidYMid meet">
              <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="var(--primary-color)" stroke="none">                
                <path d="M194 461 c-57 -26 -87 -72 -92 -141 -4 -51 0 -63 43 -145 100 -192 125 -199 203 -56 39 71 25 83 -16 15 -15 -26 -37 -59 -50 -73 l-22 -26 -25 30 c-47 56 -115 203 -115 247 0 167 236 193 279 30 14 -50 36 -58 26 -9 -15 68 -45 106 -108 132 -47 20 -73 19 -123 -4z" />
                <path d="M240 383 c-28 -10 -50 -36 -50 -60 0 -12 5 -23 10 -23 6 0 10 8 10 18 0 46 69 59 95 18 30 -46 -18 -101 -65 -76 -28 15 -40 2 -16 -16 37 -27 80 -15 101 27 20 38 19 54 -7 83 -25 26 -54 37 -78 29z" />
              </g>
            </svg>
          </button>
        </div>
</form>
        <style>
          .myicon {
            font-size: 24px;
          }

          #result {
            align-items: center;
            justify-content: center;
            display: none;
            width: 50%;
            height: 30%;
            position: absolute;
            top: 50%;
            left: 30%;
            background-color: white;
          }

          #closeButton {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            background-color: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
          }
        </style>

        <div id="result" class="align-items-center">
          <span id="resultText"></span>
          <button id="closeButton" onclick="closeResult()">X</button>
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