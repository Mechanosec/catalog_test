<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    /**
     * Поиск  модели по произвольному полю
     * @param $field
     * @param $value
     * @return mixed
     */
    public static function findBy($field, $value)
    {
        return self::where($field,$value)->first();
    }

    public static function findByIn(string $field, array $values)
    {
        return self::whereIn($field, $values)->get();
    }

    /**
     * Поиск  модели по произвольному полю или вернуть новый экземпляр, если не найден
     * @param $field
     * @param $value
     * @return \App\Models\Model
     */
    public static function findByOrNew($field, $value)
    {
        return static::findBy($field, $value) ?: new static;
    }

    /**
     * Поиск  модели по произвольному полю
     * @param $field
     * @param $value
     * @return mixed
     */
    public static function findByWithTrashed($field, $value)
    {
        return self::where($field,$value)->withTrashed()->first();
    }
}
