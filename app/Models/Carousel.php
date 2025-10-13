<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'name',
        'image',
        'type',
        'status',
        'placement', // Home, About, Categories, Shops, Cart, Order, ViewCart, ProductDetails
    ];



    public function slides()
    {
        return $this->hasMany(Carousel_has_slides::class, 'carousel_id', 'id');
    }
}
