<?php
/**
 * Copyright 2017 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Config;

class Credentials
{
    /** @var string */
    private $clientId;

    /** @var string */
    private $clientSecret;

    public function __construct(string $clientId, string $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }
}
