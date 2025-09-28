<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products_has_shipping extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsHasShippingFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'product_id',
        'shipping_id',
    ];
}
