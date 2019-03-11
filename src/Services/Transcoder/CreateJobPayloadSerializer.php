<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services\Transcoder;

use Bitban\Transparent\Payloads\Transcoder\CreateJobCallbackNotificationPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobEmailNotificationPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobNotificationPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobQualityPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobThumbnailPayload;

class CreateJobPayloadSerializer
{
    /**
     * @param CreateJobNotificationPayload[] $notifications
     * @return array
     */
    private function serializeNotifications(array $notifications): array
    {
        $serializedNotifications = [];
        foreach ($notifications as $notification) {
            if ($notification instanceof CreateJobEmailNotificationPayload) {
                $serializedNotifications[] = [
                    "email" => $notification->getEmail()
                ];
            } elseif ($notification instanceof CreateJobCallbackNotificationPayload) {
                $serializedNotifications[] = [
                    "call" => $notification->getCallbackUrl()
                ];
            } else {
                throw new \InvalidArgumentException(sprintf("Invalid notification class '%s'", get_class($notification)));
            }
        }

        return $serializedNotifications;
    }

    /**
     * @param CreateJobQualityPayload[] $qualities
     * @return array
     */
    private function serializeQualities(array $qualities): array
    {
        $serializedQualities = [];
        foreach ($qualities as $quality) {
            $serializedQualities[] = [
                "label" => $quality->getLabel(),
                "filename" => $quality->getFilename(),
                "profile_id" => $quality->getProfileId(),
            ];
        }
        return $serializedQualities;
    }

    /**
     * @param CreateJobThumbnailPayload[] $thumbnails
     * @return array
     */
    private function serializeThumbnails(array $thumbnails): array
    {
        $serializedThumbnails = [];
        foreach ($thumbnails as $thumbnail) {
            $serializedThumbnails[] = [
                "filename" => $thumbnail->getFilename(),
                "label" => $thumbnail->getLabel(),
                "width" => $thumbnail->getWidth(),
                "height" => $thumbnail->getHeight(),
                "time" => $thumbnail->getTime(),
            ];
        }

        return $serializedThumbnails;
    }

    public function serialize(CreateJobPayload $createJobPayload): array
    {
        $serializedPayload = [
            "origin" => $createJobPayload->getOrigin(),
            "destinations" => $createJobPayload->getDestinations(),
            "notifications" => $this->serializeNotifications($createJobPayload->getNotifications()),
            "jobs" => $this->serializeQualities($createJobPayload->getQualities())
        ];

        if (count($createJobPayload->getThumbnails()) > 0) {
            $serializedPayload["thumbnails"] = $this->serializeThumbnails($createJobPayload->getThumbnails());
        }

        return $serializedPayload;
    }
}
