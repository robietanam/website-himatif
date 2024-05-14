<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakapKode extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'kode', 
    ];
    public function formCakap()
    {
        return $this->belongsTo(FormCakap::class);
    }
}
