<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Home extends Model
{
    protected $table = 'home_page';
    private static $attributesQueue = [];
    protected $fillable = ['title','description', 'image'];
}
