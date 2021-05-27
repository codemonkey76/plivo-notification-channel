<?php

namespace Codemonkey76\Plivo\Exceptions;

use Exception;

class CouldNotSendNotification extends Exception
{
    public static function serviceRespondedWithAnError($response): static
    {
        return new static("Notification was not sent. Plivo responded with `{$response['status']}: {$response['response']['error']}`");
    }
}
