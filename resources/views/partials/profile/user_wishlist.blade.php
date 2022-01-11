<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between mb-2">
    <h4>Your wishlist</h4>
  </div>

  @php($i = 0)
  <div class="row row-columns-2">
    @foreach($entries as $entry)
      <div class="col-md">
        @include('partials.profile.wishlist_card', ['entry' => $entry])
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

    <div class="d-flex justify-content-center">
      <form method = "POST" action={{route('emptyWishlist')}}>
        @csrf
        @method('delete')
        <button class = "btn btn-danger" type = "submit">
          <i class="fa fa-trash" aria-hidden="true"></i>
          Empty Wishlist
        </button>
      </form>  
    </div>
  </div>
</div>