<?php

use App\Models\User;

if (!function_exists('getUserId')) {
    function getUserId()
    {
        return (empty(getUser())) ? 0 : getUser()->id;
    }
}


if (!function_exists('setUser')) {
    function setUser(User $user) {
        return session(['user' => $user]);
    }
}

if (!function_exists('getUser')) {
    function getUser() {
        return session('user',null);
    }
}
