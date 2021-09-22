<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    use Sluggable;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'category_id',
        'name_eng',
        'name_aze',
        'slug_eng',
        'slug_aze',
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
