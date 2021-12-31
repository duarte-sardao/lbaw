@extends('layouts.app')

@section('content')
  <section class = "d-flex flex-column" id="content">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('images/img1.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/img2.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/img3.jpg')}}" class="d-block w-100" alt="...">
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
          <div class="card col m-1">
            <div class="card-body d-flex flex-column justify-content-between">
              <a href = "#">
                <img src = {{asset($product->image)}} width = "100%">
              </a>

              <div class="product-info d-flex flex-column">
                <strong>{{$product->name}}</strong>
                <small>{{$product->description}}</small>

                <h3 class="mt-2 price">{{$product->price}}€</h3>
              </div>

            </div>
          </div>
        @endforeach
      </div>  

      <div class="row mt-5">
        <h5>Products you might like:</h5>
      </div>
  
      <div class="row d-flex m-1">
        @foreach($productsList1 as $product)
          <div class="card col m-1">
            <div class="card-body d-flex flex-column align-items-center justify-content-around">
              <a href = "#">
                <img src = {{asset($product->image)}} width = "100%">
              </a>

              <strong>{{$product->name}}</strong>

            </div>
          </div>
        @endforeach
      </div>  
    </div>
            
    
  </section>
@endsection