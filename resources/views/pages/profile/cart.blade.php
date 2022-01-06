@extends('layouts.app')

@section('content')

	<!-- Breadcrumbs -->
  <nav class = "m-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('profile')}}">{{$user->username}}</a></li>
      <li class="breadcrumb-item" aria-current="page">Cart</li>
    </ol>
  </nav>


	<section class = "d-flex flex-column" id = "content">
		<div class="row mb-2">
			<h4>Your cart</h4>
		</div>

		<section class = "w-100 d-flex justify-content-around">
			<table class = "table w-60">
				<thead>
					<tr class = text-center>
						<th scope = "col">Image</th>
						<th scope = "col">Description</th>
						<th scope = "col">Quantity</th>
						<th scope = "col">Price</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cart as $item)
						@include('partials.cart.entry', ['item' => $item])
					@endforeach
				</tbody>
			</table> 
			
			@include('partials.cart.card')
		</section>
	</section>
@endsection