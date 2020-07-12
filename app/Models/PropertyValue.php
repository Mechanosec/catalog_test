<?php


namespace App\Models;


class PropertyValue extends Model
{
    public function property()
    {
        return $this->belongsTo('App\Models\property');
    }
}
