<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Notification extends Model
{
    protected $table = 'zoolife_notification';
    private static $attributesQueue = [];
    protected $fillable = [];
}
