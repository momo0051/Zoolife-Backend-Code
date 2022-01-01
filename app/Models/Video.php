<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Video extends Model
{
    protected $table = 'videos';
    private static $attributesQueue = [];
    protected $fillable = [];
}
