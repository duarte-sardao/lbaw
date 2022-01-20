$(document).ready(function(){
    $('#type').on('change', function() {
      if ( this.value == 'Paypal')
      {
        $("#paypal-payment-form").show();
        $("#card-payment-form").hide();
        $("#transfer-payment-form").hide();
      }
      else if( this.value = 'Card')
      {
        $("#paypal-payment-form").hide();
        $("#card-payment-form").show();
        $("#transfer-payment-form").hide();
      }
      else
      {
        $("#paypal-payment-form").hide();
        $("#card-payment-form").hide();
        $("#transfer-payment-form").show();
      }
    });
});