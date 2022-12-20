<?php

namespace App\Http\Controllers\Api\Auth\Facebook;

use App\Http\Controllers\Controller;
use App\Services\Auth\FacebookProvider;
use Illuminate\Http\Request;

class CallbackAction extends Controller
{
    public function __invoke(Request $request)
    {
        $user = FacebookProvider::callback();

        return response()->json([
            'status' => true,
            'payload' => $user
        ], 200);
    }
}
