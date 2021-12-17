<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Motherboard';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'socket', 'type'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}

?>