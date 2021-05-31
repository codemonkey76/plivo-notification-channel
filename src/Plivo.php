<?php

namespace Codemonkey76\Plivo;

use Codemonkey76\Plivo\Exceptions\CouldNotSendNotification;
use Codemonkey76\Plivo\Exceptions\Misconfiguration;
use Plivo\RestClient as PlivoRestClient;

class Plivo extends PlivoRestClient
{
    protected string $auth_id;
    protected string $authToken;
    protected string $from;

    public function __construct(array $config)
    {
        if (is_null($config['auth_id']) || is_null($config['auth_token']) || is_null($config['from_number'])) {
            throw Misconfiguration::error();
        }

        $this->auth_id = $config['auth_id'];
        $this->authToken = $config['auth_token'];
        $this->from = $config['from_number'];

        parent::__construct($this->auth_id, $this->authToken);
    }

    public function from()
    {
        return $this->from;
    }

}
