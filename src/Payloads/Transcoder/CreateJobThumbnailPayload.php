<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Payloads\Transcoder;

class CreateJobThumbnailPayload
{
    /** @var string */
    private $filename;

    /** @var string */
    private $label;

    /** @var int */
    private $width;

    /** @var int */
    private $height;

    /** @var float */
    private $time;

    public function __construct(string $filename, string $label, int $width, int $height, float $time)
    {
        $this->filename = $filename;
        $this->label = $label;
        $this->width = $width;
        $this->height = $height;
        $this->time = $time;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getTime(): float
    {
        return $this->time;
    }
}
