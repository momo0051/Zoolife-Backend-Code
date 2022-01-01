<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $table = 'category';
    private static $attributesQueue = [];
    protected $fillable = [];
    // protected $hidden = ['english_title'];

    public function getTitleAttribute()
    {
        $local = app()->getLocale();

        if($local == 'en') {
            return $this->attributes['english_title'];
        } else {
            return $this->attributes['title'];
        }
    }

    public function getArabicNameAttribute()
    {
        // dd($this);
        return $this->attributes['title'];
    }
}
