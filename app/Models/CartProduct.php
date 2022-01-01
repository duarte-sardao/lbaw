<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model {
    //The relation has created_at and updated_at columns
    public $timestamps = true;

    //Defines the table's name
    protected $table = 'cartproduct';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['quantity'];



}

?>
