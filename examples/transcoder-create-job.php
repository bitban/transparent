<?php

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Payloads\Transcoder\CreateJobCallbackNotificationPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobEmailNotificationPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobQualityPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobThumbnailPayload;
use Bitban\Transparent\Services\Transcoder\CreateJobPayloadSerializer;
use Bitban\Transparent\Services\Transcoder\CreateJobService;

try {
    require_once __DIR__ . "/init.php";

    $createJobService = new CreateJobService($httpClient, $company, $serializer, new CreateJobPayloadSerializer());
    $origin = "ftp://usuario:password@domain.tld/ruta/al/fichero.avi";
    $destinations = [
        "ftp://usuario:password@domain.tld/ruta/al/directorio/",
        "s3://usuario:password@bucketDeS3/ruta/al/directorio/"
    ];
    $notifications = [
        new CreateJobEmailNotificationPayload("info@bitban.com"),
        new CreateJobCallbackNotificationPayload("http://domain.tld/callback")
    ];
    $qualities = [
        new CreateJobQualityPayload("Etiqueta", "fichero.mp4", 25),
        new CreateJobQualityPayload("Etiqueta 2", "fichero_baja_calidad.mp4", 25),
    ];
    $thumbnails = [
        new CreateJobThumbnailPayload("foo.jpg", "first", 25, 30, 0.3),
        new CreateJobThumbnailPayload("bar.jpg", "second", 250, 300, 0.25),
    ];

    $payload = new CreateJobPayload($origin, $destinations, $notifications, $qualities);
    $payload->setThumbnails($thumbnails);

    $jobId = $createJobService->createJob($payload);
} catch (TransparentException $e) {
    // TODO: error handling
}
