@extends('layouts.app')

@section('content')
  <section class = "d-flex flex-column">
    @include('partials.home.slider')

    <div class = "card-deck container mt-5" id="homeProductGrid">
      <div class="row">
        <h5>Most ordered products:</h5>
      </div>
      
      <div class="row d-flex m-1">
        @foreach($productsList1 as $product)
          <div class="col-md">
            @include('partials.product.card', ['product' => $product])
          </div>
        @endforeach
      </div>  

      <div class="row mt-5">
        <h5>Products you might like:</h5>
      </div>
  
      <div class="row d-flex m-1 mb-5">
        @foreach($productsList2 as $product)
          <div class="col-md">
            @include('partials.product.card', ['product' => $product])
          </div>
        @endforeach
      </div>  
  </section>
@endsection