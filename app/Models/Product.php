<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = [];

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
