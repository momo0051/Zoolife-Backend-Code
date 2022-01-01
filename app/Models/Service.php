<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Service extends Model
{
    protected $table = 'services';
    private static $attributesQueue = [];
    protected $fillable = ['name','main_image','description','slug','banner_image','service_details','images_one','heading','images_two','images_three','images_four'];
}
