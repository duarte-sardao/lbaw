@extends('layouts.app')

@section('content')
	<section class = "d-flex flex-column" id="content">
		<div class="row">
			<h5>Cart</h5>
		</div>

		<table class = "table">
			<thead>
				<tr>
					<th scope = "col">Cart</th>
					<th scope = "col">Description</th>
					<th scope = "col">Quantity</th>
					<th scope = "col">Price</th>
				</tr>
			</thead>
			<tbody>
				@php($i = 0)
				@foreach($cart as $cartProduct)
				@php($i++)
				<tr>
					<th>{{$i}}</th>
					<td class="card col m-1">
						<div class="card-body d-flex flex-row justify-content-between">
							<a href = "#">
								<img src = {{asset($cartProduct->image)}} width = "150px">
							</a>
						<span>{{$cartProduct->name}}</span>
						</div>
					</td>
					<td><span>1</span></td>
					<td><h3 class="price">{{$cartProduct->price}}€</h3></td>
				</tr>
				@endforeach	
			</tbody>
		</table> 
	</section>
@endsection