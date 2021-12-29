<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model {
    //The relation has created_at and updated_at columns
    public $timestamps = true;

    //Defines the table's name
    protected $table = 'CartItem';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'amount'];

    //Linking Cartitems to Customer
    public function user(){
        return $this->belongsTo('App\Models\Customer', 'id');
    }
}

?>
