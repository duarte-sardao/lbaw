<div class="card col m-1 h-100">
  <div class="card-body d-flex flex-column justify-content-between">
    <a href = {{url('products/'.$product->id)}}>
      <img src = {{asset($product->image)}} width = "100%">
    </a>

    <div class="product-info d-flex flex-column">
      <strong>{{$product->name}}</strong>
      <small>{{$product->description}}</small>

      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mt-2 price">{{$product->price}}€</h3>
        
        <div class="d-flex justify-content-between align-items-center">
          {{-- Se o utilizador não estiver autenticado ou estiver mas n ser um admin (stock válido) --}}
          @if(Auth::guest() || (Auth::check() && Auth::id() >= 5 && $product->stock > 0))
            <form class = "m-1" method = "POST" action = {{url('/users/cart/'.$product->id)}}>
              @csrf
              @method('PUT')
    
              <button class="btn btn-outline-primary" type = "submit">
                <i class="fa fa-cart-plus"></i>
              </button>
            </form>
          @endif

          @if(Auth::guest() || (Auth::check() && Auth::id() >= 5))
            <form class = "m-1" method = "POST" action = {{url('/users/wishlist/'.$product->id)}}>
              @csrf
              @method('PUT')
    
              <button class="btn btn-outline-danger" type = "submit">
                <i class="fa fa-heart"></i>
              </button>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>          