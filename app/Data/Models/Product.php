<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id','name', 'slug', 'price', 'description'];

    public function categories()
    {
        return $this->hasManyThrough(
            'App\Data\Models\Category',
            'App\Data\Models\CategoryProduct',
            'product_id',
            'id',
            'id',
            'category_id'
        );
    }

    public function companies()
    {
        return $this->hasManyThrough(
            'App\Data\Models\Company',
            'App\Data\Models\CompanyProduct',
            'product_id',
            'id',
            'id',
            'company_id'
        );
    }

    public function stores()
    {
        return $this->hasManyThrough(
            'App\Data\Models\Store',
            'App\Data\Models\StoreProduct',
            'product_id',
            'id',
            'id',
            'store_id'
        );
    }

    public function orders()
    {
        return $this->hasManyThrough(
            'App\Data\Models\Order',
            'App\Data\Models\OrderProduct',
            'product_id',
            'id',
            'id',
            'order_id'
        );
    }


}
