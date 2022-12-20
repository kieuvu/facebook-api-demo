<?php

namespace App\Services\Auth;

use Laravel\Socialite\Facades\Socialite;

class FacebookProvider
{
    public static $scope = [
        'user_birthday', 'user_hometown', 'user_location',
        'user_likes', 'user_photos', 'user_videos',
        'user_friends', 'user_posts', 'user_gender',
        'user_link', 'user_age_range', 'email', 'public_profile'
    ];
    public static function redirect()
    {
        return Socialite::driver('facebook')
            ->scopes(self::$scope)
            ->stateless()
            ->redirect()
            ->getTargetUrl();
    }

    public static function callback()
    {
        $auth = Socialite::driver('facebook')
            ->stateless()
            ->user();

        $auth['token'] = $auth->token;

        return $auth;
    }
}
