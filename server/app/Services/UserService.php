<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct()
    {
        // Implementing
    }

    public function saveUser($userData)
    {
        return User::updateOrCreate([
            "facebook_id" => $userData["facebook_id"],
        ], $userData);
    }
}
