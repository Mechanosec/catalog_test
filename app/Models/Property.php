<?php


namespace App\Models;


class Property extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function propertyValues()
    {
        return $this->hasMany('App\Models\PropertyValue');
    }
}
