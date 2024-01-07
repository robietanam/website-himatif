<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'is_registration_open' => 'string',
    ];


    public function prokerUsers()
    {
        return $this->hasMany(ProkerUser::class);
    }

    public function getLeader()
    {
        $leader = $this->prokerUsers()->where('proker_division_id', 1)->first()->name ?? '-';
        return $leader;
    }
}
