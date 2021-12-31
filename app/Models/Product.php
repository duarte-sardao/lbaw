<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Product';

    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'name', 'price', 'size', 'stock', 'brand', 'image', 'rating', 'description' ];

    //Linking Product to Review table overriding the FK name
    public function reviews(){
        return $this->hasMany('App\Models\Review', 'id_Product');
    }

    //Linking Product to Wishlist table overriding its name and FKs
    public function customers(){
        return $this->belongsToMany('App\Models\Customer', 'Wishlist', 'id_Product', 'id_Customer');
    }

    //Linking Product to CartProduct table overriding its name and FKs
    public function carts(){
        return $this
            ->belongsToMany('App\Models\Cart', 'CartProduct', 'id_Product', 'id_Cart')
            ->withPivot('quantity');
    }


}

?>