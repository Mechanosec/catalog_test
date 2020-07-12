<?php


namespace App\Http\Controllers;


use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Services\AuthService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    protected $authService;

    public function __construct()
    {
        parent::__construct();
        $this->authService = App::make(AuthService::class);
    }

    /**
     * @return Application|Factory|View
     */
    public function viewLogin()
    {
        return view('auth.login');
    }

    /**
     * @return Application|Factory|View
     */
    public function viewRegister()
    {
        return view('auth.register');
    }

    /**
     * @param AuthLoginRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function login(AuthLoginRequest $request)
    {
        $response = $this->authService->login($request);
        if($response) {
            return $this->apiResponse($response, 200, 'auth');
        } else {
            return $this->apiResponse('', 200, 'error');
        }
    }

    /**
     * @param AuthRegisterRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function register(AuthRegisterRequest $request)
    {
        $response = $this->authService->register($request);
        if($response) {
            return $this->apiResponse('', 200, 'empty');
        } else {
            return $this->apiResponse('', 200, 'error');
        }
    }

    public function logout()
    {
        if($this->authService->logout()) {
            return $this->apiResponse('', 200, 'empty');
        } else {
            return $this->apiResponse('', 200, 'error');
        }
    }
}
