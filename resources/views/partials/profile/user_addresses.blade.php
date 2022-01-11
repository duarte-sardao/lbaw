<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between mb-2">
    <h4>Your adresses</h4>
  </div>

  @php($i = 0)
  <div class="row row-columns-2">
    @foreach($entries as $entry)
      <div class="col-md">
        @include('partials.profile.address_card', ['entry' => $entry, 'number' => ($i + 1)])
      </div>

      @php($i++)
      <!-- Makes columns of 2 -->
      @if($i % 2 == 0)
        </div>
        <div class="row row-columns-2">
      @endif
    @endforeach  

    @for($i = 0; $i < 2 - count($entries) % 2; $i++)
      <div class="col-md"></div>
    @endfor
  </div>

  <a class = "d-flex justify-content-center" href = {{route('newAddress')}}>
    <button class = "btn btn-outline-success" type = "submit">
      <i class="fa fa-plus" aria-hidden="true"></i>
      New address
    </button>
  </a>  
  
</div>