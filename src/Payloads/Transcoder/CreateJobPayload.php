<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Payloads\Transcoder;

class CreateJobPayload
{
    /**
     * @var string
     */
    private $origin;

    /**
     * @var string[]
     */
    private $destinations;

    /**
     * @var CreateJobNotificationPayload[]
     */
    private $notifications;

    /**
     * @var CreateJobQualityPayload[]
     */
    private $qualities;

    /**
     * @var CreateJobThumbnailPayload[]
     */
    private $thumbnails = [];

    /**
     * CreateJobPayload constructor.
     * @param string $origin
     * @param string[] $destinations
     * @param CreateJobNotificationPayload[] $notifications
     * @param CreateJobQualityPayload[] $qualities
     */
    public function __construct(string $origin, array $destinations, array $notifications, array $qualities)
    {
        $this->origin = $origin;
        $this->destinations = $destinations;
        $this->notifications = $notifications;
        $this->qualities = $qualities;
    }

    /**
     * @param CreateJobThumbnailPayload[] $thumbnails
     * @return CreateJobPayload
     */
    public function setThumbnails(array $thumbnails): CreateJobPayload
    {
        $this->thumbnails = $thumbnails;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @return string[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @return CreateJobNotificationPayload[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }

    /**
     * @return CreateJobQualityPayload[]
     */
    public function getQualities(): array
    {
        return $this->qualities;
    }

    /**
     * @return CreateJobThumbnailPayload[]
     */
    public function getThumbnails(): array
    {
        return $this->thumbnails;
    }
}
