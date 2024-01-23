@extends('menu.sidemenu')

@section('menubody')

<div class="row justify-content-center text-center" data-aos="bounce-in" data-aos-duration="1000">
<div class="col-md-10 pmclr"><h2>
{{ $category->cat_name }}
</h2>
<p>
{{ $category->cat_desc }}
</p>
<div class="row justify-content-center text-center pmclr">
    
    
        @foreach($subcategories as $subcategory)
        <div style="min-height: 200px;" class="col-3 opbg d-flex justify-content-center align-items-center fadeIn-anim" data-aos="bounce-in" data-aos-duration="1000">
<a style="height: 100%; width: 100%;" href="{{ route('menu.products', ['category' => $category->cat_id, 'subcategory' => $subcategory->subcat_id]) }}" class="pmclr">
<div class="borderprodcat p-2" style="height: 100%;"><div class="prodcat" style="background-image: url('/images/{{ $subcategory->subcat_name }}.png');">
<div class="prodcatop"><h4>
{{ $subcategory->subcat_name }}
</h4></div></div></div></a></div>
        @endforeach
        </div></div></div></div></div>
@endsection

