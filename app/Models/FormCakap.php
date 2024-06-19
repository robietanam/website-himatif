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
        'nama', 'email',  'id_form', 'kode' , 'status', 'label_id'
    ];

    public function cakapKode(): HasOne
    {
        return $this->hasOne(CakapKode::class, 'kode');
    }

    public function label()
    {
        return $this->belongsTo(LabelCakap::class);
    }

}
