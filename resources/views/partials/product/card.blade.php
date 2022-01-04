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