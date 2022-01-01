<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'arabic_name'];

    public function getNameAttribute()
    {
        $local = app()->getLocale();

        if($local == 'en') {
            return $this->attributes['name'];
        } else {
            return $this->attributes['arabic_name'];
        }
    }

    public function getArabicNameAttribute()
    {
        // dd($this);
        return $this->attributes['name'];
    }
}
