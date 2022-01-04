@extends('layouts.app')

@section('content')
	<section class = "d-flex flex-column" id="content">
		<div class = "container mt-5" id="homeProductGrid">
			<div class="row">
				<h5>Cart:</h5>
			</div>
			
			<div class="row d-flex m-1">
				<div class="card col m-1">
					<div class="card-body d-flex flex-row justify-content-between">
						<div class="product-info d-flex flex-column">
							<strong class="flex-basis-70">Product</strong>
							<h3 class="mt-2 price flex-basis-15">Quantity</h3>
							<h3 class="mt-2 price flex-basis-15">Price</h3>
						</div>
					</div>
				</div>
				
				@foreach($cart as $cartProduct)
				<div class="card col m-1">
					<div class="card-body d-flex flex-row justify-content-between">
						<a href = "#">
							<img src = {{asset($cartProduct->image)}} width = "100%">
						</a>

						<div class="product-info d-flex flex-column">
							<strong class="flex-basis-70">{{$cartProduct->name}}</strong>
							<input class="flex-basis-15" type="number" id="quantity" name="quantity" value={{$cartProduct->quantity}}>
							<h3 class="mt-2 price flex-basis-15">{{$cartProduct->price}}*{{$cartProduct->quantity}}€</h3>
						</div>
					</div>
				</div>
				@endforeach
			</div>  
		</div>  
	</section>
@endsection