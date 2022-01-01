<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Footer extends Model
{
    protected $table = 'footer_cms';
    private static $attributesQueue = [];
    protected $fillable = ['left_cms_content','right_cms_content'];
}
