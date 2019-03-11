<?php

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Payloads\Transcoder\CreateProfilePayload;
use Bitban\Transparent\Services\Transcoder\CreateProfileService;

try {
    require_once __DIR__ . "/init.php";

    $createProfilePayload = new CreateProfilePayload(
        "Pruebas HD",
        "mp4",
        "libx264",
        null,
        null,
        5000,
        "16:9",
        128,
        "libfdk_aac",
        $companyId
    );

    $createProfileService = new CreateProfileService($httpClient, $company, $serializer);
    $profileId = $createProfileService->createProfile($createProfilePayload);
} catch (TransparentException $e) {
    // TODO: error handling
}
