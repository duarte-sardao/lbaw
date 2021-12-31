<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'address';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'streeName', 'streetNumber', 'zipcode', 'floor', 'aptNumber'];

    //Linking Address to CustomerAddress table overriding its name and FKs
    public function customers(){
        return $this->belongsToMany('App\Models\Customer', 'CustomerAddress', 'id_Address', 'id_Customer');
    }

    //Linking Address to Purchase table overriding the FK name
    public function purchases(){
        return $this->hasMany('App\Models\Purchase', 'id_Address');
    }
}

?>