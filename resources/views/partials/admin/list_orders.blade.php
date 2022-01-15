<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between">
    <h4>Orders</h4>
  </div>

  <div class="row">
    @foreach($entries as $entry)
      @include('partials.admin.order_entry', ['entry' => $entry])
    @endforeach  
  </div>
</div>