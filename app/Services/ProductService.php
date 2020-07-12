<?php


namespace App\Services;


use App\Http\Requests\Product\ProductListRequest;
use App\Models\Product;

class ProductService
{
    public function getList(ProductListRequest $requestData)
    {
        $query = Product::query();
        $query->select('products.*');

        if ($filters = json_decode($requestData->get('filterData'), true)) {
            $query->join('product_property', 'products.id', '=', 'product_property.product_id');
            $propertiesId = array_keys($filters);

            $propertiesValueId = [];
            foreach ($filters as $filter) {
                $propertiesValueId = array_merge($propertiesValueId, array_values($filter));
            }
            $query->whereIn('product_property.property_id', $propertiesId);
            $query->whereIn('product_property.property_value_id', $propertiesValueId);
        }

        return $query->paginate(40);
    }
}
