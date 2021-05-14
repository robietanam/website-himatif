<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }
}
