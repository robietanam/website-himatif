<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemiluCandidate extends Model
{
    use HasFactory;

    protected $table = 'pemilu_candidates'; // Table name

    // Fields that are mass assignable
    protected $fillable = [
        'nama',
        'nim',
        'visi',
        'misi',
        'photo'
    ];

    // Automatically cast JSON fields to arrays
    protected $casts = [
        'misi' => 'array',
    ];

    public function votes()
    {
        return $this->hasMany(PemiluVote::class, 'vote_status', 'id');
    }
}
