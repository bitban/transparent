<?php
/**
 * Copyright 2017-2018 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Tests\Services\Transcoding;

use Bitban\Transparent\Payloads\Transcoder\CreateJobCallbackNotificationPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobEmailNotificationPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobQualityPayload;
use Bitban\Transparent\Payloads\Transcoder\CreateJobThumbnailPayload;
use Bitban\Transparent\Services\Transcoder\CreateJobPayloadSerializer;
use PHPUnit\Framework\TestCase;

class CreateJobPayloadSerializerTest extends TestCase
{
    public function testSerializeMinimum()
    {
        $origin = "ftp://usuario:password@domain.tld/ruta/al/fichero.avi";
        $destinations = [
            "ftp://usuario:password@domain.tld/ruta/al/directorio/",
            "s3://usuario:password@bucketDeS3/ruta/al/directorio/"
        ];
        $email = "info@bitban.com";
        $callbackUrl = "http://domain.tld/callback";
        $notifications = [
            new CreateJobEmailNotificationPayload($email),
            new CreateJobCallbackNotificationPayload($callbackUrl)
        ];
        $label1 = "Etiqueta";
        $filename1 = "fichero.mp4";
        $profileId1 = 33;
        $label2 = "Etiqueta 2";
        $filename2 = "fichero_baja_calidad.mp4";
        $profileId2 = 55;
        $qualities = [
            new CreateJobQualityPayload($label1, $filename1, $profileId1),
            new CreateJobQualityPayload($label2, $filename2, $profileId2),
        ];

        $payload = new CreateJobPayload($origin, $destinations, $notifications, $qualities);

        $serializer = new CreateJobPayloadSerializer();

        $this->assertSame(
            [
                "origin" => $origin,
                "destinations" => $destinations,
                "notifications" => [
                    [
                        "email" => $email
                    ],
                    [
                        "call" => $callbackUrl
                    ]
                ],
                "jobs" => [
                    [
                        "label" => $label1,
                        "filename" => $filename1,
                        "profile_id" => $profileId1,
                    ],
                    [
                        "label" => $label2,
                        "filename" => $filename2,
                        "profile_id" => $profileId2,
                    ],
                ]
            ],
            $serializer->serialize($payload)
        );
    }

    public function testSerializeFull()
    {
        $origin = "ftp://usuario:password@domain.tld/ruta/al/fichero.avi";
        $destinations = [
            "ftp://usuario:password@domain.tld/ruta/al/directorio/",
            "s3://usuario:password@bucketDeS3/ruta/al/directorio/"
        ];
        $email = "info@bitban.com";
        $callbackUrl = "http://domain.tld/callback";
        $notifications = [
            new CreateJobEmailNotificationPayload($email),
            new CreateJobCallbackNotificationPayload($callbackUrl)
        ];
        $label1 = "Etiqueta";
        $filename1 = "fichero.mp4";
        $profileId1 = 33;
        $label2 = "Etiqueta 2";
        $filename2 = "fichero_baja_calidad.mp4";
        $profileId2 = 55;
        $qualities = [
            new CreateJobQualityPayload($label1, $filename1, $profileId1),
            new CreateJobQualityPayload($label2, $filename2, $profileId2),
        ];

        $payload = new CreateJobPayload($origin, $destinations, $notifications, $qualities);

        $thumbnails = [
            new CreateJobThumbnailPayload("foo.jpg", "first", 25, 30, 0.3),
            new CreateJobThumbnailPayload("bar.jpg", "second", 250, 300, 0.25),
        ];
        $payload->setThumbnails($thumbnails);

        $serializer = new CreateJobPayloadSerializer();

        $this->assertSame(
            [
                "origin" => $origin,
                "destinations" => $destinations,
                "notifications" => [
                    [
                        "email" => $email
                    ],
                    [
                        "call" => $callbackUrl
                    ]
                ],
                "jobs" => [
                    [
                        "label" => $label1,
                        "filename" => $filename1,
                        "profile_id" => $profileId1,
                    ],
                    [
                        "label" => $label2,
                        "filename" => $filename2,
                        "profile_id" => $profileId2,
                    ],
                ],
                "thumbnails" => [
                    [
                        "filename" => "foo.jpg",
                        "label" => "first",
                        "width" => 25,
                        "height" => 30,
                        "time" => 0.3

                    ],
                    [
                        "filename" => "bar.jpg",
                        "label" => "second",
                        "width" => 250,
                        "height" => 300,
                        "time" => 0.25

                    ]
                ]
            ],
            $serializer->serialize($payload)
        );

    }
}
