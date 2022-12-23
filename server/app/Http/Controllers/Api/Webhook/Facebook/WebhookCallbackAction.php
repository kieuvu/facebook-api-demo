<?php

namespace App\Http\Controllers\Api\Webhook\Facebook;

use App\Http\Controllers\Controller;
use App\Services\Webhook\FacebookWebhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebhookCallbackAction extends Controller
{
    public function __invoke(Request $request)
    {
        FacebookWebhook::callback($request->all());

        return response()->json([
            'status' => true
        ], 200);
    }
}
