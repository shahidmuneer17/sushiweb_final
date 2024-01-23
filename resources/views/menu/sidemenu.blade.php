@extends('app')

@section('content')
<style>
  body {
    overscroll-behavior: none;
    overflow-x: hidden;
}
.acdbtn a {
    text-decoration: none;
    color: #E4D4BF;
}

.goback {
    text-decoration: none;
    color: var(--sec-color);
    border-radius: 0;
    font-size: medium;
    padding: 10px!important;
}

.goback:hover {
    text-decoration: none;
    color: var(--sec-color);
    border-radius: 0;
    font-size: medium;
    padding: 10px!important;
}

.goback2 {
    text-decoration: none;
    color: var(--sec-color);
    border-radius: 0;
    font-size: medium;
    padding: 10px!important;
}

.goback2:hover {
    text-decoration: none;
    color: #000;
    border-radius: 0;
    font-size: medium;
    padding: 10px!important;
}
  

.modal-dialog {
    top: 50%;
}

.modal-content {
    background-color: var(--primary-color);
    color: #000;
}

.hideme {
    display: none;
}
.read-more-button {
    font-size: 10px;
}
#menu-head {
    background: #00000085;
    position: fixed;
    transform: translateZ(0);
    top: 160px;
    z-index: 1000;
    width: 100vw;
  }
  #menu-side {
    background: #00000085;
    position: fixed;
    transform: translateZ(0);
    top: 150px;
    z-index: 999;
    margin-top: 121px;
    padding-top: 10px;
    width: 287px!important;
    height: calc(100vh - 156px);
    overflow-y: auto;
}
.content-menu {
  margin-top: 150px; margin-left: 250px;
  margin-right: 0;
}
.product-container-col {
  height: 200px;
  width: 100px;
}
.product-container-col p {
  font-size: 10px;
}
#menu-head2 {
  display: none;
}
#menu-side2 {
  display: none;
}
@media screen and (max-width: 1136px) {
    h4 h5 {
      font-size: 18px;
      margin: 0;
    }
    h6 {
      margin: 0;
    }
    .goback {
      padding: 0!important;
    }
}
@media screen and (max-width: 992px) {
    #menu-side {
      margin-top: 115px;
    }
}
@media screen and (max-width: 768px) {
    #menu-side {
      display: none;
    }
    #menu-head {
      display: none;
    }
    #menu-head2 {
      display: flex;
      position: fixed;
      transform: translateZ(0);
      bottom: 0px;
      z-index: 10;
      width: 100%;
    }
    .content-menu {
      margin-top: 0px; margin-left: 0px;
    }
    .product-container-col {
      height: 50%;
      width: 50%;
      padding: 30px!important;
    }
    .product-container-col p {
      font-size: 14px;
    }
    #menu-side2 {
      display: flex;
    position: fixed;
    transform: translateZ(0);
    top: 164px;
    z-index: 10000;
    width: 100%;
    
    overflow-x: auto;
    overflow-y: hidden;
    background: #00000085;
    margin: 0;
    padding: 10px;
    }

    #menu-side2 a {
      font-size: 14px;
      width: max-content;
      padding-left: 15px;
      padding-right: 15px;
      color: var(--primary-color);
    }
}
</style>

<div id="menu-head" class="row pmclr m-0 p-0">
  <div class="col-md-3 p-lg-3 p-md-2">
    <h4>
      @if(session('restaurent') == '1')
      CENTRAL SUSHI Dijon
      @elseif(session('restaurent') == '2')
      CENTRAL SUSHI Besancon
      @elseif(session('restaurent') == '3')
      CENTRAL SUSHI Belfort
      @else
      Choisir un restaurant
      @endif
    </h4>
    @if(session('method') == 'takeaway')
    <h5><button type="button" class="btn goback p-0" onclick=hideme()>+ Modifier</button></h5>
    <div class="row hideme" id="selectionres">
      <div class="col-12"">
        
        @if(session('restaurent') != '1')
        <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '1', 'method' => 'takeaway']) }}">CENTRAL SUSHI Dijon</a>
        @endif
        @if(session('restaurent') != '2')
        <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '2', 'method' => 'takeaway']) }}">CENTRAL SUSHI Besancon</a>
        @endif
        @if(session('restaurent') != '3')
        <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '3', 'method' => 'takeaway']) }}">CENTRAL SUSHI Belfort</a>
        @endif
        
      </div>
    </div>
    @else
    <button type="button" class="btn goback p-0" data-bs-toggle="modal" data-bs-target="#exampleModaladdress">Changer</button>
    @endif
    <script>
      function hideme() {
        var x = document.getElementById('selectionres');
        x.classList.toggle('hideme');

      }
    </script>
  </div>
  <div class="col-md-9 p-lg-3 p-md-2">
    <div class="row">
      <div class="col-md-6">
        <h5 style="color: #E5D5BF; font-size: 24px;">@if(session('method', 'default') == 'delivery') {{session('address')}} @else A RECUPERER AU RESTAURANT @endif</h5>
        <h6>@if(session('method', 'default') == 'delivery') <a class="btn sushibtn2 p-0" role="button" href="{{ route('store-in-session', ['restaurent' => '1', 'method' => 'takeaway']) }}"> Choisir de récupérer au restaurant</a> @else <button type="button" class="btn goback p-0" data-bs-toggle="modal" data-bs-target="#exampleModaladdress">Choisir en livraison</button> @endif</h6>
      </div>
      <div class="col-md-6" style="border-left: 1px dotted var(--primary-color); border-right: 1px dotted var(--primary-color);">
        <h6>Délai en cours: <span style="color: var(--sec-color); font-size: 24px;">@if(session('method', 'default') == 'delivery') 30 à 45 minutes @else 15 à 20 minutes @endif</span></h6>
        <h6><button type="button" class="btn goback p-0" data-bs-toggle="modal" data-bs-target="#exampleModaltimeslot">@if(session('timeslot')) Créneau: {{ session('timeslot') }} @else Choisir un créneau @endif</button></h6>
      </div>

    </div>
  </div>
</div>
<div id="menu-head2" class="row pmclr m-0 p-0">
  <div class="col-12 p-2 d-flex align-items-center justify-content-between" style="background-color: #000; border-bottom: 1px dotted var(--primary-color);">
    <h4 style="font-size: 14px; margin:0; padding:0;">
      @if(session('restaurent') == '1')
      CENTRAL SUSHI Dijon
      @elseif(session('restaurent') == '2')
      CENTRAL SUSHI Besancon
      @elseif(session('restaurent') == '3')
      CENTRAL SUSHI Belfort
      @else
      Choisir un restaurant
      @endif
    </h4>
    @if(session('method') == 'takeaway')
    <h5><button type="button" class="btn goback p-0" style="padding-right: 10px!important;"onclick=hideme()>+ Modifier</button></h5>
    <div class="row hideme" id="selectionres">
      <div class="col-12"">
        
        @if(session('restaurent') != '1')
        <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '1', 'method' => 'takeaway']) }}">CENTRAL SUSHI Dijon</a>
        @endif
        @if(session('restaurent') != '2')
        <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '2', 'method' => 'takeaway']) }}">CENTRAL SUSHI Besancon</a>
        @endif
        @if(session('restaurent') != '3')
        <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '3', 'method' => 'takeaway']) }}">CENTRAL SUSHI Belfort</a>
        @endif
        
      </div>
    </div>
    @else
    <button type="button" class="btn goback p-0" style="margin-right: 5px;"data-bs-toggle="modal" data-bs-target="#exampleModaladdress">Changer</button>
    @endif
    <script>
      function hideme() {
        var x = document.getElementById('selectionres');
        x.classList.toggle('hideme');

      }
    </script>
  </div>
  <div class="col-12 p-lg-3 p-md-2" style="background-color: #000;">
    <div class="row">
      <div class="col-6 p-2">
        <h5 style="color: #E5D5BF; font-size: 14px;">@if(session('method', 'default') == 'delivery') {{session('address')}} @else A RECUPERER AU RESTAURANT @endif</h5>
        <h6>@if(session('method', 'default') == 'delivery') <a class="btn sushibtn2 p-0" style="font-size: 10px!important;" role="button" href="{{ route('store-in-session', ['restaurent' => '1', 'method' => 'takeaway']) }}"> Choisir de récupérer au restaurant</a> @else <button type="button" class="btn goback p-0" data-bs-toggle="modal" data-bs-target="#exampleModaladdress">Choisir en livraison</button> @endif</h6>
      </div>
      <div class="col-6 p-2" style="border-left: 1px dotted var(--primary-color); border-right: 1px dotted var(--primary-color);">
        <h6 style="font-size: 14px;">Délai en cours: <br><span style="color: var(--sec-color); font-size: 14px;">@if(session('method', 'default') == 'delivery') 30 à 45 minutes @else 15 à 20 minutes @endif</span></h6>
        <h6><button type="button" class="btn goback p-0" style="font-size: 10px!important;" data-bs-toggle="modal" data-bs-target="#exampleModaltimeslot">@if(session('timeslot')) Créneau: {{ session('timeslot') }} @else Choisir un créneau @endif</button></h6>
      </div>

    </div>
  </div>
</div>
<div class="row pmclr">
  <div id="menu-side" class="col-md-3">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        @foreach($categories as $category)
        <h2 class="accordion-header" id="heading{{ $category->cat_id }}">

          <button class="accordion-button acdbtn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->cat_id }}" aria-expanded="false" aria-controls="collapse{{ $category->cat_id }}">
            <a href="#mcats_{{ $category->cat_id }}">
              {{ $category->cat_name }}
            </a>
          </button>

        </h2>
        <div id="collapse{{ $category->cat_id }}" class="accordion-collapse collapsed collapse" aria-labelledby="heading{{ $category->cat_id }}" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            @foreach($category->subcategories as $subcategory)
            <div class="accd">
              <a href="#cats_{{ $subcategory->subcat_id }}">{{ $subcategory->subcat_name }}</a></div>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div id="menu-side2" class="col-md-3">
  @foreach($categories as $category)
    @foreach($category->subcategories as $subcategory)
      <div class="accd-mob" style="display: flex; gap: 10px;">
        <a href="#cats_{{ $subcategory->subcat_id }}">{{ $subcategory->subcat_name }}</a>
      </div>
    @endforeach
  @endforeach
</div>
  <style>
    .underlines {
      text-decoration: underline!important;
    }
    .underlines-mob {
      text-decoration: underline!important;
      color: var(--sec-color);
    }
  </style>
  <!-- Modal for timeslot -->
  <!-- Modal for timeslot -->
<div class="modal fade" id="exampleModaltimeslot" tabindex="-1" aria-labelledby="exampleModaltimeslot" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choisir un créneau</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if (count($timeSlots['noon']) > 0)
                        <h6 class="text-center">MIDI</h6>
                        @foreach ($timeSlots['noon'] as $slot)
                            @php
                                $startDateTime = \Carbon\Carbon::parse($currentDateTime->toDateString() . ' ' . explode(' - ', $slot)[0]);
                            @endphp
                            @if ($currentDateTime->lt($startDateTime) && $startDateTime->diffInMinutes($currentDateTime) > 30 && $startDateTime->isSameDay($currentDateTime))
                                <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['timeslot' => $slot]) }}">{{ $slot }}</a>
                            @endif
                        @endforeach
                    @else
                        <p>Aucun créneau de midi disponible</p>
                    @endif

                    @if (count($timeSlots['evening']) > 0)
                        <h6 class="text-center">SOIR</h6>
                        @foreach ($timeSlots['evening'] as $slot)
                            @php
                                $startDateTime = \Carbon\Carbon::parse($currentDateTime->toDateString() . ' ' . explode(' - ', $slot)[0]);
                            @endphp
                            @if ($currentDateTime->lt($startDateTime) && $startDateTime->diffInMinutes($currentDateTime) > 30 && $startDateTime->isSameDay($currentDateTime))
                                <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['timeslot' => $slot]) }}">{{ $slot }}</a>
                            @endif
                        @endforeach
                    @else
                        <p>Aucun créneau de soirée disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModaladdress" tabindex="-1" aria-labelledby="exampleModaladdress" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Entrez votre adresse de livraison</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <script>
  document.addEventListener('DOMContentLoaded', function () {
    const urlHash = window.location.hash.substring(1);
    const accordionButtons = document.querySelectorAll('.accordion-button a');

    accordionButtons.forEach(button => {
      const buttonHash = button.getAttribute('href').substring(1);

      if (buttonHash === urlHash) {
        button.classList.add('underlines');
        const accordionCollapse = button.closest('.accordion-item').querySelector('.accordion-collapse');
        accordionCollapse.classList.remove('collapse');
        accordionCollapse.classList.add('show');
      }
    });

    // JavaScript to handle smooth scrolling with margin and underline
    document.querySelectorAll('.accd a').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();

        // Remove underline from all links
        document.querySelectorAll('.accd a').forEach(link => {
          link.classList.remove('underlines');
        });

        // Add underline to the clicked link
        this.classList.add('underlines');

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          const offset = 250; // Adjust the offset to match the header height
          const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - offset;

          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
        }
      });
    });

    // JavaScript to handle smooth scrolling and auto underline
    const menuSide2 = document.getElementById('menu-side2');
    const links = document.querySelectorAll('.accd-mob a');

    links.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelectorAll('.accd-mob a').forEach(link => {
          link.classList.remove('underlines-mob');
        });

        this.classList.add('underlines-mob');

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          const offset = 50;
          const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - offset;

          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
        }
      });
    });

    window.addEventListener('scroll', function () {
      const menuSide2Top = menuSide2.getBoundingClientRect().top;
      const menuSide2Height = menuSide2.clientHeight;

      if (menuSide2Top <= 50) {
        menuSide2.style.position = 'fixed';
        menuSide2.style.top = '50px';
      } else {
        menuSide2.style.position = 'static';
      }

      links.forEach(link => {
        const targetId = link.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          const rect = targetElement.getBoundingClientRect();
          const offset = 50;

          if (rect.top <= offset && rect.bottom >= offset) {
            link.classList.add('underlines-mob');
          } else {
            link.classList.remove('underlines-mob');
          }
        }
      });
    });

    // Auto-scroll menu-side2 with the content
    document.addEventListener('scroll', function () {
      let visibleId = null;

      // Iterate over sections and find the one currently in view
      links.forEach(link => {
        const targetId = link.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          const rect = targetElement.getBoundingClientRect();
          const offset = 50;

          if (rect.top <= offset && rect.bottom >= offset) {
            visibleId = targetId;
          }
        }
      });

      // Scroll menu-side2 to the currently visible section
      const visibleLink = document.querySelector(`.accd-mob a[href="#${visibleId}"]`);
      if (visibleLink) {
        menuSide2.scrollLeft = visibleLink.offsetLeft;
      }
    });
  });
</script>



        <div class="modal-body">
        <h5 class="pmclr p-2">LIVRAISON</h5>
        <div class="input-container" style="display: flex; align-items: center; height: 53px; overflow: hidden;">
          <input type="text" id="map-address-input" placeholder="Entrez votre adresse de livraison…">
          <button id="checkDZ" style="background-color: var(--sec-color); border: none; margin-left: 5px; height: 53px; margin: 0;" class="p-2">Entrer</button>
          <button onclick="getCurrentLocation()" style="background-color: transparent; border: none; color: var(--sec-color); position: absolute; top: 0; right: 60px; font-size: 24px;    margin-top: 0px!important;    padding-top: 0;" class="mt-2 p-2">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1.5em" viewBox="0 0 50.000000 50.000000" preserveAspectRatio="xMidYMid meet">
              <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="var(--primary-color)" stroke="none">                
                <path d="M194 461 c-57 -26 -87 -72 -92 -141 -4 -51 0 -63 43 -145 100 -192 125 -199 203 -56 39 71 25 83 -16 15 -15 -26 -37 -59 -50 -73 l-22 -26 -25 30 c-47 56 -115 203 -115 247 0 167 236 193 279 30 14 -50 36 -58 26 -9 -15 68 -45 106 -108 132 -47 20 -73 19 -123 -4z" />
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
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn goback p-0">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModaltime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Changement d'adresse</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 p-2" style="border-bottom: 1px solid #00000050; border-top: 1px solid #00000050; ">
              <button id="takeawayBtn" class="btn sushibtn2" style="width: 100%; text-align: center;">Takeaway</button>
            </div>
            <div class="col-md-6 p-2" style="border-bottom: 1px solid #00000050; border-top: 1px solid #00000050; border-left: 1px solid #00000050;">
              <button id="deliveryBtn" class="btn sushibtn2" style="width: 100%; text-align: center;">Delivery</button>
            </div>
          </div>



          <div id="takeawayOptions" style="display: none;">
            <p class="select-box__input-text">Choisissez un restaurant</p>

            <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '1', 'method' => 'takeaway']) }}">CENTRAL SUSHI Dijon</a>
            <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '2', 'method' => 'takeaway']) }}">CENTRAL SUSHI Besancon</a>
            <a class="btn sushibtn2" role="button" href="{{ route('store-in-session', ['restaurent' => '3', 'method' => 'takeaway']) }}">CENTRAL SUSHI Belfort</a>
          </div>

          <div id="deliveryOptions" style="display: none;">

          </div>
        </div>

      </div>
    </div>
  </div>
  <script>
    document.getElementById('takeawayBtn').addEventListener('click', function() {
      document.getElementById('deliveryOptions').style.display = 'none';
      document.getElementById('takeawayOptions').style.display = 'block';
    });

    document.getElementById('deliveryBtn').addEventListener('click', function() {
      document.getElementById('takeawayOptions').style.display = 'none';
      document.getElementById('deliveryOptions').style.display = 'block';
    });
  </script>
  <div class="col-md-9 p-md-9 content-menu">
    @yield('menubody')
    @endsection

    @section('extra_scirpt')

@endsection