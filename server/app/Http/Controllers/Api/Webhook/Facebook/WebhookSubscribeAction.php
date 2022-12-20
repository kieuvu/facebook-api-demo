<?php

namespace App\Http\Controllers\Api\Webhook\Facebook;

use App\Http\Controllers\Controller;
use App\Services\Webhook\FacebookWebhook;
use Illuminate\Http\Request;

class WebhookSubscribeAction extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json(FacebookWebhook::subscribe($request->all()), 200);
    }
}
