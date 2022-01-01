<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    protected $table = 'articles';
    private static $attributesQueue = [];
    protected $fillable = [];
}
