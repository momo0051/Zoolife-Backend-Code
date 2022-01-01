<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class About extends Model
{
    protected $table = 'about_us';
    private static $attributesQueue = [];
    protected $fillable = ['title','description','image', 'details_one','image_one','image_two','image_three'];
}
