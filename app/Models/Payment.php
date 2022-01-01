<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Payment extends Model
{
    protected $table = 'payments';
    private static $attributesQueue = [];
    protected $fillable = [];
}
