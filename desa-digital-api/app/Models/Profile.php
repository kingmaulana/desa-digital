<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes, UUID;

    protected $fillable = [
        'thumbnail',
        'name',
        'about',
        'headman',
        'people',
        'agriculture_area',
        'total_area',
    ];

    protected $casts = [
      'agriculture_area' => 'decimal:2',
      'total_area' => 'decimal:2',
    ];

    public function profileImage()
    {
        return $this->hasMany(ProfileImage::class);
    }
}
