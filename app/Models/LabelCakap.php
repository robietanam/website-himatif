<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelCakap extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',  'name'
    ];

    public function cakapKodes()
    {
        return $this->hasMany(CakapKode::class, 'label_id');
    }
   
}
