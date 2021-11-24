<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProkerUser extends Model
{
    public function proker()
    {
        return $this->belongsTo(Proker::class);
    }
    public function prokerDivision()
    {
        return $this->belongsTo(ProkerDivision::class);
    }
}
