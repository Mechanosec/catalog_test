<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }

    /**
     * @param $data
     * @param int $code
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function apiResponse($data, int $code = 200, $type = 'default')
    {
        switch($type) {
            case 'default':
                $out = [
                    'result' => [
                        'status' => true,
                    ],
                    'data' => $data,
                ];
                break;

            case 'empty':
                $out = [
                    'result' => [
                        'status' => true,
                    ],
                ];
                break;

            case 'auth':
                $out = [
                    'result' => [
                        'status' => true,
                    ],
                    'api_token' => $data,
                ];
                break;

            case 'error':
                $out = [
                    'result' => [
                        'status' => false,
                    ],
                    'error' => $data
                ];
                break;

            case 'jsonable':
                $out = [
                    'result' => [
                        'status' => true,
                    ],
                    'data' => $data,
                    'meta' => [
                        'current_page' => $data->currentPage(),
                        'from' => $data->firstItem(),
                        'to' =>  $data->firstItem() + $data->count() - 1,
                        'last_page' => $data->lastPage(),
                        'per_page' => $data->perPage(),
                        'total' => $data->total(),
                    ]
                ];
                break;

            default:
                throw new Exception('Response type not found');
        }

        return response()->json($out, $code);
    }
}
