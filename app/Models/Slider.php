<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Slider extends Model
{
    protected $table = 'sliders';
    private static $attributesQueue = [];
    protected $fillable = ['title','description', 'image'];
}
