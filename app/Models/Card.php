<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Card';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'name', 'number', 'expDate', 'cvv'];

    //Linking Card to PaymentMethod table overriding the FK name
    public function paymentMethods(){
        return $this->belongsTo('App\Models\PaymentMethod', 'id');
    }
}

?>