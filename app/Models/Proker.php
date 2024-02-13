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
        'status', 'link_registration', 'link_instagram', 
        'link_storage_document', 'link_storage_certificate', 
        'link_storage_pdd_documentation', 'link_contact_person', 
        'timeline', 'is_timeline_open', 
        'dokumentasi', 'is_dokumentasi_open',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'is_registration_open' => 'string',
        'timeline' => 'array',
        'dokumentasi' => 'array',
        'is_timeline_open' => 'boolean',
        'is_dokumentasi_open' => 'boolean',
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
