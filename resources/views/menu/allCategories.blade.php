@extends('menu.sidemenu')

@section('menubody')
<div class="row justify-content-center text-center">
    <div class="col-md-12 pmclr">
        @foreach($categories as $category)
        <div id="mcats_{{ $category->cat_id }}" class="row justify-content-center text-center">
            <div class="col-md-12 pmclr mt-5">
                <h2>{{ $category->cat_name }}</h2>
                <p>{{ $category->cat_desc }}</p>
                <div class="row justify-content-center text-center pmclr">
                    @foreach($category->subcategories as $subcategory)
                    <div id="cats_{{ $subcategory->subcat_id }}" class="col-12">
                        <div class="row">
                            <div class="col-12 mt-5" data-aos="fade-up" data-aos-duration="1000">
                                <h2>{{$subcategory->subcat_name}}</h2>
                                @if($subcategory->subcat_name == 'SASHIMIS')
                                <p class="pb-3">Tranches de poisson frais</p>
                                @endif
                                @if($subcategory->subcat_name == 'YAKITORI')
                                <p class="pb-3">Duo de brochettes</p>
                                @endif
                                @if($subcategory->subcat_name == 'SUSHI')
                                <p class="pb-3">riz vinaigré recouvert d’une tranche de poisson frais, à l’unité</p>
                                @endif
                                @if($subcategory->subcat_name == 'MAKI')
                                <p class="pb-3">roll riz vinaigré enrobé d’une feuille de nori, 6 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'ROQUET ROLL')
                                <p class="pb-3">roll garni de roquette enrobé de saumon cru, 6 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'CALI\' FRAÎCHEUR')
                                <p class="pb-3">roll feuille de nori, riz vinaigré enrobé de ciboulette et coriandre, 8 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'CHIRASHI')
                                <p class="pb-3">Bol de riz vinaigré garni de tranches de poisson frais</p>
                                @endif
                                @if($subcategory->subcat_name == 'BOWLS')
                                <p class="pb-3">Bol de riz vinaigré ou salade accompagné de crudités et poisson frais</p>
                                @endif
                                @if($subcategory->subcat_name == 'PAUSE DEJ')
                                <p class="pb-3">Accompagné de salade de chou, bol de riz nature ou soupe miso</p>
                                @endif
                                @if($subcategory->subcat_name == 'CALIFORNIA')
                                <p class="pb-3">roll feuille de nori et riz vinaigré parsemé de graines de sésame, 6 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'SAUM ROLL')
                                <p class="pb-3">roll riz vinaigré enrobé de saumon cru, 6 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'MAKI NU')
                                <p class="pb-3">roll riz vinaigré seul, 6 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'MAKI LIGHT')
                                <p class="pb-3">roll riz vinaigré enrobé d’une feuille de salade, 6 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'ONION ROLL')
                                <p class="pb-3">roll feuille de nori et riz vinaigré enrobé d’oignons frits, 8 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'GO MAKI')
                                <p class="pb-3">roll riz vinaigré enrobé d’une omelette fine, 6 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'FREEZ')
                                <p class="pb-3">roll feuille de nori et riz vinaigré enrobé d’une panure panko, 8 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'SUPRÊME AVOCAT')
                                <p class="pb-3">roll feuille de nori et riz vinaigré recouvert de tranches d’avocat, 8 pièces</p>
                                @endif
                                @if($subcategory->subcat_name == 'MAKI SUCRÉ')
                                <p class="pb-3">roll riz vinaigré enrobé d’une omelette fine, 6 pièces</p>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center text-center pmclr">

                            @foreach($subcategory->products as $product)
                            <div class="col-md-3 col-sm-6 product-container-col">
                                <div class="m-1 d-flex align-items-center">
                                    <a href="{{ route('menu.productDetails', ['category' => $category->cat_id, 'subcategory' => $subcategory->subcat_id, 'product' => $product->prod_id]) }}">
                                        <div class="product-container fadeIn-anim" data-aos="fade-up" data-aos-duration="1000">
                                            <img class="w-100 pad-img" src="/images/{{ $product->imgsrc }}">
                                            <p class="secclr">{{ $product->prod_name }}</p>
                                            <p class="pclr pclr1" style="font-size: 14px;">{{ $product->price }}€</p>
                                            @if($product->options->count())
                            <a href="{{ route('menu.productDetails', ['category' => $category->cat_id, 'subcategory' => $subcategory->subcat_id, 'product' => $product->prod_id]) }}" class="read-more-button" role="button">Possibilités</a>
                            @else
                            <a href="{{ route('add-to-cart', ['prod_id' => $product->prod_id]) }}" class="read-more-button" role="button">AJOUTER</a>
                            @endif                                            <!-- <a href="route('addtoCart', ['product' => product->prod_id]) class="read-more-button" role="button">AJOUTER</a> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
</div>
@endsection