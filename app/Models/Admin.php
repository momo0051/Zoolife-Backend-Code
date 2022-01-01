<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    protected $table = 'users';
    private static $attributesQueue = [];
    protected $fillable = ['name', 'email', 'password', 'role', 'avatar'];
}
