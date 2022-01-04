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


	<section class = "d-flex flex-column" id="content">
		<div class="row mb-2">
			<h4>Your cart</h4>
		</div>

		<table class = "table">
			<thead>
				<tr class = text-center>
					<th scope = "col">Image</th>
					<th scope = "col">Description</th>
					<th scope = "col">Quantity</th>
					<th scope = "col">Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cart as $cartProduct)
					@include('partials.cart.entry', ['cartProduct' => $cartProduct])
				@endforeach	

				<tr class = "text-center">
					<th><h3>Total</h3></th>
					<td></td>
					<td></td>
					<td><h3 class="price">{{$total}}€</h3></td>
				</tr>	
			</tbody>
		</table> 
	</section>
@endsection