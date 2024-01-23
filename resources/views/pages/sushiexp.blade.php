@extends('app')

@section('content')
<style>
  .img-colam {
    height: 350px; padding: 0; margin: 0;
  }
  .h-350 {
    height: 350px;
  }
  @media screen and (max-width: 768px) {
    .img-colam {
      height: 200px; padding: 0; margin: 0;
    }
    .h-350 {
      height: 200px;
    }
  }
  </style>
<div class="row">
    <div class="col-12 text-center p-5 pmclr">
        <h2><img src="images/explogo1.png" class="" style="width: 350px;"></h2>
    </div>
</div>

<div class="container mt-5 h-350">
  <div class="row h-350" style="position: relative;">
    <div class="col-3 img-colam">
      <img src="images/collage3.png" class="w-100 h-100" alt="Collage 3">
    </div>
    <div class="col-3 img-colam">
          <img src="images/collage5.png" class="w-100 h-100" alt="Collage 5">    
    </div>
    <div class="col-3 img-colam">
    <img src="images/collage3.png" class="w-100 h-100" alt="Collage 3">
    </div>
    <div class="col-3 img-colam">
          <img src="images/collage5.png" class="w-100 h-100" alt="Collage 5">    
    </div>
    <div style="position: absolute; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); color: var(--primary-color);">
<div class="row justify-content-center align-items-center h-100 text-center">
    <div class="col-md-8">
        <h4>Des surprises vous attendent</h4>
    </div>
</div>
</div>
  </div>

</div>

</section>

@endsection