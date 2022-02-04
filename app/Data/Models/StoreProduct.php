<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreProduct extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;
}