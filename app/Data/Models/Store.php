<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id','name', 'address', 'url'];

    public function products()
    {
        return $this->hasManyThrough(
            'App\Data\Models\Product',
            'App\Data\Models\StoreProduct',
            'store_id',
            'id',
            'id',
            'product_id'
        );
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
