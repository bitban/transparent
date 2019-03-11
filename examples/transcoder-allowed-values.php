<?php

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Services\Transcoder\GetAllowedValuesService;

try {
    require_once __DIR__ . "/init.php";

    $getAllowedValuesService = new GetAllowedValuesService($httpClient, $company, $serializer);
    $allowedValuesResponse = $getAllowedValuesService ->getAllowedValues();
    var_dump($allowedValuesResponse);
} catch (TransparentException $e) {
    // TODO: error handling
    var_dump($e);
}
