@extends('layouts.app')

@section('content')
  <!-- Products Grid -->
  <div class="card-deck m-5">
    <p>Your search retrieved <strong>{{count($results)}} products</strong>.</p>
    
    @php($i = 0)
    <div class="row m-3">
      @foreach($results as $result)
        <div class="col-md">
          @include('partials.product.card', ['product' => $result])
        </div>
        @php($i++)

        <!-- Makes rows of 4 products each -->
        @if($i % 4 == 0)
          </div>
          <div class="row m-3">
        @endif
      @endforeach  
    </div>
  </div>

@endsection