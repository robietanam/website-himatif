<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FormCakap extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email',  'id_form', 'id_kode' , 'status',
    ];

    public function cakapKode(): HasOne
    {
        return $this->hasOne(CakapKode::class, 'kode');
    }

}
