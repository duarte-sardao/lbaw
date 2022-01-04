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
					@foreach($cart as $cartProduct)
						@include('partials.cart.entry', ['cartProduct' => $cartProduct])
					@endforeach	
			</table> 
	
			<div class="card w-25 h-25">
				<div class="card-body d-flex justify-content-between">
					<div class="d-flex flex-column">
						<h5 class="card-subtitle m-1 text-muted">Sub Total:</h5>
						<h5 class="card-subtitle m-1 text-muted">Taxes:</h5>
						<h5 class="card-title m-1">Grand Total:</h5>
					</div>
					<div class = "d-flex flex-column">
						@php($taxes = 0.00)
						<h5 class="card-subtitle m-1 text-muted">{{$total}}€</h5>
						<h5 class="card-subtitle m-1 text-muted">{{$taxes}}€</h5>
						<h5 class="card-title m-1">{{$total + $taxes}}€</h5>
					</div>
				</div>

				<div class="d-flex justify-content-around">
					<div class="btn btn-success m-2 w-50">
						<a href="{{route('checkout')}}">Checkout</a>
					</div>

					<div class="btn btn-outline-danger m-2 w-50">
						<a href="#">Empty Cart</a>
					</div>
				</div>
			</div>
		</section>
	</section>
@endsection