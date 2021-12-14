<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Account as Authenticatable;

class Account extends Authenticatable {
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    //Defines the table's name
    protected $table = 'Account';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'email', 'password', 'phone', 'isBanned', 'profilePic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];

    
}


?>