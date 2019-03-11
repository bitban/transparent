<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Payloads\Transcoder;

class CreateJobQualityPayload extends CreateJobNotificationPayload
{
    /** @var string */
    private $label;

    /** @var string */
    private $filename;

    /** @var int */
    private $profileId;

    public function __construct(string $label, string $filename, int $profileId)
    {
        $this->label = $label;
        $this->filename = $filename;
        $this->profileId = $profileId;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @return int
     */
    public function getProfileId(): int
    {
        return $this->profileId;
    }
}
