<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =
    [
        'name',
        'slug',
        'thumbnail',
        'display_at_home',
        'earning',
        'product'
    ];


    protected static function booted()
    {
        static::addGlobalScope(function (Builder $builder) {
            // get by default desc order
            $builder->orderBy('id', 'desc');
        });
    }

    public function incrementProduct()
    {
        $this->increment('product');
    }
    public function decrementProduct()
    {
        $this->decrement('product');
    }
    public function products()
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }

    /***
     * get by slug
     */
    public function slug($slug)
    {
        return $this->slug == $slug;
    }

    /**
     * get all category withour default category
     * default category has a default-category slug
     * 
     */
    public function getAll()
    {
        return $this->whereNot('slug', 'default-category');
    }
}
