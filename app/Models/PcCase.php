<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcCase extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'PcCase';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'color', 'weight', 'type'];
}

?>