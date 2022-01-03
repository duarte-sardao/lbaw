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
      
      <div class="row d-flex m-1">
          <div class="card col m-1">
            <div class="card-body d-flex flex-column justify-content-between">
				<div class="card-body d-flex flex-column justify-content-between">
				  <a href = "#">
					<img src = {{asset($product->image)}} width = "100%">
				  </a>
				  <a> *{{$product->rating}} </a>
				</div>

              <div class="product-info d-flex flex-column">
                <strong>{{$product->name}}</strong>
                <small>{{$product->description}}</small>
				<div class="d-flex flex-row">
					<h3 class="mt-2 price">Price: {{$product->price}}€</h3>
					<a> Stock: {{$product->stock}}</a>
					<button type="button">Add To Wishlist</button>
					<button type="button">Add to Cart</button>
				</div>
              </div>

            </div>
          </div>
		  
		  <div class="card col m-1">
            <div class="card-body d-flex flex-column justify-content-between">
				<div class="card-body d-flex flex-column justify-content-between">
					<button type="button">Details</button>
					<button type="button">Reviews</button>
				</div>

              <div class="product-info d-flex flex-column">
				<p> blah blah details reviews</p>
              </div>

            </div>
          </div>
      </div>  

  </section>
@endsection