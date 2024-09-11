<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewAlumni extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $guarded = ['id'];
    protected $fillable = [
    'name',
    'nim',
    'phone',
    'angkatan',
    'tempat_kerja',
    'experience',
    'motivation',
    'instagram',
    'photo'
    ];
}
