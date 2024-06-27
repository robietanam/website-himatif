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
        'nama', 'email',  'id_form' , 'bukti_pendaftaran','cakap_kode_id', 'status', 'label_id'
    ];

    public function cakapKode(): BelongsTo
    {
        return $this->belongsTo(CakapKode::class, 'cakap_kode_id');
    }

    public function label()
    {
        return $this->belongsTo(LabelCakap::class);
    }

}
