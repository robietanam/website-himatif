<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class NIMChecker extends Model
{
    use HasFactory;
    use Searchable;

    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $fillable = [
        'name', 'nim',  'angkatan', 'status',
    ];

    public function toSearchableArray()
    {
        return [
            'nim' => (int) $this->nim,
            'name' => $this->name
        ];
    }

}
