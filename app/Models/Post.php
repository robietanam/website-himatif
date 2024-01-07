<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'body', 'photo', 'status', 'is_featured', 'user_id', 'category_id',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'is_featured' => 'string',
    ];


    /**
     * Relation
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * custom getter
     *
     * @param property = created_at, update_at, deleted_at
     */
    public function getHumanDate($property)
    {
        if ($this[$property]) {
            return Carbon::parse($this[$property])->diffForHumans();
        } else {
            return '-';
        }
    }
}
