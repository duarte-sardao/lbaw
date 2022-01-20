@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column">
        <section class = "d-flex flex-column" id = "content">	
            <section class = "w-100 d-flex justify-content-around">
                <form class = "payment" id = "payment-form" method="POST" action = {{url('users/cart/checkout')}}>
                @csrf
                    <div class="card-body d-flex justify-content-between">
                        <div class="form-group col-md-4">
                            <label for="payment-type"><span>Payment Type<smal class="required_input">*</small></span></label>
                            <select name= "payment-type" id="payment-type" class="form-control">
                            <option id="payment1" value="Paypal">Paypal</option>
                            <option id="payment2" value="Card">Card</option>
                            <option id="payment3" value="Transfer">Transfer</option>
                            </select>
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="addressID"><span>Address<smal class="required_input">*</small></span></label>
                            <select id="addressID" class="form-control">
                            @php($i = 1)
                            @foreach($entries as $entry)
                            <option value={{$entry->id}}> Address {{$i}}</option>
                            @php($i++)
                            @endforeach
                            </select>
                        </div> 
                    </div>
                    <div class="card-body d-flex justify-content-between .d-none" id="card-payment-form">
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="cardName"><span>Card Owner Name<smal class="required_input">*</small></span></label>
                            <input type="text" class="form-control form-control-sm" id="cardName" required="required" >
                        </div> 
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="cardNumber"><span>Card Number<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="cardNumber" min="0" max="9999999999999999" required="required" >
                        </div>  
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="cardExpiration"><span>Expiration Date<smal class="required_input">*</small></span></label>
                            <input type="date" class="form-control form-control-sm" id="cardExpiration" required="required" >
                        </div>   
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="cardCVV"><span>CVV<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="cardCVV" min="000" max="999" required="required" >
                        </div> 
                    </div>
                    <div class="card-body d-flex justify-content-between" id="paypal-payment-form">
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="paypalEmail"><span>Paypal Email<smal class="required_input">*</small></span></label>
                            <input type="text" class="form-control form-control-sm" id="paypalEmail" required="required" disabled>
                        </div> 
                    </div>
                    <div class="card-body d-flex justify-content-between .d-none" id="transfer-payment-form">
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="transferEntity"><span>Transfer Entity<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="transferEntity" required="required" disabled>
                        </div> 
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="transferReference"><span>Transfer Reference<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="transferReference" required="required" disabled>
                        </div>  
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="transferValidFor"><span>Valid For<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="transferValidFor" required="required" disabled>
                        </div>   
                    </div>
                    <input type="submit" class="btn btn-success m-2" value="Buy!">
                </form>
            </section>
            
        </section>
        
    </div>
@endsection