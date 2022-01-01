<?php

namespace App\Models;

use DB;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    private static $attributesQueue = [];
    protected $fillable = [
        // 'itemId',
        'user_id',
        'status',
        'ads_id',
        'content',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'ads_id', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
