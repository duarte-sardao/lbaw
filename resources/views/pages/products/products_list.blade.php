@extends('layouts.app')

@section('content')
  <!-- Products Grid -->
  <div class="card-deck m-5">
    @if(count($products) > 0)
      <p>Your search retrieved <strong>{{count($products)}} products</strong>.</p>
      
      @php($i = 0)
      <div class="row row-columns-4 m-3">
        @foreach($products as $product)
          <div class="col-md">
            @include('partials.product.card', ['product' => $product])
          </div>
          @php($i++)

          <!-- Makes rows of 4 products each -->
          @if($i % 4 == 0)
            </div>
            <div class="row row-columns-4 m-3">
          @endif
        @endforeach  

        @for($i = 0; $i < 4 - count($products) % 4; $i++)
          <div class="col-md"></div>
        @endfor
      </div>
    
    @else
      @include('partials.product.not_found')
    @endif
  </div>

@endsection