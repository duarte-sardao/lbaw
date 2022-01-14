@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column">
        <section class = "d-flex flex-column" id = "content">	
            <section class = "w-100 d-flex justify-content-around">
                <form class = "card" id = "payment-form" method="POST">
                {{ csrf_field() }}
                    <div class="card-body  justify-content-between">
                        <div class="form-row d-flex">
                            <div class="form-group col-md-6">
                                <label for="streetname"><span>Street Name<smal class="required_input">*</small></span></label>
                                <input type="text" class="form-control form-control-sm" id="streetname" required="required">
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="streetnumber"><span>Street Number<smal class="required_input">*</small></span></label>
                                <input type="number" class="form-control form-control-sm" id="streetnumber" required="required">
                            </div>  
                        </div>
                        <div class="form-group">
                            <label for="zipcode"><span>Zip Code<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="zipcode" required="required">
                        </div>   
                        <div class="form-group">
                            <label for="floor"><span>Floor<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="floor" required="required">
                        </div>  
                        <div class="form-group">
                            <label for="aptnumber"><span>Apartment Number<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="aptnumber" required="required">
                        </div> 
                    </div> 
                    <div class="card-body d-flex justify-content-between">
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="name"><span>Card Owner Name<smal class="required_input">*</small></span></label>
                            <input type="text" class="form-control form-control-sm" id="name" required="required">
                        </div> 
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="cardnumber"><span>Card Number<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="cardnumber" min="0" max="999999999999" required="required">
                        </div>  
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="expdate"><span>Expiration Date<smal class="required_input">*</small></span></label>
                            <input type="date" class="form-control form-control-sm" id="expdate" required="required">
                        </div>   
                        <div class="form-group col-sm-3 col-form-label">
                            <label for="cvv"><span>CVV<smal class="required_input">*</small></span></label>
                            <input type="number" class="form-control form-control-sm" id="cvv" min="100" max="999" required="required">
                        </div> 
                    </div>
                    <input type="submit" class="btn btn-success m-2" value="Buy!">
                </form>
            </section>
            
        </section>
        
    </div>
@endsection