<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProkerUser extends Model
{

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'proker_division_id' => 'string',
    ];

    public function proker()
    {
        return $this->belongsTo(Proker::class);
    }
    public function prokerDivision()
    {
        return $this->belongsTo(ProkerDivision::class);
    }
}
