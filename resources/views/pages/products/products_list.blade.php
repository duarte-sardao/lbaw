@extends('layouts.app')

@section('content')

  <!-- Breadcrumbs -->
  <nav class = "m-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('allProducts')}}">Products</a></li>
      <li class="breadcrumb-item" aria-current="page">Search</li>
    </ol>
  </nav>

  <!-- Products Grid -->
  <div class="container-fluid m-5">
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