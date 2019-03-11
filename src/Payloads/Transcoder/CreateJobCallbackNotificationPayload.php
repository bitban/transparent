<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Payloads\Transcoder;

class CreateJobCallbackNotificationPayload extends CreateJobNotificationPayload
{
    /** @var string */
    private $callbackUrl;

    public function __construct(string $callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }
}
