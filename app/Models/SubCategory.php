<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    
    protected $table = "subcategories";

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'category_id',
        'name',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function subsubcategories()
    {
        return $this->hasMany(SubSubCategory::class,'subcategory_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'subcategory_id','id');
    }
}
