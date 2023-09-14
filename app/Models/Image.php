<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'path', 'image_type'
    ];

    /**
     * Get the parent imageable model (user or post for example).
     */
    public function imageable()
    {
        return $this->morphTo();
    }


    public function scopeProfileImage($query)
    {
         return $query->where('image_type', 'main_profile_image');
    }

}
