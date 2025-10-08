<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_has_items extends Model
{
    // 
    protected $guraded = [];


    /**
     * relation
     */
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
