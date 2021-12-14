<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Authenticatable {

    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Product';

    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'name', 'price', 'size', 'stock', 'brand', 'image', 'rating', 'description' ];
}

?>