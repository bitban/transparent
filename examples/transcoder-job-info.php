<?php

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Services\Transcoder\GetJobInfoService;

try {
    require_once __DIR__ . "/init.php";

    $getJobInfoService = new GetJobInfoService($httpClient, $company, $serializer);
    $jobId = "1550786513-8934";
    $jobInfoResponse = $getJobInfoService->getJobInfo($jobId);
} catch (TransparentException $e) {
    // TODO: error handling
}
