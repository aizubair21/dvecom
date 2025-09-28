<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Products_has_images extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsHasImagesFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
        'name',
        'is_gallery'
    ];

    /**
     * The table fields
     * 
     * product_id
     * name
     * image
     * is_gallery
     */

    /**
     * give user default 'user' role 
     * when model is created
     */
    protected static function boot(): void
    {
        parent::boot();
        // static::creating(function (Product $product) {
        //     $product->user_id = Auth::id();
        //     $product->status = 1;
        // });


        static::deleted(function (Products_has_images $pi) {
            Storage::disk('public')->delete($pi->image);
        });
    }
}
