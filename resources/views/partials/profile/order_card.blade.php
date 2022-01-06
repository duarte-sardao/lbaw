<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <span><strong>Order number: </strong>{{$entry['order']->id}}</span>
      <span>{{$entry['order']->orderdate}}</span>
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
      <span>{{$entry['address']->zipcode}}</span>
    </div>

    <div class="d-flex justify-content-end mt-1 align-items-center">
      @if($entry['order']->orderstatus == 'Processing')
      <span class = "text-secondary">
        <i class="fa fa-ellipsis-h"></i>

      @elseif($entry['order']->orderstatus == 'Packed')
      <span class = "text-primary">
        <i class="fa fa-gift"></i>

      @elseif($entry['order']->orderstatus == 'Shipped')
      <span class = "text-info">
        <i class="fa fa-truck"></i>

      @else
      <span class = "text-success">
        <i class="fa fa-check"></i>

      @endif
        {{$entry['order']->orderstatus}}
      <span>
    </div>
  </div>
</div>