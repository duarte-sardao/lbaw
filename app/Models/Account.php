<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;

class Account extends Model {
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
        'id', 'username', 'email', 'password', 'phone', 'isBanned', 'profilePic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password' 
    ];

    public function admins(){
        return $this->hasMany('App\Models\Admin', 'id');
    }

    public function customers(){
        return $this->hasMany('App\Models\Customer', 'id');
    }
}


?>