<?php

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Services\UrlInvalidator;

try {
    require_once __DIR__ . "/init.php";

    $urlInvalidator = new UrlInvalidator($httpClient, $company, $serializer);
    $urls = [
        "https://www.example.com/foo.html",
        "https://www.example.com/bar.html",
    ];
    $urlsInvalidationResponse = $urlInvalidator->invalidateUrls($urls);
} catch (TransparentException $e) {
    // TODO: error handling
}
