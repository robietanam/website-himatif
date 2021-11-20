<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function mainDivision()
    {
        return $this->belongsTo(Self::class, 'parent_id');
    }
    public function subDivisions()
    {
        return $this->hasMany(Self::class, 'parent_id');
    }
}
