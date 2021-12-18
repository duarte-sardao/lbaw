<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Customer';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'id_Cart'];

    //Pointing Customer to Account table overriding FK name
    public function accounts(){
        return $this->belongsTo('App\Models\Account', 'id');
    }

    //Pointing Customer to Notification table overriding FK name
    public function notifications(){
        return $this->hasMany('App\Models\Notification', 'id_Customer');
    }

    //Pointing Customer to Purchase table overriding FK name
    public function purchases(){
        return $this->hasMany('App\Models\Purchase', 'id_Customer');
    }

    //Pointing Customer to CustomerAddress table overriding its name and FKs
    public function addresses(){
        return $this->belongsToMany('App\Models\Address', 'CustomerAddress', 'id_Customer', 'id_Address');
    }

    //Pointing Customer to Cart table overriding FK name
    public function carts(){
        return $this->hasOne('App\Models\Cart', 'id_Cart');
    }

    //Pointing Customer to Wishlist table overriding its name and FKs
    public function products(){
        return $this->belongsToMany('App\Models\Product', 'Wishlist', 'id_Customer', 'id_Product');
    }

    //Pointing Customer to Review table overriding FK name
    public function reviews(){
        return $this->hasMany('App\Models\Review', 'id_Customer');
    }


}

?>