<header class="container-fluid mt-2">
  <div style="height: 100px; display: flex; justify-content: center; align-items: center;">
    <a class="justify-content-center" href="{{ url('/') }}">
      <img class="img-fluid logoimg" src="{{ asset('images/logoTOPS.png') }}">
    </a>
  </div>

  <style>
    body {
      margin: 0;
      padding: 0;

    }
    @keyframes fadeIn {
  0% {opacity: 0;}
  100% {opacity: 1;}
}
.fadeIn-anim {
  animation-name: fadeIn;
  animation-duration: 1s;
}
    .topbg {
      background: url(/images/bgindex2.webp);
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      width: 100%!important;
    }

    .botbg {
      background: url(/images/homepage_down.webp);
      background-position: center center;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .bgprod {
      position: relative;
      background-image: url(/images/fond_bg1.webp);
      background-size: cover;
      background-position: center;
      min-height: 200px;
    }

    .bg-div2 {
      background: rgb(255, 136, 62);
      background: linear-gradient(63deg, rgba(255, 136, 62, 1) 0%, rgba(169, 90, 41, 1) 3%, rgba(133, 71, 32, 1) 5%, rgba(96, 51, 23, 1) 11%, rgba(41, 22, 10, 1) 17%, rgba(0, 0, 0, 1) 23%, rgba(20, 5, 3, 1) 64%, rgba(30, 8, 5, 1) 81%, rgba(50, 14, 8, 1) 85%, rgba(81, 22, 12, 1) 91%, rgba(128, 34, 19, 1) 96%, rgba(186, 50, 28, 1) 100%);
      transition: background 0.5s ease;
    }

    .select-box__input-text {
      background-color: transparent;
    }

    .select-box {
      font-family: "Nexa Text W05 Extra Light";
    }

    .sushibtn {
      position: relative;
      color: var(--primary-color);
      background-color: transparent;
      border: 1px solid var(--primary-color);
      padding: 10px 20px 10px 20px;
      font-size: 18px;
      overflow: hidden;
    }

    .sushibtn::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background-color: var(--sec-color);
      transition: left 0.5s ease;
      z-index: -1;
    }
    .sushibtn:hover {

    font-size: 18px;
}

    .sushibtn:hover {
      color: #000;
    }

    .sushibtn:hover::before {
      left: 0;
    }
    .menu li a {
      color: #e5d5bf;
    }
    .hidden {
      max-height: 180px!important;
    }
    .bar {
      background-color:  #e5d5bf;
    }
  </style>
  <div class="navbar" id="navbar">
    <div class="hamburger" id="hamburger" onclick="toggleMenu()">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <div class="">
      <a href="{{ route('account') }}" class="myicon">
        <!-- SVG code -->
        <style>
          svg {
            fill: var(--primary-color)
          }

          .cart-bubble {
            position: absolute;
            top: -3px;
            right: 13px;
            padding: 3px 6px;
            border-radius: 50%;
            background-color: red;
            color: white;
            font-size: 12px;
          }
        </style>
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 50.000000 50.000000" preserveAspectRatio="xMidYMid meet">
          <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="var(--primary-color)" stroke="none">
            <path d="M155 456 c-60 -28 -87 -56 -114 -116 -36 -79 -19 -183 42 -249 33 -36 115 -71 167 -71 52 0 134 35 167 71 34 37 63 110 63 159 0 52 -35 134 -71 167 -37 34 -110 63 -159 63 -27 0 -65 -10 -95 -24z m173 -12 c174 -72 174 -316 0 -388 -133 -56 -287 47 -288 192 -1 147 154 253 288 196z" />
            <path d="M202 393 c-30 -26 -36 -63 -14 -98 l18 -29 -41 -21 c-36 -18 -40 -24 -43 -62 l-3 -43 131 0 131 0 -3 43 c-3 38 -7 44 -43 62 l-41 21 18 29 c32 52 -2 115 -62 115 -15 0 -37 -8 -48 -17z m95 -29 c15 -24 15 -29 2 -53 -11 -20 -22 -26 -49 -26 -27 0 -38 6 -49 26 -13 24 -13 29 2 53 12 18 26 26 47 26 21 0 35 -8 47 -26z m16 -125 c40 -11 65 -45 54 -73 -5 -13 -26 -16 -117 -16 l-111 0 3 38 c3 32 7 38 38 49 44 15 85 16 133 2z" />
          </g>
        </svg>
      </a>
      <a href="{{ route('cart') }}" class="myicon">
        <!-- SVG code -->
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 50.000000 50.000000" preserveAspectRatio="xMidYMid meet">
          <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="var(--primary-color)" stroke="none">
            <path d="M201 455 c-16 -14 -35 -41 -41 -60 -10 -29 -16 -35 -39 -35 -27 0 -29 -3 -34 -52 -4 -29 -9 -101 -13 -160 l-7 -108 187 0 c185 0 186 0 186 22 0 12 -5 84 -12 160 l-11 138 -29 0 c-24 0 -31 6 -44 40 -19 46 -56 80 -90 80 -12 0 -36 -11 -53 -25z m87 -1 c22 -15 52 -63 52 -84 0 -6 -32 -10 -85 -10 -94 0 -100 6 -68 60 27 47 65 59 101 34z m-142 -139 c-4 -22 -3 -35 4 -35 5 0 10 16 10 35 l0 36 93 -3 92 -3 -2 -33 c-1 -21 3 -32 10 -29 7 2 11 18 9 35 -3 28 -1 32 21 32 24 0 24 -2 31 -107 4 -60 9 -127 12 -151 l6 -42 -177 0 -178 0 6 63 c4 34 9 101 13 150 7 84 8 87 31 87 23 0 25 -3 19 -35z" />
          </g>
        </svg>
        @if(session()->has('cart.products') && count(session()->get('cart.products')) != 0)
        <span class="cart-bubble">
          {{ count(session()->get('cart.products')) }}
        </span>
        @endif
      </a>
    </div>
    <ul class="menu" id="menu">
      <li><a href="{{ route('nos-restaurants') }}">Nos Restaurants</a></li>
      <li><a href="{{ asset('menu-belfort.pdf') }}" target="_blank">La carte</a></li>
      <!-- <li><a href="{{ route('loyaute') }}">Fidélité</a></li> -->
      <li><a href="{{ route('recrutment') }}">Recrutement</a></li>
      <li><a href="{{ route('sushi-experience') }}"><img src="{{ asset('images/logoCS.png') }}" class="img-fluid w-100"></a></li>
    </ul>
  </div>
</header>
<section id="content" class="container-fluid" style="padding:0; margin: 0; margin-top: 60px; margin-bottom: 60px; min-height: 800px;">
