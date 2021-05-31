<?php

namespace Codemonkey76\Plivo\Exceptions;

use Exception;

class Misconfiguration extends Exception
{
    public static function error(): static
    {
        return new static("Could not construct Plivo class due to missing auth_id, auth_token or from_number, please check your .env for PLIVO_AUTH_ID, PLIVO_AUTH_TOKEN or PLIVO_FROM_NUMBER");
    }
}
