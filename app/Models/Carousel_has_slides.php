<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel_has_slides extends Model
{
    protected $fillable = [
        'carousel_id',
        'main_title',
        'subtitle',
        'description',
        'type',
        'image',
        'status',
        'action_type',
        'action_url',
        'action_target',
        'title_color',
        'des_color',
        'action_text',
        'bg_color',
    ];

    public function slider()
    {
        return $this->belongsTo(Carousel::class, 'id', 'carousel_id');
    }
}
