<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiceProduct extends Model
{
    protected $table = 'services_products';
    private static $attributesQueue = [];
    protected $fillable = ['service_id','name','mage','description'];
}
