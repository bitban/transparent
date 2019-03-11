<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Payloads\Transcoder;

class CreateJobEmailNotificationPayload extends CreateJobNotificationPayload
{
    /** @var string */
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
