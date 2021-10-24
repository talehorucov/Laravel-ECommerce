<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['earn'];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }    

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getEarnAttribute()
    {
        if ($this->discount_amount != 0 and $this->discount_amount != null) {
            return $this->discount_amount;
        }
        return $this->amount;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_details');
    }
}
