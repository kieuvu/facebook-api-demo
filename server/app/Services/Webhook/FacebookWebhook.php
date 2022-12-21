<?php

namespace App\Services\Webhook;

use App\Events\FacebookEvent;

class FacebookWebhook
{
    public static function subscribe(array $payload)
    {
        return !$payload['hub_verify_token'] == config("services.facebook.webhook") ?: $payload['hub_challenge'];
    }

    public static function callback(array $payload)
    {
        logger()->info("Event: ", $payload);
        return event(new FacebookEvent($payload));
    }
}
