<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name_eng',
        'name_aze',
        'slug_eng',
        'slug_aze',
        'icon'
    ];

    public function sluggable(): array
    {
        return [
            'slug_eng' => [
                'source' => 'name_eng'
            ],
            'slug_aze' => [
                'source' => 'name_aze'
            ],
        ];
    }
}
