<div class="card m4-2 mb-4">
  <div class="card-body">
    <div class="d-flex">
      <h6>
        <strong>Order #{{$entry->id}}</strong>
      </h6> 
    </div>

    <div class="d-flex flex-column mt-2">
      <span>
        {{
          $entry->streetname.' '
          .$entry->streetnumber.' '
          .$entry->aptnumber.' '
          .$entry->floor
        }}
      </span>

      <span>
        {{$entry->zipcode}}
      </span>
    </div>

    <div class="d-flex justify-content-between mt-1 align-items-center">
      @if($entry->orderstatus == 'Processing')
        <span class = "text-secondary">
          <i class="fa fa-ellipsis-h"></i>
      
      @elseif($entry->orderstatus == 'Accepted')
        <span class = "text-teal-500">
          <i class="fa fa-check"></i>

      @elseif($entry->orderstatus == 'Packed')
        <span class = "text-orange-500">
          <i class="fa fa-gift"></i>  

      @elseif($entry->orderstatus == 'Shipped')
        <span class = "text-info">
          <i class="fa fa-ship"></i>  
      
      @elseif($entry->orderstatus == 'Cancelled by Store')
        <span class = "text-red-500">
          <i class="fa fa-ban"></i> 
      
      @elseif($entry->orderstatus == 'Cancelled by Customer')
        <span class = "text-red-500">
          <i class="fa fa-ban"></i>
          
      @else
        <span class = "text-teal-500">
          <i class="fa fa-truck"></i>    

      @endif
      {{$entry->orderstatus}}
      </span>
    </div>
  </div>
</div>