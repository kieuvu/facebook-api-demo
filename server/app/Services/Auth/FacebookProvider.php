<?php

namespace App\Services\Auth;

use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookProvider
{
    private static $scope = [
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

        $userData = [
            "name" => $auth->name,
            "facebook_id" => $auth->id,
            "email" => $auth->email,
            "token" => $auth->token,
            "avatar_url" => $auth->avatar,
            "gender" => $auth->user["gender"],
        ];

        $user = app(UserService::class)->saveUser($userData);

        Auth::login($user);

        return $user;
    }
}
