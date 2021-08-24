<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'status'];

    public function admin(){
        return $this->hasMany(Admin::class, 'role_id');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }
}
