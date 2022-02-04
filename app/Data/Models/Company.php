<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id','name', 'cif'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function products()
    {
        return $this->hasManyThrough(
            'App\Data\Models\Product',
            'App\Data\Models\CompanyProduct',
            'company_id',
            'id',
            'id',
            'product_id'
        );
    }
}
