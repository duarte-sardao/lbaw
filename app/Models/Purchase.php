<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Purchase';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'orderDate', 'deliveryDate', 'orderStatus', 'id_Customer', 'id_Address', 'id_PaymentMethod', 'id_Cart'];

    //Linking Purchase to Customer table overriding the FK name
    public function customers(){
        return $this->belongsTo('App\Models\Customer', 'id_Customer');
    }

    //Linking Purchase to Address table overriding the FK name
    public function addresses(){
        return $this->belongsTo('App\Models\Address', 'id_Customer');
    }

    //Linking Purchase to Cart table overriding the FK name
    public function carts(){
        return $this->hasOne('App\Models\Cart', 'id_Cart');
    }

    //Linking Purchase to PaymentMethods table overriding the FK name
    public function paymentMethods(){
        return $this->belongsTo('App\Models\PaymentMethod', 'id_PaymentMethod');
    }
}

?>