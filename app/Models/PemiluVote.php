<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemiluVote extends Model
{
    use HasFactory;

    protected $table = 'pemilu_vote'; // Table name

    // Fields that are mass assignable
    protected $fillable = [
        'nim',
        'token',
        'vote_status',
        'email_status',
    ];

    // Cast vote_status and email_status as integers
    protected $casts = [
        'vote_status' => 'integer',
        'email_status' => 'integer',
    ];

    public function candidate()
    {
        return $this->belongsTo(PemiluCandidate::class, 'vote_status', 'id');
    }
}
