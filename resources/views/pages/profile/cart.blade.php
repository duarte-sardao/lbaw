@extends('layouts.app')

@section('content')
	<section class = "d-flex flex-column" id="content">
		<div class="row mb-3">
			<h4>Your cart</h4>
		</div>

		<table class = "table">
			<thead>
				<tr class = text-center>
					<th scope = "col">Product Id</th>
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
					<th><h3>TOTAL</h3></th>
					<td></td>
					<td></td>
					<td><h3 class="price">{{$total}}€</h3></td>
				</tr>	
			</tbody>
		</table> 
	</section>
@endsection