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
}
