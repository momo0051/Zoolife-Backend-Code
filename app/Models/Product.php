<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $table = 'products';
    private static $attributesQueue = [];
    protected $fillable = ['name','image'];
}
