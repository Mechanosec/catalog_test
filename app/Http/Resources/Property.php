<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class Property extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'property_values' => $this->propertyValues,
        ];
    }
}
