<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employee extends Model
{
    protected $table = 'employees';
    private static $attributesQueue = [];
    protected $fillable = [];
}
