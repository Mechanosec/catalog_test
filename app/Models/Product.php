<?php


namespace App\Models;


class Product extends Model
{
    public function properties()
    {
        return $this->belongsToMany('App\Models\Property');
    }
}
