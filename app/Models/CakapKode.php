<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakapKode extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'kode','form_cakap_id' , 'label_id'
    ];

    public function formCakap()
    {
        return $this->belongsTo(FormCakap::class);
    }

    public function label()
    {
        return $this->belongsTo(LabelCakap::class);
    }
}
