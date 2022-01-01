<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class About extends Model
{
    protected $table = 'about_us';
    private static $attributesQueue = [];
    protected $fillable = ['title','description', 'details_one','details_two','image_one','image_two'];
}
