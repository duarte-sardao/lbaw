<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {
    
    //The relation does not have created_at and updated_at columns
    public $timestamps = false;

    //Defines the table's name
    protected $table = 'Purchase';
    
    //Attributes of the relation that can be modified upon creation or update
    protected $fillable = ['id', 'orderDate', 'deliveryDate', 'orderStatus', 'id_Customer', 'id_Address', 'id_PaymentMethod', 'id_Cart'];
}

?>