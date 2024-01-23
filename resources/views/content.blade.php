<style>
  .select-box__option {
    padding: 0px;
  }

  .aselection:hover {
    color: #546c84;
    background-color: #e4d4bf;
  }

  .aselection {
    color: #e4d4bf;
    width: 100%;
    height: 100%;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>
<div class="row topbg" style="min-height: 800px; align-items: center; justify-content: space-around; margin: 0;">
  <div class="col-12">
    <div class="row opbg" style="align-items: start; justify-content: space-around; padding-top: 50px; padding-bottom: 50px;">
      <div class="col-md-6 text-center" style="max-width: 350px;">
        <h5 class="pmclr p-2">A EMPORTER</h5>
        <div class="select-box">
          <div class="select-box__current" tabindex="1">
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="0" value="0" name="Ben" checked="checked">
              <p class="select-box__input-text" style="background-color: #000;">Choisissez un restaurant</p>
            </div>
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="1" value="1" name="">
              <p class="select-box__input-text"><a href="{{ route('store-in-session', ['restaurent' => '1', 'method' => 'takeaway']) }}">CENTRAL SUSHI Dijon</a></p>
            </div>
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="2" value="2" name="">
              <p class="select-box__input-text"><a class="aselection" href="{{ route('store-in-session', ['restaurent' => '2', 'method' => 'takeaway']) }}">CENTRAL SUSHI Besancon</a></p>
            </div>
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="3" value="3" name="">
              <p class="select-box__input-text"><a class="aselection" href="{{ route('store-in-session', ['restaurent' => '3', 'method' => 'takeaway']) }}">CENTRAL SUSHI Belfort</a></p>
            </div>
            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true">
          </div>

          <ul class="select-box__list">
            <li>
              <label class="select-box__option" for="1" aria-hidden="true" value="1"><a class="aselection" href="{{ route('store-in-session', ['restaurent' => '1', 'method' => 'takeaway']) }}">CENTRAL SUSHI Dijon</a></label>
            </li>
            <li>
              <label class="select-box__option" for="2" aria-hidden="true" value="2"><a class="aselection" href="{{ route('store-in-session', ['restaurent' => '2', 'method' => 'takeaway']) }}">CENTRAL SUSHI Besancon</a></label>
            </li>
            <li>
              <label class="select-box__option" for="3" aria-hidden="true" value="3"><a class="aselection" href="{{ route('store-in-session', ['restaurent' => '3', 'method' => 'takeaway']) }}">CENTRAL SUSHI Belfort</a></label>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-8 text-center " style="max-width: 350px;">
        <h5 class="pmclr p-2">LIVRAISON</h5>
        <div class="input-container" style="display: flex; align-items: center; height: 53px; overflow: hidden;">
          <input type="text" id="map-address-input" placeholder="Entrez votre addresse...">
          <button id="checkDZ" style="background-color: var(--sec-color); border: none; margin-left: 5px; height: 53px; margin: 0;" class="p-2">Entrer</button>
          <button onclick="getCurrentLocation()" style="    background-color: transparent; border: none; color: var(--sec-color); position: absolute; top: 0; right: 60px; font-size: 24px;    margin-top: 0px!important;    padding-top: 0;" class="mt-2 p-2">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1.5em" viewBox="0 0 50.000000 50.000000" preserveAspectRatio="xMidYMid meet">
              <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="var(--primary-color)" stroke="none">                <path d="M194 461 c-57 -26 -87 -72 -92 -141 -4 -51 0 -63 43 -145 100 -192 125 -199 203 -56 39 71 25 83 -16 15 -15 -26 -37 -59 -50 -73 l-22 -26 -25 30 c-47 56 -115 203 -115 247 0 167 236 193 279 30 14 -50 36 -58 26 -9 -15 68 -45 106 -108 132 -47 20 -73 19 -123 -4z" />
                <path d="M240 383 c-28 -10 -50 -36 -50 -60 0 -12 5 -23 10 -23 6 0 10 8 10 18 0 46 69 59 95 18 30 -46 -18 -101 -65 -76 -28 15 -40 2 -16 -16 37 -27 80 -15 101 27 20 38 19 54 -7 83 -25 26 -54 37 -78 29z" />
              </g>
            </svg>
          </button>
        </div>

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
    </div>
  </div>

</div>

<div class="col-12 opbg p-5 mt-5 pmclr">
  <h3 class="pmclr p-2 text-center mb-3" style="font-size: 50px;">CENTRAL SUSHI <img style="padding-left: 20px;" src="images/etses2.png"></h3>
  <p>
    Mettent en œuvre tout leur savoir-faire à votre service pour offrir la meilleure qualité.
  </p>
  <p>
    Fort de son expérience depuis plus de 10 ans, CENTRAL SUSHI se donne pour mission de garantir la qualité et la fraîcheur de ses produits dans un cadre moderne et élégant.
  </p>
  <p>
    Présent sur les secteurs de Dijon et Besançon, CENTRAL SUSHI a l’honneur de vous annoncer l’ouverture d’un nouveau point de vente à Belfort.
  </p>
  <p>
    Nouveau logo, nouveau design, plaisir inchangé.
  </p>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-3">
      <img src="images/collage1.webp" class="img-fluid" alt="Collage 1">
    </div>
    <div class="col-3">
      <div class="row">
        <div class="col-12">
          <img src="images/collage2.webp" class="img-fluid" alt="Collage 2">
        </div>
        <div class="col-12 mt-3">
          <img src="images/collage3.webp" class="img-fluid" alt="Collage 3">
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="row">
        <div class="col-12 mt-3">
          <img src="images/collage5.webp" class="img-fluid" alt="Collage 5">
        </div>
        <div class="col-12">
          <img src="images/collage4.webp" class="img-fluid" alt="Collage 4">
        </div>

      </div>
    </div>
    <div class="col-3">
      <img src="images/collage6.webp" class="img-fluid" alt="Collage 6">
    </div>
  </div>
</div>

</section>