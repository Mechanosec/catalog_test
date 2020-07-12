<?php


namespace App\Http\Controllers;


use App\Models\Property;
use App\Http\Resources\Property as PropertyResource;

class PropertyController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getList()
    {
        return $this->apiResponse(PropertyResource::collection(Property::all()), 200, 'default');
    }
}
