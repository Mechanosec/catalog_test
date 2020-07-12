<?php


namespace App\Http\Controllers;


use App\Http\Requests\Product\ProductListRequest;
use App\Services\ProductService;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;

    public function __construct()
    {
        parent::__construct();
        $this->productService = App::make(ProductService::class);
    }

    /**
     * @param ProductListRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getList(ProductListRequest $request)
    {
        return $this->apiResponse($this->productService->getList($request), 200, 'jsonable');
    }
}
