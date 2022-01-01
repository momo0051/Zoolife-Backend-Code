<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ads extends Model
{
    protected $table = 'ads';
    private static $attributesQueue = [];
    protected $fillable = [];
}
