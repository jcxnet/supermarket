<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id','name', 'slug', 'description'];

    public function products()
    {
        return $this->hasManyThrough(
            'App\Data\Models\Product',
            'App\Data\Models\CategoryProduct',
            'category_id',
            'id',
            'id',
            'product_id'
        );
    }
}
