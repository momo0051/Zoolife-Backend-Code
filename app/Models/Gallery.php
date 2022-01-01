<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Gallery extends Model
{
    protected $table = 'galleries';
    private static $attributesQueue = [];
    protected $fillable = ['title','image','description'];
}
