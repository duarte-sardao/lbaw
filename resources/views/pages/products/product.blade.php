@extends('layouts.app')

@section('content')

  <!-- Breadcrumbs -->
  <nav class = "m-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('allProducts')}}">Products</a></li>
      <li class="breadcrumb-item" aria-current="page">{{$product->name}}</li>
    </ol>
  </nav>

  <div class = "container-fluid mt-2">
    <div class="row m-5 mt-1">
      <div class="card col-md m-1">
        <div class="card-body d-flex justify-content-center">
          <img src = {{asset($product->image)}} width = "70%">
        </div>
      </div>

      <div class="col-md product-info d-flex flex-column">
        <h4>{{$product->name}}</h4>
        <span class = "mt-2 mb-2">{{$product->description}}</span>
        
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mt-2 price">{{$product->price}}€</h3>

          @if($product->stock > 0)
            <h4 class = "text-success mb-0">
              <i class = "fa fa-check"></i> In Stock
            </h4>
          @else
            <h4 class = "text-danger mb-0">
              <i class = "fa fa-times"></i> Out of Stock
            </h4>
          @endif

          <div class="w-50 d-flex justify-content-between">
            <form class = "m-1" method = "POST" action = {{url('/users/wishlist/'.$product->id)}}>
              @csrf
              @method('PUT')
    
              <button class="btn btn-outline-danger" type = "submit">
                <i class="fa fa-heart"></i>
                <span>Add to Wishlist</span>
              </button>
            </form>
            <form class = "m-1" method = "POST" action = {{url('/users/cart/'.$product->id)}}>
              @csrf
              @method('PUT')
    
              <button class="btn btn-outline-primary" type = "submit">
                <i class="fa fa-cart-plus"></i>
                <span>Add to Cart</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row m-5">
      <h4>Details</h4>
      <hr>
    </div>

    <div class="row m-5">
      <h4>Reviews</h4>
      <hr>

      <form class = "card border-primary mt-4" method = "POST" action = "">
        <h4 class="card-title  m-2">
          Write your review!
        </h4>
        <div class="form-group m-2">
          <label class = "" for="rating"><strong>Rating</strong></label>
          <select class="form-control" id="rating">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>

        <div class="form-group m-2">
          <label class = "" for="coment"><strong>Your review</strong></label>
          <textarea class="form-control" id="coment" rows="3"></textarea>
        </div>

        <div class="form-group m-2">
          <button class="btn btn-outline-success" type = "submit">Submit</button>
        </div>
      </form>

      @foreach($product->reviews as $review)
        @include('partials.product.review')
      @endforeach
    </div>
  </div> 
@endsection