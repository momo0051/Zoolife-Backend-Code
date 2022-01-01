<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemLike extends Model
{
    protected $table = 'item_like';
    private static $attributesQueue = [];
    protected $fillable = [
        'itemId',
        'userId',
    ];

    protected $dates = [
        'co',
        'uo',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'itemId', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'userId', 'id');
    }
}
