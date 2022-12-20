<?php

namespace App\Http\Controllers\Api\Auth\Facebook;

use App\Http\Controllers\Controller;
use App\Services\Auth\FacebookProvider;
use Illuminate\Http\Request;

class RedirectAction extends Controller
{
    public function __invoke(Request $request)
    {
        $redirectUrl = FacebookProvider::redirect();

        return response()->json([
            'status' => true,
            'payload' => [
                'url' => $redirectUrl,
            ]
        ], 200);
    }
}
