<div class="card w-25 h-25">
  <div class="card-body d-flex justify-content-between">
    <div class="d-flex flex-column">
      <h5 class="card-subtitle m-1 text-muted">Sub Total:</h5>
      <h5 class="card-subtitle m-1 text-muted">Taxes:</h5>
      <h5 class="card-title m-1">Grand Total:</h5>
    </div>
    <div class = "d-flex flex-column">
      @php($taxes = 0.00)
      <h5 class="card-subtitle m-1 text-muted">{{$total}}€</h5>
      <h5 class="card-subtitle m-1 text-muted">{{$taxes}}€</h5>
      <h5 class="card-title m-1">{{$total + $taxes}}€</h5>
    </div>
  </div>

  <div class="d-flex justify-content-around">
    <div class="btn btn-success m-2 w-50">
      <a href="{{route('checkout')}}">Checkout</a>
    </div>

    <div class="btn btn-outline-danger m-2 w-50">
      <a href="#">Empty Cart</a>
    </div>
  </div>
</div>