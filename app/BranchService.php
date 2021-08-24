<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchService extends Model
{
    public function branch(){
        return $this->belongsTo(Branch::class, 'country_id');
    }
}
