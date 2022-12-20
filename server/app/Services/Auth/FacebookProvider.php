<?php

namespace App\Services\Auth;

use Laravel\Socialite\Facades\Socialite;

class FacebookProvider
{
    public static function redirect()
    {
        return Socialite::driver('facebook')->stateless()->redirect()->getTargetUrl();
    }

    public static function callback()
    {
        $auth = Socialite::driver('facebook')->stateless()->user();

        $auth['token'] = $auth->token;

        return $auth;
    }
}
