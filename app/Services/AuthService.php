<?php


namespace App\Services;


use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Models\User;

class AuthService
{

    /**
     * @param
     * @return string
     */
    public function login(AuthLoginRequest $request)
    {
        $user = null;

        if(preg_match('/^7[0-9]{10}$/', $request->get('login'))) {
            $user = User::checkUser($request->get('login'));
        } else {
            $user = User::checkUser($request->get('login'), true);
        }
        if(is_null($user)) {
            return false;
        }

        if(!$user->checkPassword($request->get('password'))) {
            return false;
        }

        $token = auth()->login($user);
        return $token;
    }

    /**
     * Логаут
     * @return bool
     * @throws \Exception
     */
    public function logout()
    {
        auth()->logout();
        return true;
    }

    /**
     * @param AuthRegisterRequest $request
     * @return bool
     * @throws \Exception
     */
    public function register(AuthRegisterRequest $request)
    {
        $registerData = $request->all();
        $registerData['password'] = md5($registerData['password']);
        $user = User::create($registerData);

        if(is_null($user)) {
            return false;
        }

        return true;
    }
}
