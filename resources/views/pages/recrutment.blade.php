@extends('app')

@section('content')

<div class="row">
    <div class="col-12 text-center p-5 pmclr">
        <h2>Rejoignez l’équipe CENTRAL SUSHI !</h2>
    </div>
</div>
<form action="">
    <div class="row pmclr sushiform opbg p-md-5 p-2">
        
        <div class="col-md-6">
            <div class="mb-3 d-flex">
            <label for="">Nom:</label>
            <input type="text">
            </div>
            
            <div class="mb-3 d-flex">
            <label for="">Prénom:</label>
            <input type="text">
            </div>
            
            <div class="mb-3 d-flex">
            <label for="">Téléphone</label>
            <input type="tel">
            </div>

            <div class="mb-3 d-flex">
            <label for="">Poste visé</label>
            <div class="select-box">
          <div class="select-box__current" tabindex="1">
          <div class="select-box__value">
              <input class="select-box__input" type="radio" id="" value="" name="" checked="checked">
              <p class="select-box__input-text">Livreur polyvalent</p>
            </div>  
          <div class="select-box__value">
              <input class="select-box__input" type="radio" id="" value="" name="">
              <p class="select-box__input-text">Serveur polyvalent</p>
            </div>
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="" value="" name="">
              <p class="select-box__input-text">Commis de cuisine</p>
            </div>
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="" value="" name="">
              <p class="select-box__input-text">Chef Sushi</p>
            </div>
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="" value="" name="">
              <p class="select-box__input-text">Manager</p>
            </div>
            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true">
          </div>
          <ul class="select-box__list">
            
          <li>
              <label class="select-box__option" for="0" aria-hidden="true">Livreur polyvalent</label>
            </li>
            <li>
              <label class="select-box__option" for="1" aria-hidden="true">Serveur polyvalent</label>
            </li>
            <li>
              <label class="select-box__option" for="4" aria-hidden="true">Commis de cuisine</label>
            </li>
            <li>
              <label class="select-box__option" for="4" aria-hidden="true">Chef Sushi</label>
            </li>
            <li>
              <label class="select-box__option" for="4" aria-hidden="true">Manager</label>
            </li>
          </ul>
        </div>
            <!-- <select>
                <option value="">Livreur polyvalent</option>
                <option value="">Serveur polyvalent</option>
                <option value="">Commis de cuisine</option>
                <option value="">Chef Sushi</option>
                <option value="">Manager</option>
            </select> -->
            </div>
            
            <div class="mb-3 d-flex">
            <label for="">Ville</label>
            <div class="select-box">
          <div class="select-box__current" tabindex="1">
          <div class="select-box__value">
              <input class="select-box__input" type="radio" id="" value="" name="" checked="checked">
              <p class="select-box__input-text">Dijon</p>
            </div>  
          <div class="select-box__value">
              <input class="select-box__input" type="radio" id="" value="" name="">
              <p class="select-box__input-text">Besancon</p>
            </div>
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="" value="" name="">
              <p class="select-box__input-text">Belfort</p>
            </div>
            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true">
          </div>
          <ul class="select-box__list">
            
          <li>
              <label class="select-box__option" for="0" aria-hidden="true">Dijon</label>
            </li>
            <li>
              <label class="select-box__option" for="1" aria-hidden="true">Besancon</label>
            </li>
            <li>
              <label class="select-box__option" for="4" aria-hidden="true">Belfort</label>
            </li>
          </ul>
        </div>
            <!-- <select>
                <option value="">Dijon</option>
                <option value="">Besancon</option>
                <option value="">Belfort</option>
            </select> -->
            </div>
            
        </div>
        <div class="col-md-6">
            <div>
            <textarea name="" id="" cols="30" rows="10">Message</textarea>
            </div>
            
            <div class="mb-3 d-flex">
            <label for="">Déposer mon CV:</label>
            <input type="file">
            </div>

            
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
            <div class="mt-3 mb-3 d-flex justify-content-center">
            <a href="" role="button" class="sushibtn">SOUMETTRE MA CANDIDATURE</a>
            </div>
            
            </div>
        </div>
        
    </div>
    </form>
</div>

</section>

@endsection