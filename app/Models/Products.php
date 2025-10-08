<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    /**
     * The table fields that are mass assignable.
     * name
     * slug
     * category_id
     * short_description
     * description
     * neet_price
     * price
     * discount
     * discount_save
     * stock
     * thumbnail
     * status
     * 
     * seo_title
     * seo_description
     * seo_keywords
     * seo_thumbnail
     * seo_tags
     * 
     * display_at_home
     * recommended
     * 
     * cod
     * courier
     * hand
     * 
     * accept_cupon
     * badge
     * tags
     * 
     * click
     * 
     * is_gallery
     * shipping_note
     * deleted_at
     */

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function ($q) {
            $q->orderBy('id', 'desc');
        });
    }

    // scopes
    public function scopeLive($query)
    {
        return $query->where('status', 'Active');
    }
    public function scopeDraft($query)
    {
        return $query->where('status', 'Draft');
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }
    public function scopeOutOfStock($query)
    {
        return $query->where('stock', '=', 0);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', '=', today());
    }

    public function hasDiscount()
    {
        return (!empty($this->discount_save) && !empty($this->discount));
    }

    public function discountOff()
    {
        if ($this->hasDiscount()) {
            return round(($this->discount_save * 100) / $this->price, 0);
        } else {
            return;
        }
    }

    /**
     * product in live
     */
    public function Live()
    {
        return $this->status == 'Active' ? true : false;
    }
    public function Draft()
    {
        return $this->status == 'Draft' ? true : false;
    }

    // attributes for price
    public function getTotalAttribute($value)
    {
        // if hasDiscount, the price will be discount
        if ($this->hasDiscount()) {
            return $this->discount;
        } else {
            return $this->price;
        }
    }

    public function getDiscountsAttribute($value)
    {
        return $this->hasDiscount() ? $this->price : null;
    }

    /**
     * relationships
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function showcase()
    {
        return $this->hasMany(Products_has_images::class, 'product_id', 'id');
    }
}
