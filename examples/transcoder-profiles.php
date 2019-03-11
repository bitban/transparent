<?php

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Services\Transcoder\GetProfilesService;

try {
    require_once __DIR__ . "/init.php";

    $getProfilesService = new GetProfilesService($httpClient, $company, $serializer);
    $profiles = $getProfilesService->getTranscodingProfiles();
} catch (TransparentException $e) {
    // TODO: error handling
}
