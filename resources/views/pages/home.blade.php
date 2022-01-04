@extends('layouts.app')

@section('content')
  <section class = "d-flex flex-column" id="content">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('images/img1.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/img1.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/img1.jpg')}}" class="d-block w-100" alt="...">
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class = "container mt-5" id="homeProductGrid">
      <div class="row">
        <h5>Most ordered products:</h5>
      </div>
      
      <div class="row d-flex m-1">
        @foreach($productsList1 as $product)
          @include('partials.product.card', ['product' => $product])
        @endforeach
      </div>  

      <div class="row mt-5">
        <h5>Products you might like:</h5>
      </div>
  
      <div class="row d-flex m-1">
        @foreach($productsList2 as $product)
          @include('partials.product.card', ['product' => $product])
        @endforeach
      </div>  
  </section>
@endsection