<div class="card mt-2 mb-2">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <h6>
        <strong>Order number {{$entry['order']->id}}</strong>
      </h6> 

      <span>
        {{$entry['order']->orderdate}} -> {{$entry['order']->orderdate}}
      </span>
    </div>

    <div class="d-flex flex-column mt-2">
      <span>
        {{
          $entry['address']->streetname.' '
          .$entry['address']->streetnumber.' '
          .$entry['address']->aptnumber.' '
          .$entry['address']->floor
        }}
      </span>

      <span>
        {{$entry['address']->zipcode}}
      </span>
    </div>
    
    <div class="d-flex flex-column mt-2">
      <h6>
        <strong>Items</strong>
      </h6> 

      <ul>
        @foreach($entry['products'] as $product)
          <li>
            <a class = "text-dark" href={{url('products/'.$product->id)}}>
              {{$product->name}} - <strong class = "text-primary">{{$product->price}}€</strong>
            </a>
          </li>
        @endforeach
      </ul>
      
    </div>

    <div class="d-flex justify-content-between mt-1 align-items-center">
      <h5 class = "price">{{$entry['total']}}€</h5>

      @if($entry['order']->orderstatus == 'Processing')
        <span class = "text-secondary">
          <i class="fa fa-ellipsis-h"></i>

      @elseif($entry['order']->orderstatus == 'Packed')
        <span class = "text-orange-500">
          <i class="fa fa-gift"></i>  

      @elseif($entry['order']->orderstatus == 'Shipped')
        <span class = "text-info">
          <i class="fa fa-truck"></i>  

      @else
        <span class = "text-teal-500">
          <i class="fa fa-check"></i>  

      @endif
      {{$entry['order']->orderstatus}}
      </span>
    </div>
  </div>
</div>