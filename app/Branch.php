<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = "branches";

    public function branch_service(){
        return $this->hasMany(BranchService::class, 'country_id');
    }
}
