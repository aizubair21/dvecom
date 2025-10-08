<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory, SoftDeletes;

    protected $guraded = [];

    /**
     * auth - true / false
     * status - plaace, accept, picked, delivery, delivered, confirm
     */

    protected static function booted()
    {
        parent::boot();
        static::addGlobalScope(function ($q) {
            $q->orderBy('id', 'desc');
        });
    }

    /**
     * scope
     */
    public function scopeAuth($query)
    {
        return $query->where('auth', true);
    }
    public function scopeGuest($query)
    {
        return $query->where('auth', false);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }

    public function scopeAccept($query)
    {
        return $query->where('status', 'Accept');
    }

    public function scopePicked($query)
    {
        return $query->where('status', 'Picked');
    }

    public function scopeDelivery($query)
    {
        return $query->where('status', 'Delivery');
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 'Delivered');
    }

    public function scopeHold($query)
    {
        return $query->where('status', 'Hold');
    }

    public function scopeCancel($query)
    {
        return $query->where('status', 'Cancel');
    }

    public function scopeConfirm($query)
    {
        return $query->where('status', 'Confirm');
    }




    /**
     * relation
     */
    public function isAuth()
    {
        return $this->auth;
    }

    public function items()
    {
        return $this->hasMany(Order_has_items::class);
    }

    public function buyer()
    {
        return $this->isAuth() ? $this->belongsTo(User::class) : ['name' => 'Guest'];
    }
}
