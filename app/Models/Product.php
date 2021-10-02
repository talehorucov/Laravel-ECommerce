<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    
    protected $guarded = [];
    protected $appends = ['discount_percent'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function subsubcategory()
    {
        return $this->belongsTo(SubSubCategory::class);
    }

    public function multiProductImg()
    {
        return $this->hasMany(MultiProductImg::class);
    }

    public function getDiscountPercentAttribute()
    {
        if ($this->discount_price != 0 or $this->discount_price != NULL) {
            return round( 100 - $this->discount_price / $this->selling_price * 100) . '%';
        }
    }
}
