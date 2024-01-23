@extends('app')

@section('content')

<style>
.bgwhite {
    background: url('images/whitebg.jpg');
}
.card1 {
    height: 300px;
    perspective: 1000px; /* Perspective for the 3D effect */
}

.front, .back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden; /* Hide the back face of the card initially */
    transition: transform 0.6s;
}

.front {
    
    color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
}

.back {
    
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    transform: rotateY(180deg); /* Flipped to the back initially */
}

.card1:hover .front {
    transform: rotateY(180deg); /* Flip to the back on hover */
}

.card1:hover .back {
    transform: rotateY(0deg); /* Flip to the front on hover */
}
.card1w {
    height: 300px;
}
@media (max-width: 778px) {
    .card1w {
        height: auto;
    }
}
iframe {
    
}
.shadow-white {
    box-shadow: 0 .25rem .25rem #fff!important;
}
td {
    padding: 5px;
}
</style>

    <div class="row">
        <div class="col-md-12 p-3 text-center pmclr">
        <h1>RESTAURANTS</h1>
        </div>
    </div>
    <div class="row pmclr">
        <div class="col-md-6">
            <h3 class="text-center p-2 p-md-5">Liste</h3>
            <div id="card-list1" class="card-list hidden opbg mb-5">
                <div class="card-header">
                    <h3>Central Sushi Dijon</h3>
                    <p class="mb-3">25 Place Darcy <br>21000 DIJON</p>
                    <h4 class="mb-3">03 80 23 22 00</h4>
                    <div class="icons-list">
                        <span id="icon-btn1" class="icon-btn" onclick="toggleCard()">+</span>
                    </div>
                </div>
                <div id="card-list-content1" class="card-list-content mt-2">
                
                <p>Horaires d’ouverture<p>
                <table style="text-align: left;">
                                                <tr>
                                                    <td>Lundi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Mardi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Mercredi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Jeudi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Vendredi</td>
                                                    <td>18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Samedi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Dimanche</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                            </table>
                </div>
            </div>

            <div id="card-list2"class="card-list hidden opbg mb-5">
                <div class="card-header">
                    <h3>Central Sushi Besançon</h3>
                    <p class="mb-3">35 Avenue Carnot <br>25000 BESANCON</p>
                    <h4 class="mb-3">03 70 88 97 00</h4>
                    <div class="icons-list">
                        <span id="icon-btn2"class="icon-btn" onclick="toggleCard1()">+</span>
                    </div>
                </div>
                <div id="card-list-content-2"class="card-list-content mt-2">
                
                <p>Horaires d’ouverture<p>
                <table style="text-align: left;">
                                                <tr>
                                                    <td>Lundi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Mardi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Mercredi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Jeudi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Vendredi</td>
                                                    <td>18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Samedi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Dimanche</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                            </table>
                </div>
            </div>


            <div id="card-list3"class="card-list hidden opbg mb-5">
                <div class="card-header">
                    <h3>Central Sushi Belfort</h3>
                    <p class="mb-3">60 Faubourg de Montbéliard<br>90000 BELFORT</p>
                    <h4 class="mb-3">03 84 58 67 37</h4>
                    <div class="icons-list">
                        <span id="icon-btn3"class="icon-btn" onclick="toggleCard2()">+</span>
                    </div>
                </div>
                <div id="card-list-content3"class="card-list-content mt-2">
                
                <p>Horaires d’ouverture<p>
                <table style="text-align: left;">
                                                <tr>
                                                    <td>Lundi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Mardi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Mercredi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Jeudi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Vendredi</td>
                                                    <td>18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Samedi</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                                <tr>
                                                    <td>Dimanche</td>
                                                    <td>11h00 - 15h00 / 18h00 - 23h00</td>
                                                </tr> 
                                            </table>
                </div>
            </div>


        </div>
        <div class="col-md-6">
            <h3 class="text-center p-2 p-md-5">Carte</h3>
            <div style="height: 100%; overflow: hidden;">
            <div id="map-nos"></div>
            </div>
            

        </div>
    </div>
    
</section>

@endsection

@section('extra_scirpt')
<script>
    function initMapNOS() {
        const locations = [
            { lat: 47.323430, lng: 5.031508 }, // New York City
            { lat: 47.245721, lng: 6.028465 }, // Los Angeles
            { lat: 47.631816, lng: 6.856420 }    // London
        ];

        const map = new google.maps.Map(document.getElementById('map-nos'), {
            zoom: 7,
            center: locations[0]
        });

        locations.forEach((location) => {
            new google.maps.Marker({
                position: location,
                map: map
            });
        });
    }
    
    initMapNOS();
</script>
@endsection