<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Cart';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id'];

    //Linking Cart to Purchase table overriding the FK name
    public function purchases(){
        return $this->belongsTo('App\Models\Purchase', 'id_Cart');
    }

    //Linking Customer to Purchase table overriding the FK name
    public function customers(){
        return $this->belongsTo('App\Models\Customer', 'id_Customer');
    }

    //Linking Cart to CartProduct table overriding its name and FKs 
    public function products(){
        return $this
            ->belongsToMany('App\Models\Product', 'CartProducts', 'id_Cart', 'id_Product')
            ->withPivot('quantity');
    }
}

?>