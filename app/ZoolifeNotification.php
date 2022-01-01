<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoolifeNotification extends Model
{
    protected $table = 'zoolife_notification';
    private static $attributesQueue = [];
    protected $fillable = ['user_id','ads_id','sender_id','content','isread'];

    protected $dates = [
        'updated_at',
        'created_at',
    ];
}
