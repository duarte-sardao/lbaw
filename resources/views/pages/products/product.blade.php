@extends('layouts.app')

@section('content')
  <div class = "container mt-5" id="homeProductGrid">
    <div class="row d-flex m-1">
      <div class="card col m-1">
        <div class="card-body d-flex flex-column justify-content-between">
          <a href = "#">
            <img src = {{asset($product->image)}} width = "100%">
          </a>
          <a> 
            *{{$product->rating}} 
          </a>
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
        <button type="button">Details</button>
        <button type="button">Reviews</button>
      </div>

      <div class="product-info d-flex flex-column">
        <p>blah blah details reviews</p>
      </div>
    </div>
  </div> 
@endsection