<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [

        'firstname', 'lastname', 'othername', 'email', 'phone_no',
        'status', 'gender', 'last_login', 'role_id', 'reg_by_id',

    ];

    protected $hidden = [

        'password', 'remember_token',

    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
}
