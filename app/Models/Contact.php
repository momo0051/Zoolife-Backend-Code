<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact extends Model
{
    protected $table = 'contactus';
    private static $attributesQueue = [];
    protected $fillable = ['name','title','description'];
}
