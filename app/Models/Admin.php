<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'admin';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id'];

    //Pointing Admin to Account table overriding FK name
    public function accounts(){
        return $this->belongsTo('App\Models\User', 'id');
    }
}

?>