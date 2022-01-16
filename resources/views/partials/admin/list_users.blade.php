<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between mb-2">
    <h4>Accounts</h4>
    @include('partials.buttons.add_button', 
      ['text' => 'Create User', 'id' => 'createUserButton', 'link' => route('newUser')])
  </div>

  @php($i = 0)
  <div class="row row-columns-2">
    @foreach($entries as $entry)
      <div class="col-md">
        @include('partials.admin.user_entry', ['entry' => $entry])
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
</div>