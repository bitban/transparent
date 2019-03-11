<?php

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Services\Transcoder\GetJobsService;

try {
    require_once __DIR__ . "/init.php";

    $getJobsService = new GetJobsService($httpClient, $company, $serializer);
    $jobs = $getJobsService->getJobs(10);
} catch (TransparentException $e) {
    // TODO: error handling
}
