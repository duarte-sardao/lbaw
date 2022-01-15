<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between mb-2">
    <h4>Available Products</h4>
  </div>

  @php($i = 0)
  <div class="row row-columns-2">
    @foreach($entries as $entry)
      <div class="col-md">
        @include('partials.profile.product_entry', ['entry' => $entry])
      </div>

      @php($i++)
      <!-- Makes columns of 2 -->
      @if($i % 3 == 0)
        </div>
        <div class="row row-columns-2">
      @endif
    @endforeach  

    @for($i = 0; $i < 3 - count($entries) % 3; $i++)
      <div class="col-md"></div>
    @endfor
  </div>

  <a class = "d-flex justify-content-center" href = {{route('newProduct')}}>
    <button class = "btn btn-outline-success" type = "submit">
      <i class="fa fa-plus" aria-hidden="true"></i>
      New Product
    </button>
  </a>  
</div>