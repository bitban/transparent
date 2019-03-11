<?php

use Bitban\Transparent\Config\Company;
use Bitban\Transparent\Config\Credentials;
use Bitban\Transparent\Services\AccessTokenObtainer;
use Bitban\Transparent\Services\CachedAccessTokenObtainer;
use Bitban\Transparent\Services\HttpClient;
use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;

require_once __DIR__ . "/../vendor/autoload.php";

$clientId = "foo";
$clientSecret = "bar";
$credentials = new Credentials($clientId, $clientSecret);

$companyId = 1587;
$company = new Company($companyId);

$accessTokenObtainer = new AccessTokenObtainer($credentials);

$cachedAccessTokenObtainer = new CachedAccessTokenObtainer($accessTokenObtainer);
$guzzleClient = new Client();

$httpClient = new HttpClient($guzzleClient, $cachedAccessTokenObtainer);

// Registramos el autoloader para las anotaciones de Doctrine
AnnotationRegistry::registerLoader("class_exists");

$serializer = \JMS\Serializer\SerializerBuilder::create()
    ->setPropertyNamingStrategy(
        new SerializedNameAnnotationStrategy(
            new IdenticalPropertyNamingStrategy()
        )
    )
    ->build();
