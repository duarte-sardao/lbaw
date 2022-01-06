<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between">
    <h4>Your orders</h4>
  </div>

  <div class="row m-3">
    @foreach($entries as $entry)
      @include('partials.profile.order_card', ['entry' => $entry])
    @endforeach  
  </div>
</div>