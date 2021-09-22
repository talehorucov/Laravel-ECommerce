<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSubCategory extends Model
{
    use HasFactory;
    use Sluggable;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    protected $fillable = [
        'category_id',
        'subcategory_id',
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
