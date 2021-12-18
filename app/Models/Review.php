<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Review';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'text', 'rating', 'yesVotes', 'noVotes', 'id_Customer', 'id_Product'];

    //Linking Review to Customer table overriding the FK name
    public function customers(){
        return $this->belongsTo('App\Models\Customer', 'id_Customer');
    }

    //Linking Review to Product table overriding the FK name
    public function products(){
        return $this->belongsTo('App\Models\Product', 'id_Product');
    }
}

?>