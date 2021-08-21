<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
    ];


    public function user() {
        return $this->belongsTo('App\User');
    }
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
