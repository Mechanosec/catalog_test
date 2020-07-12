<?php

namespace App\Models;

use Exception;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'full_name', 'email', 'phone', 'password'
    ];

//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    /**
     * получение или генерация токена авторизации
     * @return mixed|string
     */
    public function getApiToken()
    {
        return (!is_null($this->api_token)) ? $this->api_token : $this->makeApiToken();
    }

    public function makeApiToken()
    {
        $this->api_token = Str::random(70);
        $this->save();
        return $this->api_token;
    }

    public static function getByApiToken(string $apiToken)
    {
        return (new User)->where('api_token',$apiToken)->first();
    }

    /**
     * проверяем наличине пользователя по логину
     *
     * @param  string $login
     *
     * @return null or object user model
     */
    public static function checkUser(string $login, $email = false)
    {
        if($email) {
            return (new User)->where('email', $login)->first();
        }

        return (new User)->where('phone', $login)->first();
    }

    /**
     * Проверка пароля пользователя
     *
     * @param  string $password
     *
     * @return void
     */
    public function checkPassword(string $password)
    {
        return md5($password) == $this->password;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
