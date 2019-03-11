<?php

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Services\Transcoder\GetConsumedMinutesService;

try {
    require_once __DIR__ . "/init.php";

    $getConsumedMinutesService = new GetConsumedMinutesService($httpClient, $company, $serializer);
    $from = new \DateTime("-3 months");
    $to = new \DateTime();
    $consumedMinutesResponse = $getConsumedMinutesService->getConsumedMinutes($from, $to);
} catch (TransparentException $e) {
    // TODO: error handling
}
