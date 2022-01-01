<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Account extends Model
{
    protected $table = 'accounts';
    private static $attributesQueue = [];
    protected $fillable = [];
}
